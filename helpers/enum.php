<?php

global $status, $payments;

$status = [
    'pending' => 'Chưa xử lý',
    'processing' => 'Đang xử lý',
    'shipped' => 'Đang vận chuyển',
    'delivered' => 'Đã giao hàng',
    'completed' => 'Đã hoàn thành',
    'cancelled' => 'Đã hủy',
];

$payments = [
    'onl_payment' => 'Thanh toán trực tuyến',
    'cod_payment' => 'Thanh toán khi nhận hàng',
];
