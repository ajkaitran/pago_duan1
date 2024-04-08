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
    global $payments;

    if (!isset($_SESSION['cart'])) {
        header("Location: ?controller=ShoppingCart&action=index");
    }

    $data = array (
        'cart' => isset($_SESSION['cart']) ? $_SESSION['cart'] : null,
        'user' => isset($_SESSION['auth']['member']) ? $_SESSION['auth']['member'] : null,
        'ship_fee' => 30000,
        'payments' => $payments
    );

    load_view('shoppingcart/checkout', '_layout', $data);
}

function checkout_order() {
    if (isset($_POST['checkout'])) {
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;
        $address = isset($_POST['address']) ? $_POST['address'] : null;
        $payment = isset($_POST['payment']) ? $_POST['payment'] : null;
        
        if ($fullname && $email && $phone_number && $address && $payment) {
            $data_customer = array(
                'fullname' => $fullname,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address
            );

            $customer_id = db_insert("customers", $data_customer);

            $data_order = array(
                'customer_id' => $customer_id,
                'user_id' => isset($_SESSION['auth']['member']['Id']) ? $_SESSION['auth']['member']['Id'] : null,
                'created_at' => date('Y-m-d H:i:s'),
                'payment' => $payment,
                'total_amount' => isset($_SESSION['cart']['info']['total']) ? $_SESSION['cart']['info']['total'] : 0
            );
            
            $order_id = db_insert("orders", $data_order);   

            foreach ($_SESSION['cart']['buy'] as $key => $value) {
                $data_item = array(
                    'order_id' =>  $order_id,
                    'product_id' => $value['id'],
                    'quantity' => $value['quantity'],
                    'price' =>  $value['price'],
                    'total_price' =>  $value['total_price'],
                );

                db_insert("order_details", $data_item);
            }

            delete_cart_all();

            header("Location: ?controller=ShoppingCart&action=checkout_success");
        } else {
            header("Location: ?controller=ShoppingCart&action=checkout");
        }
    }
}

function checkout_success() {
    load_view('shoppingcart/checkout_success', '_layoutNone');
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

