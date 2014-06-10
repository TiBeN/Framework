<?php

namespace TiBeN\Framework\Tests\Renderer;

use TiBeN\Framework\Renderer\SmartyEngine;

// Start of user code SmartyEngine.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class SmartyEngine
 * 
 * Start of user code SmartyEngineTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Renderer
 * @author TiBeN
 */
class SmartyEngineTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code SmartyEngineTest.attributes
    private $fixturesDirectory;
    
    private $tempDirectory;
    // End of user code

    public function setUp()
    {
        // Start of user code SmartyEngineTest.setUp
        $this->fixturesDirectory = dirname(__FILE__) 
            . '/../Fixtures/Renderer/smarty_templates'
        ;
        $this->tempDirectory = sys_get_temp_dir();
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code SmartyEngineTest.tearDown
        
        // Delete smarty temporary directory content
        $smartyTempDir = $this->tempDirectory 
            . DIRECTORY_SEPARATOR 
            . 'smarty'
        ;
        
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $smartyTempDir, 
                \FilesystemIterator::SKIP_DOTS
            ), 
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($iterator as $filename => $fileInfo) {
            if ($fileInfo->isDir()) {
                rmdir($filename);
            } else {
                unlink($filename);
            }
        }    
        // End of user code
    }
    
    

    /**
     * Test method render from interface TemplateEngine
     * Start of user code TemplateEngine.testrenderAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testRender()
    {
        // Start of user code TemplateEngine.testrender

        // Case 1 : Test render without setting variables
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory($this->tempDirectory);
        $smartyEngine->setTemplateFileName(
            $this->fixturesDirectory
            . DIRECTORY_SEPARATOR 
            . 'smarty_template_without_vars.tpl'
        );
        $this->assertEquals(
            file_get_contents(
                $this->fixturesDirectory 
                . DIRECTORY_SEPARATOR
                . 'smarty_template_without_vars_rendered.html'
            ),
            $smartyEngine->render()
        );
        
        // Case 2 : Test render with vars
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory($this->tempDirectory);
        $smartyEngine->setTemplateFileName(
            $this->fixturesDirectory
            . DIRECTORY_SEPARATOR 
            . 'smarty_template_with_vars.tpl'
        );
        $smartyEngine->getVariables()->set('foo', 'bar');
        $smartyEngine->getVariables()->set('foo2', 'bar2');
        $this->assertEquals(
            file_get_contents(
                $this->fixturesDirectory 
                . DIRECTORY_SEPARATOR
                . 'smarty_template_with_vars_rendered.html'
            ),
            $smartyEngine->render()
        );
        // End of user code
    }

    // Start of user code SmartyEngineTest.methods

    /**
     * Test exception when no template file is set
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No template file name has been set
     */
    public function testNoTemplateFileSetException() 
    {
        $smartyEngine = new SmartyEngine();
        $smartyEngine->render();
    }
    
    /**
     * Test exception when template file set doesn't exist

     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Template file name "/pass/to/fake/template/file.tpl" doesn't exist
     */
    public function testTemplateFileDoesntExistException() 
    {
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTemplateFileName('/pass/to/fake/template/file.tpl');
        $smartyEngine->render();
    }

    /**
     * Test exception when tmp path set doesn't exist
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Tmp path "/fake/path" doesn't exist
     */
    public function testTempDirectoryDoesntExistException()
    {
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory('/fake/path');
        $smartyEngine->setTemplateFileName(
            $this->fixturesDirectory
            . DIRECTORY_SEPARATOR 
            . 'smarty_template_with_vars.tpl'
        );
        $smartyEngine->render();
    }

    /**
     * Test exception when tmp path set is not writable
     * This case assume tests are not launch by root (which is never a good idea!)
     * @expectedException RuntimeException
     * @expectedExceptionMessage Tmp path "/root/" is not writable
     */
    public function testTempDirectoryNotWritableException() 
    {
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory('/root/');
        $smartyEngine->setTemplateFileName(
            $this->fixturesDirectory
            . DIRECTORY_SEPARATOR 
            . 'smarty_template_with_vars.tpl'
        );
        $smartyEngine->render();
    
    }
    // End of user code
}
