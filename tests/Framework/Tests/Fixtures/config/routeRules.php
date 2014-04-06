<?php 
/**
 * routeRules.php
 * App routes Rules. 
 * Define here your mapping httpRequest -> Controller/Action/params
 */
use TiBeN\Framework\Router\Router;
use TiBeN\Framework\Router\RouteRule;

$routeRule = new RouteRule();
$routeRule->setName('some-route-for-testing-bootstrap');
$routeRule->setUriPattern('/testing-bootstrap-routerule');
Router::addRouteRule($routeRule);
