<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

return [
    'vnp_TmnCode' => env('VNPAY_TMN_CODE'),
    'vnp_HashSecret' => env('VNPAY_HASH_SECRET'),
    'vnp_Url' => env('VNPAY_URL'),
    'vnp_ReturnUrl' => env('VNPAY_RETURN_URL'),
    'vnp_TransactionApiUrl' => env('VNPAY_TRANSACTION_API_URL'),
    'vnp_Expire' => env('VNPAY_EXPIRE'),
    'api_url' => env('VNPAY_API_URL'),

];

