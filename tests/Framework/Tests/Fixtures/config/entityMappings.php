<?php 
/**
 * EntityMapping configuration
 */

/* Mapping for entity Test */
EntityMappingsRegistry::registerEntityMapping(EntityMapping::create(array(
    'entity' => 'Test',
    'datasource' => array(
        'name' => 'test-framework',
        'tableName' => 'test'                        
    ),
    'attributes' => array(
        'id' => array(
           'isIdentifier' => true,
           'columnName' => 'test_id',
           'columnType' => 'integer',
           'isAutoIncrement' => true,
           'validation' => array(
               // Regles de validation ici
           )
        ),
        'stringField' => array(
           'columnName' => 'some_string_field', 
           'columnType' => 'varchar'
        ),
        'intField' => array(
           'columnName' => 'intfield',
           'columnType' => 'integer'
        ),   
        'decimalField' => array(
           'columnName' => 'some_decimal_field',
           'columnType' => 'decimal'
        ),
    )    
)));
