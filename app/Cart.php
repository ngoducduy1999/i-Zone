<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalProduct = 0;
    public $totalPrice = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalProduct = $cart->totalProduct;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    public function AddCart($product, $bienthe, $quantity)
    {
        $idbt = $bienthe->id;
        $maxQuantity = $bienthe->so_luong;
        if ($quantity > $maxQuantity) {
            $quantity = $maxQuantity;
        }

        $newProduct = [
            'bienthe' => $bienthe,
            'quantity' => $quantity,
            'productInfo' => $product,
            'price' => $bienthe->gia_moi * $quantity,
        ];

        if ($this->products) {
            if (array_key_exists($idbt, $this->products)) {
                $existingProduct = $this->products[$idbt];
                $existingProduct['quantity'] += $quantity;
                if ($existingProduct['quantity'] > $maxQuantity) {
                    $existingProduct['quantity'] = $maxQuantity;
                }
                $existingProduct['price'] = $bienthe->gia_moi * $existingProduct['quantity'];
                $this->products[$idbt] = $existingProduct;
            } else {
                $this->products[$idbt] = $newProduct;
            }
        } else {
            $this->products[$idbt] = $newProduct;
        }
        $this->totalPrice += $newProduct['price'];
        $this->totalProduct = count($this->products);
    }

    public function DeleteItemCart($idbt)
    {
        if (array_key_exists($idbt, $this->products)) {
            $this->totalPrice -= $this->products[$idbt]['price'];
            unset($this->products[$idbt]);
            $this->totalProduct = count($this->products);
        }
    }
    
}
