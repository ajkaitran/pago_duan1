<?php
    function add_cart($id, $quantity, $arr_data)
    {
        if(isset($_SESSION['cart']['buy'][$id])) {
            $arr_data['quantity'] = $_SESSION['cart']['buy'][$id]['quantity'] += $quantity;
        } else {
            $arr_data['quantity'] = 1;
        }

        $_SESSION['cart']['buy'][$id] = $arr_data;
        $_SESSION['cart']['buy'][$id]['total_price'] = $arr_data['quantity'] * $arr_data['price'];
        update_info_carrt();
    }

    function delete_cart($id)
    {
        unset($_SESSION['cart']['buy'][$id]);   
        update_info_carrt();
    }

    function update_info_carrt()
    {
        $total = 0;
        $number_order = 0;
        if($_SESSION['cart']){
            foreach($_SESSION['cart']['buy'] as $value){
                $number_order = $number_order + $value['quantity'];
                $total = $total + $value['total_price'];
            }
            $_SESSION['cart']['info']=[
                'number_order' => $number_order,
                'total' => $total,
            ];
        };
    }

    function delete_cart_all()
    {
        unset($_SESSION['cart']);
    }
    
    function update_cart($data)
    {
        // $data=(int)$_POST['id'];
        global $quantity;
    
        foreach($data['id'] as $key => $id){
            $quantity=$_POST['num-order'][$key];
            $get_money=get_cats($id);

            $_SESSION['cart']['buy'][$id]['quantity']=$quantity;

            $_SESSION['cart']['buy'][$id]['total_price'] = $_SESSION['cart']['buy'][$id]['price']*$quantity;

            $total_money+=$get_money['price']* $quantity;
            $_SESSION['cart']['info']['total']=$total_money;
            
        };
        header('Location: ?mod=cart&act=show');
    }
