<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\GenericCollection;

// Start of user code CriteriaSet.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class CriteriaSet
{
    /**
     * @var string
     */
    const LOGICAL_SEPARATOR_AND = 'and';

    /**
     * @var LimitCriteria
     */
    public $limitCriteria;

    /**
     * @var GenericCollection
     */
    public $matchCriterias;

    /**
     * @var string
     */
    const LOGICAL_SEPARATOR_OR = 'or';

    /**
     * @var GenericCollection
     */
    public $criteriaSets;

    /**
     * @var GenericCollection
     */
    public $orderCriterias;

    /**
     * @var string
     */
    public $logicalSeparator;

    public function __construct()
    {
        // Start of user code CriteriaSet.constructor
		$this->matchCriterias = new GenericCollection(
            'TiBeN\\Framework\\Entity\\MatchCriteria'
        );
		$this->criteriaSets = new GenericCollection(
            'TiBeN\\Framework\\Entity\\CriteriaSet'
        );
		$this->orderCriterias = new GenericCollection(
            'TiBeN\\Framework\\Entity\\OrderCriteria'
        );	
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code CriteriaSet.destructor
        // End of user code
    }

    /**
     * @return LimitCriteria
     */
    public function getLimitCriteria()
    {
        // Start of user code Getter CriteriaSet.getLimitCriteria
        // End of user code
        return $this->limitCriteria;
    }

    /**
     * @param LimitCriteria $limitCriteria
     */
    public function setLimitCriteria(LimitCriteria $limitCriteria)
    {
        // Start of user code Setter CriteriaSet.setLimitCriteria
        // End of user code
        $this->limitCriteria = $limitCriteria;
    }

    /**
     * @return GenericCollection
     */
    public function getMatchCriterias()
    {
        // Start of user code Getter CriteriaSet.getMatchCriterias
        // End of user code
        return $this->matchCriterias;
    }

    /**
     * @param GenericCollection $matchCriterias
     */
    public function setMatchCriterias(GenericCollection $matchCriterias)
    {
        // Start of user code Setter CriteriaSet.setMatchCriterias
        // End of user code
        $this->matchCriterias = $matchCriterias;
    }

    /**
     * @return GenericCollection
     */
    public function getCriteriaSets()
    {
        // Start of user code Getter CriteriaSet.getCriteriaSets
        // End of user code
        return $this->criteriaSets;
    }

    /**
     * @param GenericCollection $criteriaSets
     */
    public function setCriteriaSets(GenericCollection $criteriaSets)
    {
        // Start of user code Setter CriteriaSet.setCriteriaSets
        // End of user code
        $this->criteriaSets = $criteriaSets;
    }

    /**
     * @return GenericCollection
     */
    public function getOrderCriterias()
    {
        // Start of user code Getter CriteriaSet.getOrderCriterias
        // End of user code
        return $this->orderCriterias;
    }

    /**
     * @param GenericCollection $orderCriterias
     */
    public function setOrderCriterias(GenericCollection $orderCriterias)
    {
        // Start of user code Setter CriteriaSet.setOrderCriterias
        // End of user code
        $this->orderCriterias = $orderCriterias;
    }

    /**
     * @return string
     */
    public function getLogicalSeparator()
    {
        // Start of user code Getter CriteriaSet.getLogicalSeparator
        // End of user code
        return $this->logicalSeparator;
    }

    /**
     * @param string $logicalSeparator
     */
    public function setLogicalSeparator($logicalSeparator)
    {
        // Start of user code Setter CriteriaSet.setLogicalSeparator
        // End of user code
        $this->logicalSeparator = $logicalSeparator;
    }

    /**
     * @return bool $boolean
     */
    public function hasMatchCriterias()
    {
        // Start of user code CriteriaSet.hasMatchCriterias
        if(!$this->getMatchCriterias()->isEmpty()) {
            return true;
        }
        if(!$this->getCriteriaSets()->isEmpty()) {
            foreach($this->getCriteriaSets as $criteriaSet) {
                if($criteriaSet->hasMatchCriterias()) {
                    return true;
                }
            }
        }
        $boolean = false;
        // End of user code
    
        return $boolean;
    }

    /**
     * @param CriteriaSet $criteriaSet
     */
    public function addSubSet(CriteriaSet $criteriaSet)
    {
        // Start of user code CriteriaSet.addSubSet
		$this->criteriaSets->add($criteriaSet);
		return $this; 
        // End of user code
    }

    /**
     * @return CriteriaSet $criteriaSet
     */
    public static function createAnd()
    {
        // Start of user code CriteriaSet.createAnd
		$criteriaSet = new self();
		$criteriaSet->setLogicalSeparator(self::LOGICAL_SEPARATOR_AND); 
        // End of user code
    
        return $criteriaSet;
    }

    /**
     * @param OrderCriteria $orderCriteria
     */
    public function addOrder(OrderCriteria $orderCriteria)
    {
        // Start of user code CriteriaSet.addOrder
		$this->orderCriterias->add($orderCriteria);
		return $this; 
        // End of user code
    }

    /**
     * @param MatchCriteria $matchCriteria
     */
    public function add(MatchCriteria $matchCriteria)
    {
        // Start of user code CriteriaSet.add
        $this->matchCriterias->add($matchCriteria);
        return $this; 
        // End of user code
    }

    /**
     * @return CriteriaSet $criteriaSet
     */
    public static function createOr()
    {
        // Start of user code CriteriaSet.createOr
		$criteriaSet = new self();
		$criteriaSet->setLogicalSeparator(self::LOGICAL_SEPARATOR_OR); 
        // End of user code
    
        return $criteriaSet;
    }

    /**
     * @param LimitCriteria $limitCriteria
     */
    public function setLimit(LimitCriteria $limitCriteria)
    {
        // Start of user code CriteriaSet.setLimit
		$this->limitCriteria = $limitCriteria;
		return $this;
        // End of user code
    }

    // Start of user code CriteriaSet.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
