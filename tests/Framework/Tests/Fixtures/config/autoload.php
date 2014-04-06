<?php
/**
 * autoload.php
 * App class declarations for Autoload
 */

/**
 * Get the base core path from the registry
 * @var String
 */
$appPath = Registry::getVar('app', 'path')
	. DIRECTORY_SEPARATOR
;

/**
 * Controller used by Test cases
 */
Autoload::addClassPath('TestController', $appPath . 'controller' . DIRECTORY_SEPARATOR . 'TestController.php');

/**
 * Entities used by Test cases
 */
Autoload::addClassPath('TestEntity', $appPath . 'entity' . DIRECTORY_SEPARATOR . 'TestEntity.php');