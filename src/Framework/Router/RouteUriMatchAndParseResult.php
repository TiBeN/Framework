<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code RouteUriMatchAndParseResult.useStatements
// Place your use statements here.
// End of user code

/**
 * Object/value that hold a route URI match and parse result operation
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class RouteUriMatchAndParseResult
{
    /**
     * @var AssociativeArray
     */
    public $parsedVariables;

    /**
     * @var bool
     */
    public $match;

    public function __construct()
    {
        // Start of user code RouteUriMatchAndParseResult.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code RouteUriMatchAndParseResult.destructor
        // End of user code
    }

    /**
     * @return AssociativeArray
     */
    public function getParsedVariables()
    {
        // Start of user code Getter RouteUriMatchAndParseResult.getParsedVariables
        // End of user code
        return $this->parsedVariables;
    }

    /**
     * @param AssociativeArray $parsedVariables
     */
    public function setParsedVariables(AssociativeArray $parsedVariables)
    {
        // Start of user code Setter RouteUriMatchAndParseResult.setParsedVariables
        // End of user code
        $this->parsedVariables = $parsedVariables;
    }

    /**
     * @return bool
     */
    public function getMatch()
    {
        // Start of user code Getter RouteUriMatchAndParseResult.getMatch
        // End of user code
        return $this->match;
    }

    /**
     * @param bool $match
     */
    public function setMatch($match)
    {
        // Start of user code Setter RouteUriMatchAndParseResult.setMatch
        // End of user code
        $this->match = $match;
    }

    // Start of user code RouteUriMatchAndParseResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
