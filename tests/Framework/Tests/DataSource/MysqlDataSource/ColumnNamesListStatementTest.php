<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\ColumnNamesListStatement;

// Start of user code ColumnNamesListStatement.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\AttributeMapping;
use TiBeN\Framework\DataSource\MysqlDataSource\MysqlAttributeConfiguration;

// End of user code

/**
 * Test cases for class ColumnNamesListStatement
 * 
 * Start of user code ColumnNamesListStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class ColumnNamesListStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ColumnNamesListStatementTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code ColumnNamesListStatementTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ColumnNamesListStatementTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test static method createFromEntityAttributes from class ColumnNamesListStatement
     *
     * Start of user code ColumnNamesListStatementTest.testcreateFromEntityAttributesAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateFromEntityAttributes()
    {
        // Start of user code ColumnNamesListStatementTest.testcreateFromEntityAttributes
        $expectedStatement = "(a,b,c)";
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
                                        array(
                                            'columnName' => 'a'                                                                     )
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
    
        $columnNamesListStatement = ColumnNamesListStatement::createFromEntityAttributes(
            $attributes
        );        
        $this->assertEquals($expectedStatement, $columnNamesListStatement->toString());
        // End of user code
    }
    
    /**
     * Test method toString from class ColumnNamesListStatement
     *
     * Start of user code ColumnNamesListStatementTest.testtoStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testToString()
    {
        // Start of user code ColumnNamesListStatementTest.testtoString
        $expectedStatement = "(a,b,c)";
        $columnNamesListStatement = new ColumnNamesListStatement();
        $columnNamesListStatement->add('a');
        $columnNamesListStatement->add('b');
        $columnNamesListStatement->add('c');
        $this->assertEquals($expectedStatement, $columnNamesListStatement->toString());
        // End of user code
    }

    // Start of user code ColumnNamesListStatementTest.methods

    /**
     * Test To String on empty ColumnNamesList
     *
     * @expectedException LogicException
     * @expectedExceptionMessage The ColumnNamesListStatement is empty
     */
    public function testToStringToEmptyColumnNamesList() 
    {
        $columnNamesListStatement = new ColumnNamesListStatement();
        $columnNamesListStatement->toString();
    }
    // End of user code
}
