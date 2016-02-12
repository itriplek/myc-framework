<?php
/*
 * Front Controller
 *
 */

require '../Core/Router.php';

$router = new Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('post', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}');

// Display all the routes
echo '<pre>';
echo htmlspecialchars( print_r($router->getRoutes(), true) );
echo '</pre>';

$url = $_SERVER['QUERY_STRING'];
if ( $router->match($url) ) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo 'No Match found for this path';
}