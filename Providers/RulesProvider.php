<?php

namespace Flute\Modules\Rules\Providers;

use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\Rules\Admin\Package\RulesPackage;
use Flute\Modules\Rules\Services\RuleCategoryService;
use Flute\Modules\Rules\Services\RuleCategoryServiceInterface;

class RulesProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();

        $container->set(RuleCategoryServiceInterface::class, \DI\get(RuleCategoryService::class));

        $this->loadViews('Resources/views', 'rules');
        $this->loadScss('Resources/assets/scss/rules.scss');

        $this->loadPackage(new RulesPackage());
    }

    public function register(\DI\Container $container): void
    {
        $this->loadTranslations();
    }
}
