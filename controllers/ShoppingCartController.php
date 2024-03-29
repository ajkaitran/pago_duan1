<?php

function construct()
{
}

function index()
{
    $data = array (
        'cart' => isset($_SESSION['cart']) ? $_SESSION['cart'] : null,
    );

    load_view('shoppingcart/index', '_layout', $data);
}
function checkout()
{
    load_view('shoppingcart/checkout');
}

function add_to_cart() {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

    if (!empty($id)) {
        $item = db_fetch_row("SELECT * FROM `product` WHERE `Id` = $id");
        $data = array(
            'id' => $item['Id'],
            'name' => $item['Name'],
            'image' => $item['Image'],
            'price' => $item['SalePrice'] ?? $item['Price'],
            'quantity' => $quantity,
        );

        add_cart($id, $quantity, $data);

        header("Location: ?controller=ShoppingCart&action=index");
    }
}

function remove_cart() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!empty($id)) {
        delete_cart($id);

        header("Location: ?controller=ShoppingCart&action=index");
    }
}

function update_shoppingcart() {
    if (isset($_POST['update_cart'])) {
        update_cart($_POST);
    }

    header("Location: ?controller=ShoppingCart&action=index");
}