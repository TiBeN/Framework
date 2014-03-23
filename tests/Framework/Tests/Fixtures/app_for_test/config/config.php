<?php 

/**
 * Application Config File
 * If you want to tweak the default framework behaviour, 
 * overload the default config key available at core/config.php
 */

/**
 * identity
 * Set here the name of your app
 */
Registry::setVar('app', 'name', 'app_for_tests');
Registry::setVar('app', 'url', 'http://localhost/tests/');

/**
 * Debug Level
 * 0 => No Errors are shown at all
 * 1 => Only Warning and Errors are shown
 * 2 => All Error warning notices are shown
 */
 
Registry::setVar('app', 'debug', 2);