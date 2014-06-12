<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\Driver;

// Start of user code Driver.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\DataSource\MysqlDataSource\GenericStatement;
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class Driver
 * 
 * Start of user code DriverTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class DriverTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code DriverTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code DriverTest.setUp
        try {
            MysqlDataSourceTestSetupTearDown::setUp();
        }
        catch(Exception $e) {
            $this->markTestSkipped($e->getMessage());
        }
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code DriverTest.tearDown
        MysqlDataSourceTestSetupTearDown::tearDown();
        // End of user code
    }
    
    /**
     * Test static method connect from class Driver
     *
     * Start of user code DriverTest.testconnectAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testConnect()
    {
        // Start of user code DriverTest.testconnect
        $connection = Driver::connect(
            $GLOBALS['db_host'], 
            $GLOBALS['db_username'], 
            $GLOBALS['db_password'],
            $GLOBALS['db_name'],
            $GLOBALS['db_port'] 
        );  
        $this->assertInstanceOf(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Connection', 
            $connection
        );
        $this->assertTrue($connection->isConnected());
        // End of user code
    }
    
    /**
     * Test static method executeStatement from class Driver
     *
     * Start of user code DriverTest.testexecuteStatementAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testExecuteStatement()
    {
        // Start of user code DriverTest.testexecuteStatement
        $connection = Driver::connect(
            $GLOBALS['db_host'],
            $GLOBALS['db_username'],
            $GLOBALS['db_password'],
            $GLOBALS['db_name'],
            $GLOBALS['db_port']
        );
        
        // Test execution of statement
        $statement = new GenericStatement();
        $statement->setStatementString('CREATE TABLE test_execute_statement (c CHAR(20) CHARACTER SET utf8 COLLATE utf8_bin, id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY (id));');
        
        $executionStatementResult = Driver::executeStatement($statement, $connection);
        $this->assertTrue($executionStatementResult->getSuccess());

        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('DESCRIBE `test_execute_statement`');
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertEquals(2, $pdoStatement->rowCount());
        $expectedRow = array(
            'Field' => 'c',
            'Type' => 'char(20)',
            'Null' => 'YES',
            'Key' => '',
            'Default' => null,
            'Extra' => ''
        );
        $this->assertEquals($expectedRow, $pdoStatement->fetch(\PDO::FETCH_ASSOC));
        
        // Test insert a row with statement parameters
        $statement = new GenericStatement();
        $statement->setStatementString(
            'INSERT INTO `test_execute_statement` (`c`) VALUES (:c)'
        );
        $statementParameters = new AssociativeArray('string');
        $statementParameters->set('c', 'youpi');
        $statement->setStatementParameters($statementParameters);
        
        $statementResult = Driver::executeStatement($statement, $connection);
        
        $this->assertTrue($statementResult->getSuccess());
        $this->assertEquals(1, $statementResult->getLastInsertId());
        $this->assertEquals(1, $statementResult->getNumberOfAffectedRows());        
        
        // Test execute statement which return rows
        $statement = new GenericStatement();
        $statement->setStatementString('SELECT * FROM `test_execute_statement`');
                        
        $statementResult = Driver::executeStatement($statement, $connection);

        $this->assertTrue($statementResult->getSuccess());
        $rowCollection = $statementResult->getRowCollection();
        $this->assertEquals(1, $rowCollection->count());
        
        $row = $rowCollection->current();

        $this->assertEquals('youpi', $row->get('c'));
        // End of user code
    }
    
    /**
     * Test static method disconnect from class Driver
     *
     * Start of user code DriverTest.testdisconnectAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testDisconnect()
    {
        // Start of user code DriverTest.testdisconnect
        $connection = Driver::connect(
            $GLOBALS['db_host'],
            $GLOBALS['db_username'],
            $GLOBALS['db_password'],
            $GLOBALS['db_name'],
            $GLOBALS['db_port']
        );

        Driver::disconnect($connection);
        $this->assertFalse($connection->isConnected());
        // End of user code
    }

    // Start of user code DriverTest.methods

    /**
     * Test connection failed exception
     *
     * @expectedException PDOException
     */
    public function testConnectionFailedException() 
    {
        Driver::connect(
            $GLOBALS['db_host'],
            'fakeusername', // Hope theses credentials doesn't exists!!
            'fakepasswd', 
            'fakedb',
            $GLOBALS['db_port'] 
        );      
    }
    
    /**
     * Test Statement not ready exception
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The statement is not ready to be executed
     */
    public function testStatementNotReadyException() 
    {
        $connection = Driver::connect(
            $GLOBALS['db_host'],
            $GLOBALS['db_username'],
            $GLOBALS['db_password'],
            $GLOBALS['db_name'],
            $GLOBALS['db_port']
        );      
        $statement = new GenericStatement();
        Driver::executeStatement($statement, $connection);
    }
    
    /**
     * TestStatementExecutionFailed  
     */
    public function testStatementExecutionFailed() 
    {
        $connection = Driver::connect(
            $GLOBALS['db_host'],
            $GLOBALS['db_username'],
            $GLOBALS['db_password'],
            $GLOBALS['db_name'],
            $GLOBALS['db_port']
        );
        $badStatement = new GenericStatement();
        $badStatement->setStatementString('SLECT * FROM `some_table`');
        $executionResult = Driver::executeStatement($badStatement, $connection);        
        Driver::disconnect($connection);        
        
        $this->assertFalse($executionResult->getSuccess());
        $this->assertEquals(1064, $executionResult->getErrorCode());
        $this->assertEquals(
            'You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'SLECT * FROM `some_table`\' at line 1', 
            $executionResult->getErrorMessage()
        );  
                        
    }
    // End of user code
}
