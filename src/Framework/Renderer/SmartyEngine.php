<?php

namespace TiBeN\Framework\Renderer;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code SmartyEngine.useStatements
// Place your use statements here.
// End of user code

/**
 * Specific template engine that use the Smarty template engine. 
 * This is used by default by the TemplateRenderer.
 * more infos about Smarty : 
 *
 * @package Renderer
 * @author TiBeN
 */
class SmartyEngine implements TemplateEngine
{
    /**
     * @var string
     */
    public $tempDirectory;

    /**
     * @var AssociativeArray
     */
    public $variables;

    /**
     * @var string
     */
    public $templateFileName;

    public function __construct()
    {
        // Start of user code SmartyEngine.constructor
        $this->variables = new AssociativeArray('string');
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code SmartyEngine.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getTempDirectory()
    {
        // Start of user code Getter SmartyEngine.getTempDirectory
        // End of user code
        return $this->tempDirectory;
    }

    /**
     * @param string $tempDirectory
     */
    public function setTempDirectory($tempDirectory)
    {
        // Start of user code Setter SmartyEngine.setTempDirectory
        // End of user code
        $this->tempDirectory = $tempDirectory;
    }

    // TemplateEngine Realization

    /**
     * @return AssociativeArray
     */
    public function getVariables()
    {
        // Start of user code Getter TemplateEngine.getVariables
        // End of user code
        return $this->variables;
    }

    /**
     * @param AssociativeArray $variables
     */
    public function setVariables(AssociativeArray $variables)
    {
        // Start of user code Setter TemplateEngine.setVariables
        // End of user code
        $this->variables = $variables;
    }

    /**
     * @return string
     */
    public function getTemplateFileName()
    {
        // Start of user code Getter TemplateEngine.getTemplateFileName
        // End of user code
        return $this->templateFileName;
    }

    /**
     * @param string $templateFileName
     */
    public function setTemplateFileName($templateFileName)
    {
        // Start of user code Setter TemplateEngine.setTemplateFileName
        // End of user code
        $this->templateFileName = $templateFileName;
    }
    /**
     * Render the template using variables and globals set and return the generated content
     *
     * @return string $generatedContent
     */
    public function render()
    {
        // Start of user code TemplateEngine.render
        if (!isset($this->templateFileName)) {
			throw new \InvalidArgumentException('No template file name has been set');
		}
		
		if (!file_exists($this->templateFileName)) {
			throw new \InvalidArgumentException(
                sprintf(
                    'Template file name "%s" doesn\'t exist', 
                    $this->templateFileName
                )
            );
		}
		
		// Init temporary dir
        if (!file_exists($this->tempDirectory)) {
            throw new \InvalidArgumentException(
                sprintf('Tmp path "%s" doesn\'t exist', $this->tempDirectory)
           );
        }
		if (!is_writable($this->tempDirectory)) {
			throw new \RuntimeException(
                sprintf('Tmp path "%s" is not writable', $this->tempDirectory)
            );
		}
        $smartyCacheDirectory = $this->tempDirectory 
            . DIRECTORY_SEPARATOR 
            . 'smarty' 
            . DIRECTORY_SEPARATOR 
            . 'cache'
        ;
        if (!file_exists($smartyCacheDirectory)) {
            mkdir($smartyCacheDirectory, 0777, true); 
        }
        $smartyCompilDirectory = $this->tempDirectory 
            . DIRECTORY_SEPARATOR 
            . 'smarty' 
            . DIRECTORY_SEPARATOR 
            . 'compile'
        ;
        if (!file_exists($smartyCompilDirectory)) {
            mkdir($smartyCompilDirectory, 0777, true);
        }
		
		$smarty = new \Smarty();
		$smarty->setCacheDir($smartyCacheDirectory);
		$smarty->setCompileDir($smartyCompilDirectory);
		$smarty->registerClass('Uri', 'TiBeN\\Framework\\Renderer\\SmartyUriHandler');
		$smarty->registerPlugin("function","uri", array(new SmartyUriHandler(), 'getUri'));
			
		// Assign variables
		if (!$this->variables->isEmpty()) {
			foreach($this->variables->toNativeArray() as $key => $value) {
				$smarty->assign($key, $value);
			}
		}
			
		// Render the template
		$generatedContent = $smarty->fetch($this->templateFileName);			
        
        // End of user code
    
        return $generatedContent;
    }

    // Start of user code SmartyEngine.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
