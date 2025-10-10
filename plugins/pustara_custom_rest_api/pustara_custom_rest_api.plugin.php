<?php

/**
 * Plugin Name: Rest API Custom untuk Pustara
 * Plugin URI: -
 * Description: Rest API ini nantinya bisa digunakan untuk aplikasi lain, utamanya untuk Aplikasi Edutara
 * Version: 1.0.0
 * Author: MLV
 * Author URI: https://github.com/maulvieyazid
 */

use SLiMS\Plugins;

$plugins = Plugins::getInstance();

/* WARNING : JANGAN LUPA MENGAKTIFKAN PLUGIN NYA DI OPAC */
$plugins->register('custom_api_route', function ($router) {
    require_once __DIR__ . '/controllers/CustomController.php';
    
    $router->map('GET', '/books/latest', 'CustomController@getLatestBooks');
});
