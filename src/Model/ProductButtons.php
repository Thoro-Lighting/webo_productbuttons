<?php

namespace WeboProductButtons\Model;

use DbQuery;
use ObjectModel;

class ProductButtons extends ObjectModel {

    public $id_product;
    public $three_dimensional;

    public $ar;

    public static $definition = [
        'table' => 'webo_product_buttons',
        'primary' => 'id_product_buttons',
        'fields' => [
            'id_product' => ['type' => self::TYPE_INT, 'validate' => 'isInt', 'size' => 11],
            'three_dimensional' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 10],
            'ar' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 10],
        ],
    ];

    public static function saveData(int $id_product, array $data){
        $id = self::getIdByProductId($id_product);
        $model = $id ? new ProductButtons($id) : new ProductButtons();
        $model->id_product = $id_product;

        $model->three_dimensional = $data['three_dimensional'];
        $model->ar = $data['ar'];

        return $model->save();
    }

    public static function getIdByProductId(int $productId): ?int
    {
        $query = (new DbQuery())
            ->select('id_product_buttons')
            ->from('webo_product_buttons', 'wpb')
            ->where('wpb.id_product = ' . $productId);

        return (int) \Db::getInstance()->getValue($query) ?: null;
    }

    public static function getAllDataByProductId(int $productId): ?array
    {
        $query = (new DbQuery())
            ->from('webo_product_buttons', 'wpb')
            ->where('wpb.id_product = ' . $productId);

        return \Db::getInstance()->getRow($query) ?: null;
    }
}