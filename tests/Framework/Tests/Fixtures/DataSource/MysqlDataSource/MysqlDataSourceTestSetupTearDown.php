<?php

namespace TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\MysqlDataSource;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\EntityMappingsRegistry;
use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\DataSourceTypeConvertersRegistry;
use TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\IntegerConverter;
use TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\StringConverter;
use TiBeN\Framework\Validation\ValidatorsRegistry;
use TiBeN\Framework\Validation\NotEmptyValidator;
use TiBeN\Framework\Validation\StringLengthValidator;
use TiBeN\Framework\Validation\NumericRangeValidator;

/**
 * Setup Test class for mysql datasource
 */
class MysqlDataSourceTestSetupTearDown 
{
    /**
     * Setup for test cases of the mysqldatasource package
     */
    public static function setUp() 
    {
        /* Create or Truncate Mysql Database */
        $dbh = self::getPdoConnection();
        $dbh->exec(sprintf('CREATE DATABASE IF NOT EXISTS `%s`', $GLOBALS['db_name']));
        $dbh = null;        
    }
    
    /**
     * TearDown for test cases of the mysqldatasource package
     */
    public static function tearDown() 
    {
        /* Drop Mysql Database */
        $dbh = self::getPdoConnection();
        $dbh->exec(sprintf('DROP DATABASE IF EXISTS `%s`', $GLOBALS['db_name']));
        $dbh = null;
    }
    
    /**
     * Make some tests, do and return a PDO connection to the mysql server 
     * specified in the phpunit.xml 
     * 
     * @throws Exception
     * @return PDO
     */
    public static function getPdoConnection($databaseName = false)
    {
        /* Test pdo extension loaded */
        if(!extension_loaded('PDO')) {
            throw new \Exception('PDO extension is not available');
        }
            
        /* Test Database config validity */
        $validity = true;
        $databaseConfiguration = array(
            'db_host' => true,
            'db_username' => true,
            'db_password' => false,
            'db_name' => true,
            'db_port' => true
        );
        foreach($databaseConfiguration as $key => $isRequired) {
            if(!isset($GLOBALS[$key]) || ($isRequired && empty($GLOBALS[$key]))) {
                $validity = false;
            }
        }
        
        if(!$validity) {
            throw new \Exception('Database configuration is not valid');
        }
            
        /* Test Mysql Server connection */
        try {
            $dbh = new \PDO(
                sprintf(
                    'mysql:host=%s;port=%s%s', 
                    $GLOBALS['db_host'], 
                    $GLOBALS['db_port'],
                    $databaseName ? (';dbname=' . $databaseName) : '' 
                ),
                $GLOBALS['db_username'],
                $GLOBALS['db_password']
            );
            return $dbh;
        } catch (\PDOException $e) {
            throw new \Exception(
                sprintf(
                    'Can\'t connect to mysql server %s:%s',
                    $GLOBALS['db_name'],
                    $GLOBALS['db_host'],
                    $GLOBALS['db_port']
                )
            );
        }
    }
    
    /**
     * Declare Entity mapping for the test entity SomeEntity
     */
    public static function declareSomeEntityMapping() 
    {       
        self::declareMysqlDataSource();
        $entityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(              
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'datasource' => array(
                        'name' => 'test-mysql',
                        'tableName' => 'some_entity_data_table'
                    ),
                    'attributes' => array(
                        'id' => array(
                           'isIdentifier' => true,
                           'isAutoIncrement' => true,
                           'type' => array(
                                'name' => 'integer'                        
                            ),
                           'columnName' => 'idTable'
                        ),                    
                        'attributeA' => array(
                            'columnName' => 'a',
                            'type' => array(
                               'name' => 'string'
                            ),                                        
                            'validationRules' => array(
                                array(
                                    'name' => 'notempty',
                                    'message' => 'AttributeA is not set'
                                )
                            )
                        ),
                        'attributeB' => array(
                            'columnName' => 'b',
                            'type' => array(
                                'name' => 'string'
                            ), 
                            'validationRules' => array(
                                array(
                                    'name' => 'stringlength',
                                    'configuration' => array(
                                        'min' => 3
                                    ),
                                    'message' => 'AttributeB is too short (3 chars min)'
                                )
                            )
                        ),
                        'attributeC' => array(
                            'columnName' => 'c',
                            'type' => array(
                                'name' => 'string'
                            )
                        )

                /* idée de mapping relation */
//                 'entityX' => array(
//                  'type' => 'entity',
//                     'entityName' => 'entityX',
//                     [.. relation configuration ..]        
//                 )        
                    )                    
                )
            )
        );  
        EntityMappingsRegistry::registerEntityMapping($entityMapping);    
    }
    
    /**
     * Declare the mysql datasource using configuration read from phpunit.xml
     */
    public static function declareMysqlDataSource() 
    {
        $dataSource = new MysqlDataSource();
        $dataSource->setName('test-mysql');
        $dataSource->setDatabaseName($GLOBALS['db_name']);
        $dataSource->setHost($GLOBALS['db_host']);
        $dataSource->setPassword($GLOBALS['db_password']);
        $dataSource->setPort($GLOBALS['db_port']);
        $dataSource->setUserName($GLOBALS['db_username']);
        DataSourcesRegistry::registerDataSource($dataSource);
    }
    
    public static function createTableForSomeEntity() 
    {
        $pdo = self::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('CREATE TABLE some_entity_data_table (idTable MEDIUMINT NOT NULL AUTO_INCREMENT, a VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci, b VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci, c VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci, PRIMARY KEY (idTable));');
    }

    public static function declareBuiltInTypeConverters()
    {
        DataSourceTypeConvertersRegistry::registerTypeConverter(new IntegerConverter());
        DataSourceTypeConvertersRegistry::registerTypeConverter(new StringConverter());
    }

    public static function declareBuiltInValidators()
    {
        ValidatorsRegistry::registerValidator(new NotEmptyValidator());
        ValidatorsRegistry::registerValidator(new StringLengthValidator());
        ValidatorsRegistry::registerValidator(new NumericRangeValidator());
    }
}
