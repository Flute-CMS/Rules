<?php

namespace Flute\Modules\Rules\Controllers;

use Flute\Core\Router\Annotations\Route;
use Flute\Modules\Rules\Services\RuleCategoryServiceInterface;

class RulesController
{
    protected RuleCategoryServiceInterface $categoryService;

    public function __construct(RuleCategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route(uri: "/rules", name: "rules.index")]
    public function index()
    {
        $categories = $this->categoryService->getAll();
        $firstCategory = $this->getFirstAvailableCategory($categories);

        return view('rules::pages.index', [
            'categories' => $categories,
            'firstCategory' => $firstCategory,
        ]);
    }

    #[Route(uri: "/rules/category/{slug}", name: "rules.category")]
    public function category(string $slug)
    {
        $category = $this->categoryService->getBySlug($slug);

        if (!$category || !$this->isCategoryAccessible($category)) {
            return response()->error(404, __('rules.category_not_found'));
        }

        return view('rules::partials.category-content', [
            'category' => $category,
        ]);
    }

    #[Route(uri: "/rules/{slug}", name: "rules.view")]
    public function view(string $slug)
    {
        $category = $this->categoryService->getBySlug($slug);

        if (!$category || !$this->isCategoryAccessible($category)) {
            return response()->error(404, __('rules.category_not_found'));
        }

        $categories = $this->categoryService->getAll();

        if (request()->htmx()->isHtmxRequest() && !request()->htmx()->isBoosted()) {
            return view('rules::partials.category-content', [
                'category' => $category,
            ]);
        }

        return view('rules::pages.index', [
            'categories' => $categories,
            'firstCategory' => $category,
        ]);
    }

    /**
     * Get the first available category from the hierarchical structure
     */
    private function getFirstAvailableCategory(array $categories): mixed
    {
        if (empty($categories)) {
            return null;
        }

        $firstCategory = $categories[0];

        // If the first category has children, return the first child instead
        if (!empty($firstCategory->children)) {
            return $firstCategory->children[0];
        }

        return $firstCategory;
    }

    /**
     * Check if category is accessible (active and parent is active if exists)
     */
    private function isCategoryAccessible($category): bool
    {
        if (!$category->active) {
            return false;
        }

        // If category has a parent, check if parent is also active
        return !($category->parent && !$category->parent->active)



        ;
    }
}
