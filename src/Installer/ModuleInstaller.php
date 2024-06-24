<?php

declare(strict_types=1);

namespace WeboProductButtons\Installer;

class ModuleInstaller
{
    const HOOKS_LIST = [
        'actionFrontControllerSetMedia',
        'displayAdminProductsExtra',
        'actionAdminProductsControllerSaveAfter',
        'displayHeader',
        'displayWeboProductButtons',
    ];

    /**
     * @var \Module
     */
    private $module;

    public function __construct(\Module $module)
    {
        $this->module = $module;
    }

    public function install(): bool
    {
        return $this->installHooks() && $this->installDb();
    }

    public function uninstall(): bool
    {
        return $this->uninstallDb();
    }

    private function installHooks(): bool
    {
        $result = true;

        foreach (self::HOOKS_LIST as $hook) {
            $result = $this->module->registerHook($hook) && $result;
        }

        return $result;
    }

    private function installDb(): bool
    {
        $sql = [
            'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'webo_product_buttons` (
                `id_product_buttons` int(11) NOT NULL AUTO_INCREMENT,
                `id_product` int(11) NOT NULL,
                `three_dimensional` VARCHAR (255) DEFAULT NULL,
                `ar` TEXT DEFAULT NULL,
                PRIMARY KEY (`id_product_buttons`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'
        ];

        foreach ($sql as $query) {
            if (\Db::getInstance()->execute($query) == false) {
                return false;
            }
        }

        return true;
    }

    private function uninstallDb(): bool
    {
        $success = true;

        $sql = [
            'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'webo_product_buttons`',
        ];

        foreach ($sql as $query) {
            if (!\Db::getInstance()->execute($query)) {
                $success = false;
            }
        }

        return $success;
    }
}
