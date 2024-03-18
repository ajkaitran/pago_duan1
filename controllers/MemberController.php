<?php

function construct()
{
}


function register()
{
    load_view('member/register');
}
function login()
{
    if (isset($_POST['login'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        
    }
    load_view('member/login');
}
function index()
{
    load_view('member/index');
}
