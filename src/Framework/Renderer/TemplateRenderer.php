<?php

namespace TiBeN\Framework\Renderer;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code TemplateRenderer.useStatements
// Place your use statements here.
// End of user code

/**
 * Service that help in generating views using templates.
 *
 * @package Renderer
 * @author TiBeN
 */
class TemplateRenderer
{
    /**
     * @var TemplateEngine
     */
    public static $defaultTemplateEngine;

    /**
     * @var AssociativeArray
     */
    public static $globals;

    /**
     * @var string
     */
    public static $defaultTemplatesDirectory;

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
     * @return TemplateEngine
     */
    public static function getDefaultTemplateEngine()
    {
        // Start of user code Static getter TemplateRenderer.getDefaultTemplateEngine
        // End of user code
        return self::$defaultTemplateEngine;
    }

    /**
     * @param TemplateEngine $defaultTemplateEngine
     */
    public static function setDefaultTemplateEngine(TemplateEngine $defaultTemplateEngine)
    {
        // Start of user code Static setter TemplateRenderer.setDefaultTemplateEngine
        // End of user code
        self::$defaultTemplateEngine = $defaultTemplateEngine;
    }

    /**
     * @return AssociativeArray
     */
    public static function getGlobals()
    {
        // Start of user code Static getter TemplateRenderer.getGlobals
        if (!self::$globals instanceof AssociativeArray) {
            self::$globals = new AssociativeArray();
        }
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
     * @return string
     */
    public static function getDefaultTemplatesDirectory()
    {
        // Start of user code Static getter TemplateRenderer.getDefaultTemplatesDirectory
        // End of user code
        return self::$defaultTemplatesDirectory;
    }

    /**
     * @param string $defaultTemplatesDirectory
     */
    public static function setDefaultTemplatesDirectory($defaultTemplatesDirectory)
    {
        // Start of user code Static setter TemplateRenderer.setDefaultTemplatesDirectory
        // End of user code
        self::$defaultTemplatesDirectory = $defaultTemplatesDirectory;
    }

    /**
     * Render the template using the specified template engine
     *
     * @param TemplateEngine $templateEngine
     * @param string $templateName
     * @param AssociativeArray $variables
     * @return string $renderedContent
     */
    public static function renderUsing(TemplateEngine $templateEngine, $templateName, AssociativeArray $variables = NULL)
    {
        // Start of user code TemplateRenderer.renderUsing
            
        // Merge variables and globals
        if(is_null($variables)) {
            $variables = new AssociativeArray();
        }
        $variables->merge(self::getGlobals());

        $templateFileName = self::getDefaultTemplatesDirectory() 
            . DIRECTORY_SEPARATOR 
            . $templateName
        ;
                    
        // Assign rendering parameters to template engine
        $templateEngine->setTemplateFileName($templateFileName);
        $templateEngine->setVariables($variables);
        
        $renderedContent = $templateEngine->render();
        // End of user code
    
        return $renderedContent;
    }

    /**
     * Render the template using variables and globals set and return the generated content
     *
     * @param string $templateName
     * @param AssociativeArray $variables
     * @return string $renderedContent
     */
    public static function render($templateName, AssociativeArray $variables = NULL)
    {
        // Start of user code TemplateRenderer.render
        if (!self::$defaultTemplateEngine instanceof TemplateEngine) {
            throw new \RuntimeException('TemplateRenderer has no default TemplateEngine set');
        }
        return self::renderUsing(
            self::$defaultTemplateEngine,
            $templateName,
            $variables
        );
        // End of user code
    
        return $renderedContent;
    }

    // Start of user code TemplateRenderer.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
