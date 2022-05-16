<?php

namespace App\Service;

class ProductHandler
{

    /**
     * 並編寫一個函数（function) ，用來計算商品總金額
     * @Author csx at 2022-05-11
     * @param array $products 商品信息，二维数组
     * @return float|int
     */
    public static function getTotalPrice($products)
    {
        $totalPrice = 0;
        foreach ($products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        return $totalPrice;
    }

    /**
     * 把商品以金額排序（由大至小），並篩選商品類種是 “dessert” 的商品
     * @Author csx at 2022-05-11
     * @param array $products 商品信息，二维数组
     * @return array
     */
    public static function sortAndPickup($products)
    {
        $product_type = $price = [];

        foreach($products as $product) {
            if (isset($product['type']) && $product['type'] == 'dessert') {
                $product_type[] = $product;
            }
            $price[] = isset($product['price']) ? : 0;
        }

        array_multisort($price, SORT_ASC, $products);

        return ['sorted_products' => $products, 'dessert' => $product_type];
    }

    /**
     * 編寫一個函數，把創建日期轉換為 unix timestamp
     * @Author csx at 2022-05-11
     * @param array $products 商品信息，二维数组
     * @return array
     */
    public static function toString($products)
    {
        foreach ($products as $k=>$product) {
            if (isset($products[$k]['create_at'])) {
                $products[$k]['create_at'] = strtotime((string)$products[$k]['create_at']);
            }
        }

        return $products;
    }

}