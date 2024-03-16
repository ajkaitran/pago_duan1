<?php
defined('APPPATH') OR exit('Không được quyền truy cập phần này');

// Include file config/database
require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';

// Include file config/config
require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';

// Include file config/autoload
require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';

// Include helper database
require HELPERPATH . DIRECTORY_SEPARATOR . 'database.php';

// Include core base
require COREPATH . DIRECTORY_SEPARATOR . 'base.php';

if (is_array($helpers)) {
    foreach ($helpers as $name) {
        if (!empty($item_auto)) {
            load_helpers($name);
        }
    }
}

session_start();

//connect db
db_connect($db);

require COREPATH . DIRECTORY_SEPARATOR . 'router.php';
















