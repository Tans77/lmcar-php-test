<?php

namespace App\Service;

class ProductHandler
{
    public function getTotalPrice(array $products) : int
    {
        $totalPrice = 0;
        foreach ($products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }
    
    public function sortAndDessert($products) : array
    {
        usort($products, function($a, $b) {
            $aPrice = $a['price'];
            $bPrice = $b['price'];
            if ($aPrice == $bPrice)
                return 0;
            return ($aPrice > $bPrice) ? -1 : 1;
        });
        $resList =[];
        foreach ($products as  $product) {
            if(isset($product['type']) && $product['type'] == 'Dessert'){
                $resList[] = $product ;
            }
        }
        return $resList;
    }
    
    public function listStrToTime(array $products) : array
    {
        foreach ($products as $index => $product) {
            if(isset($product['create_at'])){
                $products[$index]['create_at'] = strtotime($product['create_at']); ;
            }
        }
        return $products;
    }
}