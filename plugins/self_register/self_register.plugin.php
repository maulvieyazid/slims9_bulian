<?php

/**
 * Plugin Name: Self Register
 * Plugin URI: -
 * Description: Halaman untuk pendaftaran mandiri member pustara
 * Version: 1.0.0
 * Author: MLV
 * Author URI: https://github.com/maulvieyazid
 */

use SLiMS\Plugins;

$plugins = Plugins::getInstance();

/* WARNING : JANGAN LUPA MENGAKTIFKAN PLUGIN NYA DI OPAC */
$plugins->registerMenu('opac', 'self_register', __DIR__ . '/controllers/SelfRegisterController.php');
$plugins->registerMenu('opac', 'success_self_register', __DIR__ . '/controllers/SuccessSelfRegisterController.php');
$plugins->registerMenu('opac', 'activated_self_register', __DIR__ . '/views/activated.php');
