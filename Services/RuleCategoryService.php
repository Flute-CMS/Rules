<?php

namespace Flute\Modules\Rules\Services;

use Flute\Core\Support\FluteStr;
use Flute\Modules\Rules\database\Entities\RuleCategory;

class RuleCategoryService implements RuleCategoryServiceInterface
{
    /**
     * Get all rule categories
     */
    public function getAll(bool $ignoreActive = false): array
    {
        $query = RuleCategory::query()
            ->orderBy('sort_order')
            ->where('parent_id', null);

        if ($ignoreActive) {
            $query->load('children', [
                'load' => static function ($qb) use ($ignoreActive) {
                    $qb->orderBy('sort_order');
                },
            ]);
        } else {
            $query->where('active', true)
                ->load('children', [
                    'load' => static function ($qb) use ($ignoreActive) {
                        $qb->where('active', true)->orderBy('sort_order');
                    },
                ]);
        }

        return $query->fetchAll();
    }

    /**
     * Get all categories for admin (including inactive and children)
     */
    public function getAllForAdmin(): array
    {
        return RuleCategory::query()
            ->orderBy('sort_order')
            ->where('parent_id', null)
            ->load('children', [
                'load' => static function ($qb) {
                    $qb->orderBy('sort_order');
                },
            ])
            ->fetchAll();
    }

    /**
     * Get rule category by ID
     */
    public function getById(int $id): ?RuleCategory
    {
        return RuleCategory::findByPK($id);
    }

    /**
     * Get rule category by slug
     */
    public function getBySlug(string $slug): ?RuleCategory
    {
        return RuleCategory::query()->where('slug', $slug)->fetchOne();
    }

    /**
     * Save rule category
     */
    public function save(RuleCategory $category): RuleCategory
    {
        if (empty($category->slug)) {
            $category->slug = $this->generateSlug($category->name);
        }

        $category->saveOrFail();

        return $category;
    }

    /**
     * Delete rule category
     */
    public function delete(int $id): bool
    {
        $category = $this->getById($id);

        if (!$category) {
            return false;
        }

        if (!empty($category->children)) {
            return false;
        }

        $category->delete();

        return true;
    }

    /**
     * Update category positions
     */
    public function updatePositions(array $positions): void
    {
        $this->reorderItems($positions);
    }

    /**
     * Get categories for select options
     */
    public function getCategoriesForSelect(?int $excludeId = null): array
    {
        $query = RuleCategory::query()->orderBy('sort_order');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $categories = $query->fetchAll();
        $options = ['' => __('rules.admin.fields.no_parent')];

        foreach ($categories as $category) {
            if ($category->parent === null) {
                $options[$category->id] = $category->name;
                $this->addChildrenToOptions($options, $category->children, '— ');
            }
        }

        return $options;
    }

    /**
     * Generate slug from name
     */
    protected function generateSlug(string $name): string
    {
        $slug = FluteStr::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while ($this->getBySlug($slug)) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    /**
     * Recursively reorder items and update parent relationships
     */
    private function reorderItems(array $items, ?RuleCategory $parent = null, &$position = 0): void
    {
        foreach ($items as $item) {
            $category = $this->getById((int) $item['id']);
            if ($category) {
                $category->sort_order = ++$position;
                $category->parent = $parent;
                $this->save($category);

                if (!empty($item['children'])) {
                    $this->reorderItems($item['children'], $category, $position);
                }
            }
        }
    }

    /**
     * Recursively add children to select options
     */
    private function addChildrenToOptions(array &$options, array $children, string $prefix): void
    {
        foreach ($children as $child) {
            $options[$child->id] = $prefix . $child->name;
            if (!empty($child->children)) {
                $this->addChildrenToOptions($options, $child->children, $prefix . '— ');
            }
        }
    }
}
