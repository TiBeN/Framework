<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\GenericCollection;

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class CriteriaSet
{
    /**
     * @var string
     */
    const LOGICAL_SEPARATOR_AND = 'and';

    /**
     * @var GenericCollection
     */
    public $criteriaSets;

    /**
     * @var LimitCriteria
     */
    public $limitCriteria;

    /**
     * @var string
     */
    const LOGICAL_SEPARATOR_OR = 'or';

    /**
     * @var GenericCollection
     */
    public $orderCriterias;

    /**
     * @var string
     */
    public $logicalSeparator;

    /**
     * @var GenericCollection
     */
    public $matchCriterias;

    public function __construct()
    {
        // Start of user code CriteriaSet.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code CriteriaSet.destructor
        // End of user code
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
     * @return CriteriaSet $criteriaSet
     */
    public static function createAnd()
    {
        // Start of user code CriteriaSet.createAnd
        // TODO should be implemented.
        // End of user code
    
        return $criteriaSet;
    }

    /**
     * @param MatchCriteria $matchCriteria
     */
    public function add(MatchCriteria $matchCriteria)
    {
        // Start of user code CriteriaSet.add
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param LimitCriteria $limitCriteria
     */
    public function setLimit(LimitCriteria $limitCriteria)
    {
        // Start of user code CriteriaSet.setLimit
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param OrderCriteria $orderCriteria
     */
    public function addOrder(OrderCriteria $orderCriteria)
    {
        // Start of user code CriteriaSet.addOrder
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param CriteriaSet $criteriaSet
     */
    public function addSubSet(CriteriaSet $criteriaSet)
    {
        // Start of user code CriteriaSet.addSubSet
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @return CriteriaSet $criteriaSet
     */
    public static function createOr()
    {
        // Start of user code CriteriaSet.createOr
        // TODO should be implemented.
        // End of user code
    
        return $criteriaSet;
    }

    // Start of user code CriteriaSet.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
