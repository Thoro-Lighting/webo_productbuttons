<?php

namespace WeboProductButtons\Hook;


use WeboProductButtons\Model\ProductButtons;

class DisplayAdminProductsExtra extends AbstractHook
{
    public function execute(array $params): string
    {
        $deliveryTimeProduct = ProductButtons::getAllDataByProductId(
            $params['id_product']
        );

        $this->context->smarty->assign([
            'three_dimensional' => $deliveryTimeProduct['three_dimensional'] ?? null,
            'ar' => $deliveryTimeProduct['ar'] ?? null,
        ]);

        return $this->module->fetch("module:{$this->module->name}/views/templates/hook/admin-product-buttons.tpl");
    }
}
