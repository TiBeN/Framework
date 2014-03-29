<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\RouteUriManager;

// Start of user code RouteUriManagerTest.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Router\RouteUriMatchAndParseResult;

// End of user code

/**
 * Test cases for class RouteUriManager
 * 
 * Start of user code RouteUriManagerTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 * @author TiBeN
 */
class RouteUriManagerTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code RouteUriManagerTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code RouteUriManagerTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code RouteUriManagerTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test static method generateUri from class RouteUriManager
     *
     * Start of user code RouteUriManagerTest.testgenerateUriAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testGenerateUri()
    {
        // Start of user code RouteUriManagerTest.testgenerateUri
        // Test cases
        $testCases = array(
            array('/', array(), '/'),
            array('/test/', array(), '/test/'),
            array('/test.html', array(), '/test.html'),
            array(
                '/test/{foo}/{bar}.html',
                array('foo' => 'somedata', 'bar' => '1'),
                '/test/somedata/1.html'
            ),
            array(
                '/test/{foo}/{foo}.html',
                array('foo' => 'somedata'),
                '/test/somedata/somedata.html'
            ),
        );

        foreach ($testCases as $testCase) {

            $routeUriManager = new RouteUriManager();

            $this->assertEquals(
                // expected uri
                $testCase[2],
                $routeUriManager->generateUri(
                    // uri pattern
                    $testCase[0],
                    // variables
                    AssociativeArray::createFromNativeArray('string', $testCase[1])
                )
            );

        }
        // End of user code
    }
    
    /**
     * Test static method matchAndParseUri from class RouteUriManager
     *
     * Start of user code RouteUriManagerTest.testmatchAndParseUriAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testMatchAndParseUri()
    {
        // Start of user code RouteUriManagerTest.testmatchAndParseUri

        // Test cases
        $testCases = array(
            array('/', '/', array(), array('match' => true, 'variables' => array())),
            array(
                '/test/',
                '/test/',
                array(),
                array('match' => true, 'variables' => array())
            ),
            array(
                '/test',
                '/test/',
                array(),
                array('match' => false, 'variables' => array())
            ),
            array(
                '/test.html',
                '/test.html',
                array(),
                array('match' => true, 'variables' => array())
            ),
            array(
                '/test/?foo=bar',
                '/test/',
                array(),
                array('match' => true, 'variables' => array())
            ),
            array(
                '/test/somedata/1.html',
                '/test/{foo}/{bar}.html',
                array(),
                array(
                    'match' => true,
                    'variables' => array(
                        'foo' => 'somedata',
                        'bar' => '1'
                    )
                )
            ),
            array(
                '/test/somedata/1.html',
                '/test/{foo}/{bar}.html',
                array('foo' => '[a-z]+', 'bar' => '[0-9]+'),
                array(
                    'match' => true,
                    'variables' => array('foo' => 'somedata', 'bar' => '1')
                )
            ),
            array(
                '/test/somedata/somedata.html',
                '/test/{foo}/{foo}.html',
                array('foo' => '[a-z]+'),
                array('match' => true, 'variables' => array('foo' => 'somedata'))
            ),
            array(
                '/test/some-data/1.html',
                '/test/{foo}/{bar}.html',
                array('foo' => '[a-z]+', 'bar' => '[0-9]+'),
                array('match' => false, 'variables' => array())
            ),
            array(
                '/test/somedata/1b.html',
                '/test/{foo}/{bar}.html',
                array('foo' => '[a-z]+', 'bar' => '[0-9]+'),
                array('match' => false, 'variables' => array())
            ),
            array(
                '/test/x-5-15/1.html',
                '/test/{foo}/{bar}.html',
                array('foo' => '[a-z0-9-]+', 'bar' => '[0-9]+'),
                array(
                    'match' => true,
                    'variables' => array('foo' => 'x-5-15', 'bar' => '1')
                )
            ),
        );

        foreach ($testCases as $testCase) {

            $routeUriManager = new RouteUriManager();

            $expectedMatchResult = new RouteUriMatchAndParseResult();
            $expectedMatchResult->setMatch($testCase[3]['match']);
            $expectedMatchResult->setParsedVariables(
                AssociativeArray::createFromNativeArray(
                    'string',
                    $testCase[3]['variables']
                )
            );

            $matchResult = $routeUriManager->matchAndParseUri(
                // uri to match
                $testCase[0],
                // uri pattern
                $testCase[1],
                // optional requirments to match
                AssociativeArray::createFromNativeArray('string', $testCase[2])
            );

            $this->assertEquals(
                $expectedMatchResult,
                $matchResult
            );
        }
        // End of user code
    }

    // Start of user code RouteUriManagerTest.methods

    /**
     * Test the Uri exceptions from pattern and variables generator.
     * This must throw an exception because some vars are needed to generate the uri
     * but no vars are present.
     *
     * @expectedException InvalidArgumentException
     */
    public function testGenerateUriVarsNeededException()
    {
        $routeUriManager = new RouteUriManager();
        $routeUriManager->generateUri(
            '/{foo}/{bar}-{baz}/test.html',
            new AssociativeArray('string')
        );
    }

    /**
     * Test the Uri exceptions from pattern and variables generator
     * The must throw an exception because some vars are available but no vars
     * are needed to generate the uri.
     *
     * @expectedException InvalidArgumentException
     */
    public function testGenerateUriUnusedVarsException()
    {
        $routeUriManager = new RouteUriManager();
        $routeUriManager->generateUri(
            '/test.html',
            AssociativeArray::createFromNativeArray('string', array('foo' => 'bar'))
        );
    }

    /**
     * Test the Uri exceptions from pattern and variables generator
     * The must throw an exception because vars passed are not the required
     * vars to generate the uri.
     *
     * @expectedException InvalidArgumentException
     */
    public function testGenerateUriMissRequiredVarsException()
    {
        $routeUriManager = new RouteUriManager();
        $routeUriManager->generateUri(
            '/{baz}/test.html',
            AssociativeArray::createFromNativeArray('string', array('foo' => 'bar'))
        );
    }
    // End of user code
}
