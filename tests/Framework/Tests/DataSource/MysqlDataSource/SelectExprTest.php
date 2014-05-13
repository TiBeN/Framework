<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\SelectExpr;

// Start of user code SelectExpr.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\AttributeMapping;
use TiBeN\Framework\DataSource\MysqlDataSource\MysqlAttributeConfiguration;

// End of user code

/**
 * Test cases for class SelectExpr
 * 
 * Start of user code SelectExprTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class SelectExprTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code SelectExprTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code SelectExprTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code SelectExprTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test static method createFromEntityAttributes from class SelectExpr
     *
     * Start of user code SelectExprTest.testcreateFromEntityAttributesAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateFromEntityAttributes()
    {
        // Start of user code SelectExprTest.testcreateFromEntityAttributes
        $expectedStatement = "a,b,c";
        
        $attributes = AssociativeArray::createFromNativeArray(
            null, 
            array(
                'attribute1' => AttributeMapping::create(
                    AssociativeArray::createFromNativeArray(
                        null, 
                        array(
                            'name' => 'attribute1',
                            'type' => AssociativeArray::createFromNativeArray(
                                null,
                                array('name' => 'varchar')
                            ),
                            'dataSourceAttributeMappingConfiguration' 
                                => MysqlAttributeConfiguration::create(
                                    AssociativeArray::createFromNativeArray(
                                        null, 
                                        array('columnName' => 'a')
                                    )
                                )
                        )
                    )
                ),
                'attribute2' => AttributeMapping::create(
                    AssociativeArray::createFromNativeArray(
                        null, 
                        array(
                            'name' => 'attribute2',
                            'type' => AssociativeArray::createFromNativeArray(
                                null,
                                array('name' => 'varchar')
                            ),
                            'dataSourceAttributeMappingConfiguration' 
                                => MysqlAttributeConfiguration::create(
                                    AssociativeArray::createFromNativeArray(
                                        null, 
                                        array('columnName' => 'b')
                                    )
                                )
                        )
                    )
                ),
                'attribute3' => AttributeMapping::create(
                    AssociativeArray::createFromNativeArray(
                        null, 
                        array(
                            'name' => 'attribute3',
                            'type' => AssociativeArray::createFromNativeArray(
                                null,
                                array('name' => 'varchar')
                            ),
                            'dataSourceAttributeMappingConfiguration' 
                                => MysqlAttributeConfiguration::create(
                                    AssociativeArray::createFromNativeArray(
                                        null, 
                                        array('columnName' => 'c')
                                    )
                                )
                        )
                    )
                ),
            )
        );
        
        $selectExpr = SelectExpr::createFromEntityAttributes($attributes);
        $this->assertEquals($expectedStatement, $selectExpr->toString());
        // End of user code
    }
    
    /**
     * Test method toString from class SelectExpr
     *
     * Start of user code SelectExprTest.testtoStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testToString()
    {
        // Start of user code SelectExprTest.testtoString
        $expectedStatement = "a,b,c";
        $selectExpr = new SelectExpr();
        $selectExpr->add('a');
        $selectExpr->add('b');
        $selectExpr->add('c');
        $this->assertEquals($expectedStatement, $selectExpr->toString());
        // End of user code
    }

    // Start of user code SelectExprTest.methods

    /**
     * Test To String on empty SelectExpr
     *
     * @expectedException LogicException
     * @expectedExceptionMessage The SelectExpr is empty
     */
    public function testToStringToEmptySelectExpr() 
    {
        $selectExpr = new SelectExpr();
        $selectExpr->toString();
    }
    // End of user code
}
