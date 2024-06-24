<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use WeboProductButtons\Hook\HookInterface;
use WeboProductButtons\Installer\ModuleInstaller;

if (!defined('_PS_VERSION_')) {
    exit;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

class webo_productbuttons extends Module
{
    private $moduleInstaller;

    public function __construct()
    {
        $this->name = 'webo_productbuttons';
        $this->author = 'Webo';
        $this->version = '1.0.0';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->controllers = ['front'];

        parent::__construct();

        $this->displayName = $this->trans('AR and 3D buttons', [], 'Modules.WeboProductbuttons.Admin');
        $this->description = $this->trans('AR and 3D buttons', [], 'Modules.WeboProductbuttons.Admin');
        $this->ps_versions_compliancy = ['min' => '1.7.6', 'max' => _PS_VERSION_];
    }

    private function getInstaller(): ModuleInstaller
    {
        if ($this->moduleInstaller === null) {
            $this->moduleInstaller = new ModuleInstaller($this);
        }

        return $this->moduleInstaller;
    }

    /**
     * @return bool
     */
    public function install(): bool
    {
        return parent::install() && $this->getInstaller()->install();
    }

    /**
     * @return bool
     */
    public function uninstall(): bool
    {
        return parent::uninstall() && $this->getInstaller()->uninstall();
    }

    public function getService(string $serviceName)
    {
        try {
            return $this->get($serviceName);
        } catch (ServiceNotFoundException $exception) {
            return null;
        }
    }

    public function __call($methodName, array $arguments)
    {
        if (strpos($methodName, 'hook') === 0) {
            if ($hook = $this->getHookObject($methodName)) {
                return $hook->execute(...$arguments);
            }
        } else if (method_exists($this, $methodName)) {
            return $this->{$methodName}(...$arguments);
        }

        return null;
    }

    private function getHookObject(string $methodName)
    {
        $serviceName = sprintf(
            'webo_product_buttons.hook.%s',
            \Tools::toUnderscoreCase(str_replace('hook', '', $methodName))
        );

        $hook = $this->getService($serviceName);

        return $hook instanceof HookInterface ? $hook : null;
    }
}