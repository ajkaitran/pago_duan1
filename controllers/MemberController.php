<?php

function construct()
{
}


function register()
{
    load_view('member/register');
}

function register_store()
{
    $fullname = isset($_POST['FullName']) ? $_POST['FullName'] : null;
    $phone_num = isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : null;
    $email = isset($_POST['Email']) ? $_POST['Email'] : null;
    $username = isset($_POST['Username']) ? $_POST['Username'] : null;
    $password =  isset($_POST['Password']) ? $_POST['Password'] : null;
    $password_confirm =  isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : null;

    if ($fullname == null || $phone_num == null || $username == null || $password == null || $password_confirm == null) {
        echo "Lỗi: Điền đầy đủ thông tin.";
        load_view('member/register');
    }

    if ($password != $password_confirm) {
        echo "Lỗi: Mật khẩu không khớp.";
        load_view('member/register');
    }

    $exist_username = db_fetch_row("SELECT * FROM `Users` WHERE `Username` = '$username'");

    if ($exist_username) {
        echo "Lỗi: Tên người dùng đã tồn tại.";
        load_view('member/register');
    }

    $arr = array(
        'FullName' => $fullname,
        'PhoneNumber' => $phone_num,
        'Email' => $email,
        'Username' => $username,
        'Password' => md5($password),
    );

    db_insert('Users', $arr);

    header("Location: ?controller=member&action=login");
    exit;
}

function login()
{
    $username = isset($_POST['Username']) ? $_POST['Username'] : null;
    $password = isset($_POST['Password']) ? $_POST['Password'] : null;

    if ($username && $password) {
        $hashed_password = md5($password);

        $user = db_fetch_row("SELECT * FROM `Users` WHERE `Username` = '$username' AND `Password` = '$hashed_password'");

        if ($user) {
            $_SESSION['auth']['member'] = $user;
            header("Location: ?controller=member&action=index");
            exit;
        } else {
            echo "Lỗi: Tên người dùng hoặc mật khẩu không đúng.";
            load_view('member/login');
        }
    } else {
        echo "Lỗi: Vui lòng điền đầy đủ thông tin.";
        load_view('member/login');
    }
}


function logout()
{
    if(isset($_SESSION['auth']['member']))
    {
        unset($_SESSION['auth']['member']);
        header("Location: ?controller=home&action=index");
        exit;
    }
}

function index()
{
    global $status, $payments;

    $user_id = $_SESSION['auth']['member']['Id'];

    $orders = db_fetch_array("SELECT orders.user_id, orders.id as order_id, orders.created_at, orders.total_amount, orders.status, orders.payment, customers.*
        FROM orders
        INNER JOIN customers ON orders.customer_id = customers.id
        WHERE orders.user_id = $user_id
    ");

    // echoArray($orders);

    $data = array(
        'orders' => $orders,
        'status' => $status,
        'payments' => $payments,
    );
    load_view('member/index', '_layout', $data);
}

function order_details() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $order = db_fetch_row("
            SELECT orders.id as order_id, orders.created_at, orders.total_amount, orders.status, orders.payment, customers.*
            FROM orders
            INNER JOIN customers ON orders.customer_id = customers.id
            WHERE orders.id = $id
        ");

        $order_id = $order['order_id'];

        $order_items = db_fetch_array("
            SELECT order_details.id as order_item_id, order_details.quantity, order_details.price, order_details.total_price, order_details.product_id, product.Name, product.Image
            FROM `order_details` 
            INNER JOIN product ON order_details.product_id = product.Id
            WHERE `order_id` = $order_id
        ");

        $count_items = db_query("SELECT SUM(quantity) AS total_quantity FROM `order_details` WHERE `order_id` = $order_id");

        $data = array(
            'order' => $order,
            'order_items' => $order_items,
            'ship_fee' => 30000,
            'total_quantity' => $count_items->fetch_assoc()['total_quantity'],
        );

        load_view('member/order_details', '_layoutNone', $data);
    }
}