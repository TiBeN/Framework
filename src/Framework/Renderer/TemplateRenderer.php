<?php

namespace TiBeN\Framework\Renderer;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Service that help in generating views using templates.
 *
 * @package Renderer
 * @author TiBeN
 */
class TemplateRenderer
{
    /**
     * @var string
     */
    public static $templatesBasePath;

    /**
     * @var string
     */
    public $templatePath;

    /**
     * @var string
     */
    public $templateName;

    /**
     * @var AssociativeArray
     */
    public $variables;

    /**
     * @var TemplateEngine
     */
    public $templateEngine;

    /**
     * @var AssociativeArray
     */
    public static $globals;

    public function __construct()
    {
        // Start of user code TemplateRenderer.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code TemplateRenderer.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public static function getTemplatesBasePath()
    {
        // Start of user code Static getter TemplateRenderer.getTemplatesBasePath
        // End of user code
        return self::$templatesBasePath;
    }

    /**
     * @param string $templatesBasePath
     */
    public static function setTemplatesBasePath($templatesBasePath)
    {
        // Start of user code Static setter TemplateRenderer.setTemplatesBasePath
        // End of user code
        self::$templatesBasePath = $templatesBasePath;
    }

    /**
     * @return string
     */
    public function getTemplatePath()
    {
        // Start of user code Getter TemplateRenderer.getTemplatePath
        // End of user code
        return $this->templatePath;
    }

    /**
     * @param string $templatePath
     */
    public function setTemplatePath($templatePath)
    {
        // Start of user code Setter TemplateRenderer.setTemplatePath
        // End of user code
        $this->templatePath = $templatePath;
    }

    /**
     * @return string
     */
    public function getTemplateName()
    {
        // Start of user code Getter TemplateRenderer.getTemplateName
        // End of user code
        return $this->templateName;
    }

    /**
     * @param string $templateName
     */
    public function setTemplateName($templateName)
    {
        // Start of user code Setter TemplateRenderer.setTemplateName
        // End of user code
        $this->templateName = $templateName;
    }

    /**
     * @return AssociativeArray
     */
    public function getVariables()
    {
        // Start of user code Getter TemplateRenderer.getVariables
        // End of user code
        return $this->variables;
    }

    /**
     * @param AssociativeArray $variables
     */
    public function setVariables(AssociativeArray $variables)
    {
        // Start of user code Setter TemplateRenderer.setVariables
        // End of user code
        $this->variables = $variables;
    }

    /**
     * @return TemplateEngine
     */
    public function getTemplateEngine()
    {
        // Start of user code Getter TemplateRenderer.getTemplateEngine
        // End of user code
        return $this->templateEngine;
    }

    /**
     * @param TemplateEngine $templateEngine
     */
    public function setTemplateEngine(TemplateEngine $templateEngine)
    {
        // Start of user code Setter TemplateRenderer.setTemplateEngine
        // End of user code
        $this->templateEngine = $templateEngine;
    }

    /**
     * @return AssociativeArray
     */
    public static function getGlobals()
    {
        // Start of user code Static getter TemplateRenderer.getGlobals
        // End of user code
        return self::$globals;
    }

    /**
     * @param AssociativeArray $globals
     */
    public static function setGlobals(AssociativeArray $globals)
    {
        // Start of user code Static setter TemplateRenderer.setGlobals
        // End of user code
        self::$globals = $globals;
    }

    /**
     * Render the template using variables and globals set and return the generated content
     *
     * @return string $generatedContent
     */
    public function render()
    {
        // Start of user code TemplateRenderer.render
        // TODO should be implemented.
        // End of user code
    
        return $generatedContent;
    }

    // Start of user code TemplateRenderer.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
