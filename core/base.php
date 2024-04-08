<?php

defined('APPPATH') or exit('Không được quyền truy cập phần này');

// get Controller name
function get_controller()
{
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

//get Action name
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}

function load_helpers($name)
{
    $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";

    if (file_exists($path)) {
        require "$path";
    } else {
        echo "{$name} không tồn tại";
    }
}

/*
 * -----------------------------
 * callFunction
 * -----------------------------
 * Gọi đến hàm theo tham số biến
 */

 function call_function($list_function = array())
 {
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (is_string($f) && function_exists($f)) {
                $f();
            }
        }
    }
}

function load_view($name, $layout = "", $data_send = array())
{
    global $config;

    $body = VIEWPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($body)) {
        if (is_array($data_send)) {
            foreach ($data_send as $key_data => $v_data) {
                $$key_data = $v_data;
            }
        }

        $layout_file = VIEWPATH . DIRECTORY_SEPARATOR . 'shared' . DIRECTORY_SEPARATOR . ($layout ? $layout : $config['default_layout']) . '.php';

        if (file_exists($layout_file)) {
            require $layout_file;
        } else {
            echo "Không tìm thấy: $layout_file";
        }
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function partial_view($name = '')
{
    global $data;

    $path = VIEWPATH . DIRECTORY_SEPARATOR . 'shared' . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function authorize($role = null) {
    if ($role == null && !isset($_SESSION['auth'])) {
        echo "<h1 style='color: red'>Bạn không có quyền truy cập</h1>";
        die();
    } elseif ($role == "admin" && !isset($_SESSION['auth']['admin'])) {
        header("Location: ?controller=admin&action=login");
    } elseif ($role == "member" && !isset($_SESSION['auth']['member'])) {
        header("Location: ?controller=member&action=login");
    }
}