<?php

declare(strict_types=1);

namespace WeboProductButtons\Hook;

use WeboProductButtons\Model\ProductButtons;

class DisplayWeboProductButtons extends AbstractHook {

    public function execute(array $params)
    {
         if(!empty($params['productId'])) {
             $data = ProductButtons::getAllDataByProductId((int) $params['productId']);

             if(!empty($data)) {
                 $this->context->smarty->assign([
                     'three_dimensional' => $data['three_dimensional'],
                     'ar' => $data['ar'],
                     'three_dimensional_link' => !empty($data['three_dimensional']) ? $this->getThreeDimensionalLink($data['three_dimensional']) : '',
                     'ar_link' =>  !empty($data['ar']) ? $this->getArLink($data['ar']) : ''
                 ]);

                 return $this->module->fetch("module:{$this->module->name}/views/templates/hook/display-webo-product-buttons.tpl");
             }
         }
    }

    private function getThreeDimensionalLink(string $threeDimensional) {
        return "https://thoro.cloud.arlity.com/viewer/{$threeDimensional}";
    }
    private function getArLink(string $ar) {
        return "https://thoro.cloud.arlity.com/mobile/{$ar}";
    }
}