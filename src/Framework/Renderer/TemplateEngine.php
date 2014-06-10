<?php

namespace TiBeN\Framework\Renderer;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Responsible of rendering a template using variables. 
 * This Interface describes the engines classes used by the TemplateRenderer 
 * in order to render templates. You can implement this interface if you want to use 
 * a specific template engine with the TemplateRenderer 
 *
 * @package TiBeN\Framework\Renderer
 * @author TiBeN
 */ 
interface TemplateEngine
{
    /**
     * @return string
     */
    public function getTemplateFileName();

    /**
     * @param string $templateFileName
     */
    public function setTemplateFileName($templateFileName);

    /**
     * @return AssociativeArray
     */
    public function getVariables();

    /**
     * @param AssociativeArray $variables
     */
    public function setVariables(AssociativeArray $variables);

    /**
     * Render the template using variables and globals set and return the generated content
     *
     * @return string $generatedContent
     */
    public function render();

}
