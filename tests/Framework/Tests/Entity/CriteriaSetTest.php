<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\CriteriaSet;

// Start of user code CriteriaSet.useStatements
use TiBeN\Framework\Entity\MatchCriteria;
use TiBeN\Framework\Entity\OrderCriteria;
use TiBeN\Framework\Entity\LimitCriteria;
use TiBeN\Framework\Datatype\GenericCollection;

// End of user code

/**
 * Test cases for class CriteriaSet
 * 
 * Start of user code CriteriaSetTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Entity
 * @author TiBeN
 */
class CriteriaSetTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code CriteriaSetTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code CriteriaSetTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code CriteriaSetTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method addOrder from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testaddOrderAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testAddOrder()
    {
        // Start of user code CriteriaSetTest.testaddOrder
        $criteriaSet = new CriteriaSet();
        $orderCriteria1 = OrderCriteria::asc('foo');
        $orderCriteria2 = OrderCriteria::desc('bar');
        
        $expectedOrderCriteriaCollection = new GenericCollection(
            'TiBeN\\Framework\\Entity\\OrderCriteria'
        );
        $expectedOrderCriteriaCollection->add($orderCriteria1);
        $expectedOrderCriteriaCollection->add($orderCriteria2);
        
        $criteriaSet->addOrder($orderCriteria1);
        $criteriaSet->addOrder($orderCriteria2);
        
        $this->assertEquals(
            $expectedOrderCriteriaCollection, 
            $criteriaSet->getOrderCriterias()
        );
		// End of user code
    }
    
    /**
     * Test method add from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testaddAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testAdd()
    {
        // Start of user code CriteriaSetTest.testadd
	    $matchCriteria = MatchCriteria::equals('foo', 'bar');
	    
	    $expectedMatchCriteriaCollection = new GenericCollection(
            'TiBeN\\Framework\\Entity\\MatchCriteria'
        );
	    $expectedMatchCriteriaCollection->add($matchCriteria);
	    
	    $criteriaSet = new CriteriaSet();
	    $criteriaSet->add($matchCriteria);
	    
	    $this->assertEquals(
            $expectedMatchCriteriaCollection, 
            $criteriaSet->getMatchCriterias()
        );	    
		// End of user code
    }
    
    /**
     * Test method setLimit from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testsetLimitAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testSetLimit()
    {
        // Start of user code CriteriaSetTest.testsetLimit
        $criteriaSet = new CriteriaSet();
        $limitCriteria = LimitCriteria::to(1337);
        $criteriaSet->setLimit($limitCriteria);
        $this->assertEquals($limitCriteria, $criteriaSet->getLimitCriteria());
		// End of user code
    }
    
    /**
     * Test method addSubSet from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testaddSubSetAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testAddSubSet()
    {
        // Start of user code CriteriaSetTest.testaddSubSet
        $criteriaSet = new CriteriaSet();
        $criteriaSet->getMatchCriterias()->add(MatchCriteria::equals('foo', 'bar'));

        $expectedCriteriaSetCollection = new GenericCollection(
            'TiBeN\\Framework\\Entity\\CriteriaSet'
        );
        $expectedCriteriaSetCollection->add($criteriaSet);

        $rootCriteriaSet = new CriteriaSet();
        $rootCriteriaSet->addSubSet($criteriaSet);
        
        $this->assertEquals(
            $expectedCriteriaSetCollection, 
            $rootCriteriaSet->getCriteriaSets()
        );
		// End of user code
    }
    
    /**
     * Test static method createOr from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testcreateOrAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateOr()
    {
        // Start of user code CriteriaSetTest.testcreateOr
	    $expectedCriteriaSet = new CriteriaSet();
	    $expectedCriteriaSet->setLogicalSeparator(CriteriaSet::LOGICAL_SEPARATOR_OR);
	    $this->assertEquals($expectedCriteriaSet, CriteriaSet::createOr());
		// End of user code
    }
    
    /**
     * Test method hasMatchCriterias from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testhasMatchCriteriasAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testHasMatchCriterias()
    {
        // Start of user code CriteriaSetTest.testhasMatchCriterias
        $criteriaSet = new CriteriaSet();
        $this->assertFalse($criteriaSet->hasMatchCriterias());

        $criteriaSet
            ->getMatchCriterias()
            ->add(MatchCriteria::equals('foo', 'bar'))
        ;
        $this->assertTrue($criteriaSet->hasMatchCriterias());

        $anotherCriteriaSet = new CriteriaSet();
        $anotherCriteriaSet->addSubSet($criteriaSet);
        $this->assertTrue($criteriaSet->hasMatchCriterias());
        // End of user code
    }
    
    /**
     * Test static method createAnd from class CriteriaSet
     *
     * Start of user code CriteriaSetTest.testcreateAndAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateAnd()
    {
        // Start of user code CriteriaSetTest.testcreateAnd
        $expectedCriteriaSet = new CriteriaSet();
        $expectedCriteriaSet->setLogicalSeparator(CriteriaSet::LOGICAL_SEPARATOR_AND);
        $this->assertEquals($expectedCriteriaSet, CriteriaSet::createAnd());
		// End of user code
    }

    // Start of user code CriteriaSetTest.methods
	// Place additional tests methods here.  
	// End of user code
}
