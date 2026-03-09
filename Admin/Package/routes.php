<?php

use Flute\Core\Router\Router;
use Flute\Modules\Rules\Admin\Package\Screens\RuleCategoriesScreen;

Router::screen('/admin/rules/categories', RuleCategoriesScreen::class);
