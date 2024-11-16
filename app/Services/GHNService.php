<?php
namespace App\Services;

use GuzzleHttp\Client;

class GHNService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('ghn.api_url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Token' => config('ghn.api_token'),
            ],
        ]);
    }

    // Tạo đơn hàng
    public function createOrder($order, $shippingDetails)
    {
        $response = $this->client->post('/shipping-order/create', [
            'json' => [
                'shop_id' => config('ghn.shop_id'),
                'to_name' => $shippingDetails['name'],
                'to_phone' => $shippingDetails['phone'],
                'to_address' => $shippingDetails['address'],
                'to_ward_code' => $shippingDetails['ward_code'],
                'to_district_id' => $shippingDetails['district_id'],
                'cod_amount' => $order->total_price,
                'weight' => $shippingDetails['weight'], // Trọng lượng (gram)
                'length' => $shippingDetails['length'], // Chiều dài (cm)
                'width' => $shippingDetails['width'],   // Chiều rộng (cm)
                'height' => $shippingDetails['height'], // Chiều cao (cm)
                'service_type_id' => 2, // Dịch vụ tiêu chuẩn
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    // Tính phí giao hàng
    public function calculateFee($shippingDetails)
    {
        $response = $this->client->post('/shipping-order/fee', [
            'json' => [
                'service_id' => 2, // Dịch vụ tiêu chuẩn
                'from_district_id' => config('ghn.shop_id'),
                'to_district_id' => $shippingDetails['district_id'],
                'weight' => $shippingDetails['weight'],
                'length' => $shippingDetails['length'],
                'width' => $shippingDetails['width'],
                'height' => $shippingDetails['height'],
            ],
        ]);

        return json_decode($response->getBody(), true)['data']['total'];
    }

    // Theo dõi trạng thái đơn hàng
    public function trackOrder($trackingNumber)
    {
        $response = $this->client->post('/shipping-order/detail', [
            'json' => [
                'order_code' => $trackingNumber,
            ],
        ]);

        return json_decode($response->getBody(), true)['data']['status'];
    }
}
