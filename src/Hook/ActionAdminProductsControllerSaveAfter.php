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

            $this->validate($data['three_dimensional'], $data['ar']);

            return ProductButtons::saveData($product->id, $data);
        }

        return true;
    }
    private function validate($threeDimensional, $ar)
    {
        if ((!empty($threeDimensional) && strlen($threeDimensional) > 10) || (!empty($ar) && strlen($ar) > 10)) {
            throw new \PrestaShopException('Pola muszą mieć od 0 do 10 znaków');
        }
    }
}
