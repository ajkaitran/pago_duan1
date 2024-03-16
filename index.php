<?php
// Sonw ddax ow dday
/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */



$app_path = dirname(__FILE__);
define('APPPATH', $app_path);


/*
 * --------------------------------------------------------------------
 * core path
 * --------------------------------------------------------------------
 */
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);


/*
 * --------------------------------------------------------------------
 * controllers path
 * --------------------------------------------------------------------
 */
$controllers_folder = 'controllers';
define('CONTROLLERPATH', APPPATH.DIRECTORY_SEPARATOR.$controllers_folder);

/*
 * --------------------------------------------------------------------
 * controllers path
 * --------------------------------------------------------------------
 */
$views_folder = 'views';
define('VIEWPATH', APPPATH.DIRECTORY_SEPARATOR.$views_folder);

/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helpers';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);


/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder= 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);

require COREPATH.DIRECTORY_SEPARATOR.'appload.php';
