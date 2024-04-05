<?php
//Triệu gọi đến file xử lý thông qua request

$authorize = "none";

$route_controllers = get_controller();

$route_action = get_action();

$request_path = CONTROLLERPATH . DIRECTORY_SEPARATOR . $route_controllers .'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

call_function(array('construct', $route_action));

