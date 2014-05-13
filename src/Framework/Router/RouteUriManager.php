<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code RouteUriManager.useStatements
// Place your use statements here.
// End of user code

/**
 * Contain methods to manipulate ressources URIs
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class RouteUriManager
{
    public function __construct()
    {
        // Start of user code RouteUriManager.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code RouteUriManager.destructor
        // End of user code
    }

    /**
     * Generate an uri from an uri pattern and optional variables.
     *
     * @param string $uriPattern
     * @param AssociativeArray $variables
     * @return string $uri
     */
    public static function generateUri($uriPattern, AssociativeArray $variables)
    {
        // Start of user code RouteUriManager.generateUri
        preg_match_all('/\{([^{}]+)\}/', $uriPattern, $matches);

        // no vars case
        if (empty($matches[1]) && $variables->isEmpty()) {
            return $uriPattern;
        }

        // Remove duplicates extracted vars from uri pattern
        $matches[0] = array_unique($matches[0]);
        $matches[1] = array_unique($matches[1]);

        // Prevent unmatch required vars
        if (count($matches[1]) != $variables->count()) {
            throw new \InvalidArgumentException(
                'Passed vars does not match required from uri pattern'
            );
        }

        $uri = $uriPattern;
        foreach ($matches[1] as $nb => $key) {
            if (!$variables->has($key)) {
                throw new \InvalidArgumentException(
                    'Variable \"' . $key . '\" required but not found'
                );
            }
            $uri = str_replace($matches[0][$nb], $variables->get($key), $uri);
        }
        // End of user code
    
        return $uri;
    }

    /**
     * Test an uri against an uri pattern and optionnal variables requirments 
     * then return parsed variables if match.
     *
     * @param string $uri
     * @param string $uriPattern
     * @param AssociativeArray $requirments
     * @return RouteUriMatchAndParseResult $matchResult
     */
    public static function matchAndParseUri($uri, $uriPattern, AssociativeArray $requirments)
    {
        // Start of user code RouteUriManager.matchAndParseUri
        $matchResult = new RouteUriMatchAndParseResult();

        // escape query params
        $parseUriResults = parse_url($uri);
        $uri = $parseUriResults['path'];

        // Match exact $uri
        if ($uri == $uriPattern) {
            $matchResult->setMatch(true);
            $matchResult->setParsedVariables(new AssociativeArray('string'));
            return $matchResult;
        }

        /* create match pattern */
        $pregCompliantUriPattern = preg_quote($uriPattern, '/');
        foreach ($requirments->toNativeArray() as $var => $pattern) {
            $pregCompliantUriPattern = str_replace(
                '\{' . $var . '\}',
                '(' . $pattern. ')',
                $pregCompliantUriPattern
            );
        }
        $pregCompliantUriPattern = '/^'
            . preg_replace('/\\\{([^{}]+)\\\}/', '(.*)', $pregCompliantUriPattern)
            . '$/'
        ;

        // Match uri pattern
        if (!preg_match($pregCompliantUriPattern, $uri, $matches)) {
            $matchResult->setMatch(false);
            $matchResult->setParsedVariables(new AssociativeArray('string'));
            return $matchResult;
        }
        array_shift($matches);

        // parse params to get order
        preg_match_all('/\{([^{}]+)\}/', $uriPattern, $matchesForParamsOrder);

        if (count($matches) != count($matchesForParamsOrder)) {
            $matchResult->setMatch(false);
            $matchResult->setParsedVariables(new AssociativeArray('string'));
            return $matchResult;
        }

        $matchResult->setMatch(true);
        $matchResult->setParsedVariables(
            AssociativeArray::createFromNativeArray(
                'string',
                array_combine($matchesForParamsOrder[1], $matches)
            )
        );
        // End of user code
    
        return $matchResult;
    }

    // Start of user code RouteUriManager.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
