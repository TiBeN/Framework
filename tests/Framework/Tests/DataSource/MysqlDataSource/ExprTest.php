<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\Expr;

// Start of user code Expr.useStatements
use TiBeN\Framework\Datatype\GenericCollection;
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class Expr
 * 
 * Start of user code ExprTest.testAnnotations
 * @group expr-test 
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class ExprTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ExprTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code ExprTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ExprTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test static method concat from class Expr
     *
     * Start of user code ExprTest.testconcatAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testConcat()
    {
        // Start of user code ExprTest.testconcat
        $expectedExpr = "((foo = :foo0 OR foo != :foo1) AND (foobar > :foobar0 AND foobar < :foobar1)) OR foobar > :foobar2 OR foobar < :foobar3";
        
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
        $this->assertEquals($expectedExpr, $expr->toString());
        
        $expectedExprParameters = AssociativeArray::createFromNativeArray(null, array(
            'foo0' => 'bar',
            'foo1' => 'baz',
            'foobar0' => 5,
            'foobar1' => 10,
            'foobar2' => 30,
            'foobar3' => 60
        ));
        
        $this->assertEquals(
            $expectedExprParameters, 
            $expr->getExprParameters()
        );
        // End of user code
    }
    
    /**
     * Test static method fromString from class Expr
     *
     * Start of user code ExprTest.testfromStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testFromString()
    {
        // Start of user code ExprTest.testfromString
        // Tests covered by testConcat
        // End of user code
    }
    
    /**
     * Test method toString from class Expr
     *
     * Start of user code ExprTest.testtoStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testToString()
    {
        // Start of user code ExprTest.testtoString
        // Tests covered by testConcat
        // End of user code
    }

    // Start of user code ExprTest.methods
    // Place additional tests methods here.  
    // End of user code
}
