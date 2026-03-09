<?php

namespace Flute\Modules\Rules\Admin\Package;

use Flute\Admin\Support\AbstractAdminPackage;

class RulesPackage extends AbstractAdminPackage
{
    /**
     * {@inheritdoc}
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadRoutesFromFile('routes.php');

        $this->loadViews('Resources/views', 'admin-rules');

        $this->registerScss('Resources/assets/scss/admin.scss');
    }

    /**
     * {@inheritdoc}
     */
    public function getPermissions(): array
    {
        return ['admin', 'admin.rules'];
    }

    /**
     * {@inheritdoc}
     */
    public function getMenuItems(): array
    {
        return [
            [
                'title' => __('rules.admin.menu.rules'),
                'icon' => 'ph.bold.book-bold',
                'permission' => 'admin.rules',
                'url' => url('/admin/rules/categories'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): int
    {
        return 110;
    }
}
