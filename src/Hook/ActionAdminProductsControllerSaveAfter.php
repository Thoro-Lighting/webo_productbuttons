<?php

namespace WeboProductButtons\Hook;

use Product;
use Tools;
use WeboProductButtons\Model\ProductButtons;

class ActionAdminProductsControllerSaveAfter extends AbstractHook
{
    public function execute(array $params)
    {
        if(!empty('.js-webo-admin-products-input')) {
            $product = $params['return'];

            $data = [
                'three_dimensional' => Tools::getValue('three_dimensional'),
                'ar' => Tools::getValue('ar')
            ];

            return ProductButtons::saveData($product->id, $data);
        }

        return true;
    }
}
