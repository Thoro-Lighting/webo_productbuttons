<?php

declare(strict_types=1);

namespace WeboProductButtons\Hook;

use Tools;
use WeboProductButtons\Model\ProductButtons;

class DisplayHeader extends AbstractHook
{

    public function execute(array $params)
    {
        if(!empty(Tools::getValue('id_product'))) {
            $buttonsData = ProductButtons::getAllDataByProductId((int) Tools::getValue('id_product'));

            $this->context->smarty->assign([
                'three_dimensional' => $buttonsData['three_dimensional'],
                'ar' => $buttonsData['ar'],
            ]);

            return $this->context->smarty->fetch('module:webo_productbuttons/views/templates/hook/header.tpl');

        }
    }
}