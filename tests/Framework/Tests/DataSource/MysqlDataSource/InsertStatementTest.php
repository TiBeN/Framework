<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\InsertStatement;

// Start of user code InsertStatement.useStatements
use TiBeN\Framework\DataSource\MysqlDataSource\ColumnNamesListStatement;
use TiBeN\Framework\DataSource\MysqlDataSource\ValuesStatement;
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class InsertStatement
 * 
 * Start of user code InsertStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class InsertStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code InsertStatementTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code InsertStatementTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code InsertStatementTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    

    /**
     * Test method toString from interface Statement
     * Start of user code Statement.testtoStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testToString()
    {
        // Start of user code Statement.testtoString
        $insert = new InsertStatement();
        $this->assertFalse($insert->isReadyToBeExecuted());
        
        $insert->setTableName('someTable');
        $values = array(
                'a' => 'foo',
                'b' => 'bar',
                'c' => 'baz'
        );       
        $columnNamesList = new ColumnNamesListStatement();
        foreach(array_keys($values) as $columnName) {
            $columnNamesList->add($columnName);
        }
        $insert->setColumnNamesListStatement($columnNamesList);
        $valuesStatement = new ValuesStatement();
        foreach($values as $columnName => $columnValue) {
            $valuesStatement->set($columnName, $columnValue);
        }
        $insert->setValuesStatement($valuesStatement);
        
        $expectedStatement = 'INSERT INTO someTable (a,b,c) VALUES(:a,:b,:c)';
        
        $this->assertEquals($expectedStatement, $insert->toString());
        
        $expectedStatementParameters = AssociativeArray::createFromNativeArray(
            null, 
            $values
        );
        
        $this->assertEquals($expectedStatementParameters, $insert->getStatementParameters());
        // End of user code
    }
    
    /**
     * Test method isReadyToBeExecuted from interface Statement
     * Start of user code Statement.testisReadyToBeExecutedAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testIsReadyToBeExecuted()
    {
        // Start of user code Statement.testisReadyToBeExecuted
        $insert = new InsertStatement();
        $this->assertFalse($insert->isReadyToBeExecuted());
        
        $insert->setTableName('someTable');
        $this->assertFalse($insert->isReadyToBeExecuted());
        
        $values = array(
            'a' => 'foo',
            'b' => 'bar',
            'c' => 'baz'        
        );
        
        $columnNamesList = new ColumnNamesListStatement();
        foreach(array_keys($values) as $columnName) {
            $columnNamesList->add($columnName);
        }
        $insert->setColumnNamesListStatement($columnNamesList);
        $this->assertFalse($insert->isReadyToBeExecuted());
        
        $valuesStatement = new ValuesStatement();
        foreach($values as $columnName => $columnValue) {
            $valuesStatement->set($columnName, $columnValue);
        }
        $insert->setValuesStatement($valuesStatement);
        $this->assertTrue($insert->isReadyToBeExecuted());
        // End of user code
    }
    
    /**
     * Test method getStatementParameters from interface Statement
     * Start of user code Statement.testgetStatementParametersAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetStatementParameters()
    {
        // Start of user code Statement.testgetStatementParameters
        // implicitly tested by testtostring
        // End of user code
    }

    // Start of user code InsertStatementTest.methods

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage The statement is not ready
     */
    public function testToStringToNotReadyStatement()
    {
        $insert = new InsertStatement();
        $insert->toString();
    }
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage The ColumnNamesListStatement set doesn't match the ValuesStatement
     */
    public function testSetAColumnNamesListStatementThatDoesntMatchTheValuesStatement()
    {
        $insert = new InsertStatement();
        $this->assertFalse($insert->isReadyToBeExecuted());
        
        $insert->setTableName('someTable');
                 
        $columnNamesList = new ColumnNamesListStatement();
        $columnNamesList->add('b');
        $insert->setColumnNamesListStatement($columnNamesList);
                
        $valuesStatement = new ValuesStatement();
        $valuesStatement->set('a', 'foo');
        $insert->setValuesStatement($valuesStatement);
        
        $insert->toString();
    }   
    // End of user code
}
