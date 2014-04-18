<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\Collection;

/**
 * Collection of mysql result from a pdo statement.
 *
 * This collection embed an internal "row buffer" who is lazy
 * populated as the iterator pointer is moved. 
 * This allow emulating count() and return good number of rows contained in the result set.
 * Note: using theses methods have memory drawbacks on large results sets as the entire
 * result set is fetched to provide theses informations. Use carefully.
 *
 * @todo Provide an alternativ counting mechanism by allowing setting 
 * a PDO Statement with a prepared Mysql COUNT().
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class PdoRowCollection implements Collection 
{
    private $TType = 'TiBeN\\Framework\\DataSource\\MysqlDataSource\\PdoRowContainer';
    
	private $pdoStatement;
	
	private $fetchedRows = array();
	
	private $pointer = 0;
	
	private $isAlreadyFetched = false;
	
	public function __construct(\PDOStatement $pdoStatement) 
    {
		$this->pdoStatement = $pdoStatement;
		$this->rewind();		
	}
	
	/**
	 * T type getter
	 * @var String
	 */
	public function getTType()
	{
	    return $this->TType;
	}

	/**
	 * Emulate Templates (generics) in PHP. Check if the type of the object match
	 * type specified in constructor.
	 * If no type (null) if specified in the constructor, then type is not checked.
	 */
	private static function checkType($type, $variable) {
	
	    if($type == NULL) {
	        return;
	    }
	
	    $varType = is_object($variable)
	       ? get_class($variable)
	       : gettype($variable)
	    ;
	
	    if($varType != $type) {
	        throw new \InvalidArgumentException(sprintf('expects parameter to be %s, %s given', $type, $varType));
	    }
	}
	

	/* (non-PHPdoc)
	 * @see Collection::hasKey()
	 */
	public function hasKey($key) {
		$this->fetchAll();
		return isset($this->fetchedRows[$key]);
	}

	/* (non-PHPdoc)
	 * @see Collection::next()
	 */
	public function next() {
		
		$this->pointer++;

		if($this->pointer >= count($this->fetchedRows)) {
			$row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC);
			if($row !== false) {
				array_push(
                    $this->fetchedRows,
                    PdoRowContainer::createFromRawPdoRow($row)
				);
			}
			else {
				$this->isAlreadyFetched = true;
			}
		}	
	}

	/* (non-PHPdoc)
	 * @see Collection::isEmpty()
	 */
	public function isEmpty() {
		// TODO: Auto-generated method stub
		$this->fetchAll();
		return empty($this->fetchedRows);
	}

	/* (non-PHPdoc)
	 * @see Collection::rewind()
	 */
	public function rewind() {
		$this->pointer = 0;
		if(!isset($this->fetchedRows[$this->pointer]) && $this->isAlreadyFetched == false){			
			/* fetch first */
			$row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC);
			if($row !== false) {
				array_push(
					$this->fetchedRows,
					PdoRowContainer::createFromRawPdoRow($row)
				);			
			}
			else {
				$this->isAlreadyFetched = true;
			}
		}
	}

	/* (non-PHPdoc)
	 * @see Collection::get()
	 */
	public function get($key) {
		
		if(isset($this->fetchedRows[$key])) {
			return $this->fetchedRows[$key];
		}
		
		if($this->isAlreadyFetched){
			throw new InvalidArgumentException('This collection contain no item at key ' . $key);
		}
		
		$tempPointerStore = $this->pointer;
		while($this->pointer < $key && $this->valid()) {
			$this->next();
		}
		$this->pointer = $tempPointerStore;
		if(isset($this->fetchedRows[$key])) {
			return $this->fetchedRows[$key];
		}
		else {
			throw new \InvalidArgumentException('This collection contain no item at key ' . $key);
		}		
		
	}

	/* (non-PHPdoc)
	 * @see Collection::current()
	 */
	public function current() {		
		return isset($this->fetchedRows[$this->pointer]) 
			? $this->fetchedRows[$this->pointer] 
			: null
		;
	}

	/* (non-PHPdoc)
	 * @see Collection::clear()
	 */
	public function clear() {
		throw new \LogicException('Clearing a read only collection is not allowed');
	}

	/* (non-PHPdoc)
	 * @see Collection::add()
	 */
	public function add($itemToAdd) {
		throw new \LogicException('Adding an item to a read only collection is not allowed');
	}

	/* (non-PHPdoc)
	 * @see Collection::set()
	 */
	public function set($key, $itemToSet) {
		throw new \LogicException('Setting an item to a read only collection is not allowed');
	}

	/* (non-PHPdoc)
	 * @see Collection::remove()
	 */
	public function remove($key) {
		throw new \LogicException('Removing an item to a read only collection is not allowed');
	}

	/* (non-PHPdoc)
	 * @see Collection::count()
	 */
	public function count() {
		$this->fetchAll();
		return count($this->fetchedRows);
	}

	/* (non-PHPdoc)
	 * @see Collection::key()
	 */
	public function key() {
		return isset($this->fetchedRows[$this->pointer])
			? $this->pointer
			: null
		;
	}

	/* (non-PHPdoc)
	 * @see Collection::valid()
	 */
	public function valid() {
		return isset($this->fetchedRows[$this->pointer]);						
	}

	/* (non-PHPdoc)
	 * @see Collection::isReadOnly()
	 */
	public function isReadOnly() {
		return true;
	}

	/* (non-PHPdoc)
	 * @see Collection::setAsReadOnly()
	 */
	public function setAsReadOnly($boolean) {
		throw new \LogicException('A PdoRowCollection is Read only so changing read/write is not allowed.');
	}
	
	private function fetchAll() {
		if($this->isAlreadyFetched) {
			return;
		}
		$tempPointerStore = $this->pointer;
		while($this->valid()) {
			$this->next();
		}
		$this->pointer = $tempPointerStore;		
	}

}
