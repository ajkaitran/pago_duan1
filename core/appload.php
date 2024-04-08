<?php
defined('APPPATH') or exit('Không được quyền truy cập phần này');

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
        load_helpers($name);
    }
}

session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

//connect db
db_connect($db);

require COREPATH . DIRECTORY_SEPARATOR . 'router.php';
