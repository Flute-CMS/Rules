<?php

namespace Flute\Modules\Rules\Services;

use Flute\Modules\Rules\database\Entities\RuleCategory;

interface RuleCategoryServiceInterface
{
    /**
     * Get all rule categories
     */
    public function getAll(bool $ignoreActive = false): array;

    /**
     * Get all categories for admin (including inactive and children)
     */
    public function getAllForAdmin(): array;

    /**
     * Get rule category by ID
     */
    public function getById(int $id): ?RuleCategory;

    /**
     * Get rule category by slug
     */
    public function getBySlug(string $slug): ?RuleCategory;

    /**
     * Save rule category
     */
    public function save(RuleCategory $category): RuleCategory;

    /**
     * Delete rule category
     */
    public function delete(int $id): bool;

    /**
     * Update category positions
     */
    public function updatePositions(array $positions): void;

    /**
     * Get categories for select options
     */
    public function getCategoriesForSelect(?int $excludeId = null): array;
}
