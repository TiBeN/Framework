<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Hold data of a row fetched from a pdo statement
 * 
 * @author tiben 
 */
class PdoRowContainer extends AssociativeArray 
{
	
    public function __construct($TType = NULL)
    {
        $this->TType = 'string';
    }
    
	/**
	 * Factory method to create a PdoRowContainer from raw pdo row array 
     *
	 * @param  array $nativeArray
	 * @return PdoRowContainer $associativeArray
	 */
	public static function createFromRawPdoRow($row)
    {
	    return self::createFromNativeArray('string', $row);	    
	}
}
