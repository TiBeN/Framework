<?php

namespace TiBeN\Framework\Renderer;


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
    public $tmpPath;

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
    public function getTmpPath()
    {
        // Start of user code Getter SmartyEngine.getTmpPath
        // End of user code
        return $this->tmpPath;
    }

    /**
     * @param string $tmpPath
     */
    public function setTmpPath($tmpPath)
    {
        // Start of user code Setter SmartyEngine.setTmpPath
        // End of user code
        $this->tmpPath = $tmpPath;
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
        // TODO should be implemented.
        // End of user code
    
        return $generatedContent;
    }

    // Start of user code SmartyEngine.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
