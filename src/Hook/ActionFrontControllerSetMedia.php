<?php

namespace WeboProductButtons\Hook;

class ActionFrontControllerSetMedia extends AbstractHook
{
    public function execute($params)
    {
        $this->context->controller->registerStylesheet(
            'module-' . $this->module->name . '-css',
            'modules/' . $this->module->name . '/views/dist/front.css',
            [
                'version' => $this->module->version,
            ]
        );
    }
}
