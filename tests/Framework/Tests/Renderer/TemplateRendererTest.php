<?php

namespace TiBeN\Framework\Tests\Renderer;

use TiBeN\Framework\Renderer\TemplateRenderer;

// Start of user code TemplateRenderer.useStatements
use TiBeN\Framework\Renderer\SmartyEngine;
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class TemplateRenderer
 * 
 * Start of user code TemplateRendererTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Renderer
 * @author TiBeN
 */
class TemplateRendererTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code TemplateRendererTest.attributes
    private $fixturesDirectory;

    private $tempDirectory;
	// End of user code

    public function setUp()
    {
        // Start of user code TemplateRendererTest.setUp
        $this->fixturesDirectory = dirname(__FILE__) 
            . '/../Fixtures/Renderer/smarty_templates'
        ;
        $this->tempDirectory = sys_get_temp_dir();
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code TemplateRendererTest.tearDown

		// Delete smarty temporary directory content
        $smartyTempDir = $this->tempDirectory 
            . DIRECTORY_SEPARATOR 
            . 'smarty'
        ;
       
        if(!file_exists($smartyTempDir)) {
            return;
        }

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
     * Test static method renderUsing from class TemplateRenderer
     *
     * Start of user code TemplateRendererTest.testrenderUsingAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testRenderUsing()
    {
        // Start of user code TemplateRendererTest.testrenderUsing
        // This case is covered by testRender
        // End of user code
    }
    
    /**
     * Test static method render from class TemplateRenderer
     *
     * Start of user code TemplateRendererTest.testrenderAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testRender()
    {
        // Start of user code TemplateRendererTest.testrender
	    $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory($this->tempDirectory);
        TemplateRenderer::setDefaultTemplateEngine($smartyEngine); 
        TemplateRenderer::setDefaultTemplatesDirectory($this->fixturesDirectory);

		$this->assertEquals(
			file_get_contents(
                $this->fixturesDirectory 
                . DIRECTORY_SEPARATOR 
                . 'smarty_template_without_vars_rendered.html'
            ),
			TemplateRenderer::render('smarty_template_without_vars.tpl')
		);
        // End of user code
    }

    // Start of user code TemplateRendererTest.methods
    
    /**
     * Test render with setting variables
     */
    public function testRenderSettingVariables()
    {
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory($this->tempDirectory);
        TemplateRenderer::setDefaultTemplateEngine($smartyEngine); 
        TemplateRenderer::setDefaultTemplatesDirectory($this->fixturesDirectory);

        $variables = array(
            'foo' => 'bar',
            'foo2' => 'bar2'
        );    
		$this->assertEquals(
			file_get_contents(
                $this->fixturesDirectory 
                . DIRECTORY_SEPARATOR 
                . 'smarty_template_with_vars_rendered.html'
            ),
            TemplateRenderer::render(
                'smarty_template_with_vars.tpl',
                AssociativeArray::createFromNativeArray(null, $variables)
            )
		);
    }

    /**
     * Test render with setting variables and globals
     */
    public function testRenderSettingVariablesAndGlobals()
    {
        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory($this->tempDirectory);
        TemplateRenderer::setDefaultTemplateEngine($smartyEngine); 
        TemplateRenderer::setDefaultTemplatesDirectory($this->fixturesDirectory);

		$variables = array(
            'foo' => 'bar',
            'foo2' => 'bar2'
        );
		TemplateRenderer::getGlobals()->set('foo3', 'bar3');
		$this->assertEquals(
			file_get_contents(
                $this->fixturesDirectory 
                . DIRECTORY_SEPARATOR 
                . 'smarty_template_with_globals_vars_rendered.html'
            ),
			TemplateRenderer::render(
                'smarty_template_with_globals_vars.tpl', 
                AssociativeArray::createFromNativeArray(null, $variables)
            )
		);
    }
	// End of user code
}
