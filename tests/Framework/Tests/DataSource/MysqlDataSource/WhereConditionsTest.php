<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\WhereConditions;

// Start of user code WhereConditions.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\MatchCriteria;
use TiBeN\Framework\Entity\EntityMappingsRegistry;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\MysqlDataSource\Expr;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Datatype\GenericCollection;

// End of user code

/**
 * Test cases for class WhereConditions
 * 
 * Start of user code WhereConditionsTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class WhereConditionsTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code WhereConditionsTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code WhereConditionsTest.setUp
		MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code WhereConditionsTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method createEntityTargetFromEntity from class WhereConditions
     *
     * Start of user code WhereConditionsTest.testcreateEntityTargetFromEntityAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateEntityTargetFromEntity()
    {
        // Start of user code WhereConditionsTest.testcreateEntityTargetFromEntity
	    $expectedWhereConditionsString = 'WHERE idTable = :id0';
	    $someEntity = new SomeEntity();
	    $someEntity->setId(1337);
	    $someEntity->setAttributeA('foo');
	    
	    $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
	    
	    $whereConditions = WhereConditions::createEntityTargetFromEntity(
            $entityMapping, 
            $someEntity
        );
	    
	    $this->assertEquals($expectedWhereConditionsString, $whereConditions->toString());
	    
	    $expectedStatementParameters = AssociativeArray::createFromNativeArray(
            null, 
            array('id0' => 1337)
        );
	    
	    $this->assertEquals(
            $expectedStatementParameters, 
            $whereConditions->getStatementParameters()
	    );	    
		// End of user code
    }
    
    /**
     * Test static method createFromCriteriaSet from class WhereConditions
     *
     * Start of user code WhereConditionsTest.testcreateFromCriteriaSetAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateFromCriteriaSet()
    {
        // Start of user code WhereConditionsTest.testcreateFromCriteriaSet
	    $expectedWhereConditionsString 
	       = "WHERE ((b = :attributeB0 AND b != :attributeB1) OR b != :attributeB2 OR a = :attributeA0 OR a != :attributeA1 OR a > :attributeA2) AND c LIKE :attributeC0 AND a != :attributeA3"
        ;
	    $criteriaSet = CriteriaSet::createAnd()
            ->addSubSet(
                CriteriaSet::createOr()
                    ->add(MatchCriteria::notEquals('attributeB', 1337))
                    ->add(MatchCriteria::equals('attributeA', 'foo'))
                    ->add(MatchCriteria::notEquals('attributeA', 'bar'))
                    ->add(MatchCriteria::greaterThan('attributeA', 'baz'))
                    ->addSubSet(
                        CriteriaSet::createAnd()
                            ->add(MatchCriteria::equals('attributeB', 'foo'))
                            ->add(MatchCriteria::notEquals('attributeB', 'bar'))                            
	                )
            )
            ->add(MatchCriteria::like('attributeC', 'baz'))
            ->add(MatchCriteria::notEquals('attributeA', 'foo'))
        ;                        	       
	    $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        $whereConditions = WhereConditions::createFromCriteriaSet(
            $criteriaSet, 
            $entityMapping
        );
        $this->assertEquals($expectedWhereConditionsString, $whereConditions->toString());
        
        $expectedStatementParameters = AssociativeArray::createFromNativeArray(null, array(
            'attributeB0' => 'foo',
            'attributeB1' => 'bar',
            'attributeB2' => 1337,
            'attributeA0' => 'foo',
            'attributeA1' => 'bar',
            'attributeA2' => 'baz',
            'attributeC0' => 'baz',
            'attributeA3' => 'foo'             
        ));        
        $this->assertEquals(
            $expectedStatementParameters, 
            $whereConditions->getStatementParameters()
        );
		// End of user code
    }
    
    /**
     * Test static method createFromExpr from class WhereConditions
     *
     * Start of user code WhereConditionsTest.testcreateFromExprAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateFromExpr()
    {
        // Start of user code WhereConditionsTest.testcreateFromExpr
		$expectedWhereConditionsString = "WHERE ((foo = :foo0 OR foo != :foo1) AND (foobar > :foobar0 AND foobar < :foobar1)) OR foobar > :foobar2 OR foobar < :foobar3";
        $expr = Expr::concat(
        	GenericCollection::createFromNativeArray(
                'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Expr', 
                array(
                    Expr::concat(
                        GenericCollection::createFromNativeArray(
                            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Expr', 
                            array(
                                Expr::concat(
                                    GenericCollection::createFromNativeArray(
                                        'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Expr',
                                        array(
                                            Expr::fromString(
                                                "foo = :foo0", 
                                                AssociativeArray::createFromNativeArray(
                                                    null, 
                                                    array('foo0' => 'bar')
                                                )
                                            ),
                                            Expr::fromString(
                                                "foo != :foo1", 
                                                AssociativeArray::createFromNativeArray(
                                                    null, 
                                                    array('foo1' => 'baz')
                                                )
                                            ),
                                        )
                                    ),	
                                    Expr::LOGICAL_SEPARATOR_OR    
                                ),	                
                                Expr::concat(
                                    GenericCollection::createFromNativeArray(
                                        'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Expr', 
                                        array(
                                            Expr::fromString(
                                                "foobar > :foobar0", 
                                                AssociativeArray::createFromNativeArray(
                                                    null, 
                                                    array('foobar0' => 5)
                                                )
                                            ),
                                            Expr::fromString(
                                                "foobar < :foobar1", 
                                                AssociativeArray::createFromNativeArray(
                                                    null, 
                                                    array('foobar1' => 10)
                                                )
                                            ),
                                        )
                                    ),	
                                    Expr::LOGICAL_SEPARATOR_AND                
                                )
                            )
                        ),	            		
                        Expr::LOGICAL_SEPARATOR_AND
                    ), 
                    Expr::fromString(
                        'foobar > :foobar2', 
                        AssociativeArray::createFromNativeArray(
                            null, 
                            array('foobar2' => 30)
                        )
                    ),
                    Expr::fromString(
                        'foobar < :foobar3', 
                        AssociativeArray::createFromNativeArray(
                            null, 
                            array('foobar3' => 60)
                        )
                    ),
                )
            ),
            Expr::LOGICAL_SEPARATOR_OR
        );
			            
	    $this->assertEquals(
            $expectedWhereConditionsString, 
            WhereConditions::createFromExpr($expr)->toString()
        );
		// End of user code
    }
    
    /**
     * Test method toString from class WhereConditions
     *
     * Start of user code WhereConditionsTest.testtoStringAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testToString()
    {
        // Start of user code WhereConditionsTest.testtoString
	    // Test case covered by others test methods
		// End of user code
    }

    // Start of user code WhereConditionsTest.methods
	// Place additional tests methods here.  
	// End of user code
}
