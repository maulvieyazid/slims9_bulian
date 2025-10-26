<?php

/**
 * Plugin Name: Share Biblio QRCode
 * Plugin URI: -
 * Description: Halaman QRCode untuk berbagi data bibliografi
 * Version: 1.0.0
 * Author: MLV
 * Author URI: https://github.com/maulvieyazid
 */

use SLiMS\Plugins;

$plugins = Plugins::getInstance();

/* WARNING : JANGAN LUPA MENGAKTIFKAN PLUGIN NYA DI OPAC */
$plugins->registerMenu('opac', 'share_qrcode', __DIR__ . '/views/biblio_qrcode.inc.php');
$plugins->registerMenu('opac', 'page_qrcode', __DIR__ . '/views/page_qrcode.inc.php');
