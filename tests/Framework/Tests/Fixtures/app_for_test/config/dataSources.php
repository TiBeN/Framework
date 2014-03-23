<?php 
/**
 * DataSources configuration 
 */

// Mysql database configured in phpunit.xml
$mysqlDataSource = new MysqlDataSource();
$mysqlDataSource->setName('test-framework');
$mysqlDataSource->setHost($GLOBALS['db_host']);
$mysqlDataSource->setUser($GLOBALS['db_username']);
$mysqlDataSource->setPassword($GLOBALS['db_password']);
$mysqlDataSource->setDataBaseName($GLOBALS['db_name']); 
$mysqlDataSource->setPort($GLOBALS['db_port']);

DataSourcesRegistry::registerDataSource($mysqlDataSource);