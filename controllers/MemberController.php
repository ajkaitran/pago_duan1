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

    header("Location: ?controller=member&action=register");
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
            $_SESSION['user'] = $user;
            header("Location: ?controller=home&action=index");
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
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
        header("Location: ?controller=home&action=index");
        exit;
    }
}

function index()
{
    load_view('member/index');
}