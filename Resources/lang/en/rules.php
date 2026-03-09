<?php

return [
    'meta' => [
        'title' => 'Rules',
        'description' => 'Server rules and regulations',
    ],
    'page_title' => 'Rules',
    'page_description' => 'Read the server rules and regulations',
    'back_to_rules' => 'Back to rules',
    'no_categories' => 'No rule categories found',
    'category_not_found' => 'Rule category not found',
    'no_content' => 'No content available',
    'content_changed' => 'Last updated: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Rules',
        ],
        'title' => [
            'categories' => 'Rule Categories',
            'categories_description' => 'Manage rule categories',
            'add_category' => 'Add Category',
            'edit_category' => 'Edit Category :category',
        ],
        'fields' => [
            'name' => 'Name',
            'content' => 'Content',
            'active' => 'Active',
            'parent_category' => 'Parent Category',
            'no_parent' => 'No parent (top level)',
        ],
        'placeholders' => [
            'category_name' => 'Enter category name',
            'content' => 'Category content',
            'parent_category' => 'Select parent category',
        ],
        'helps' => [
            'content' => 'Rich text content for this category',
            'parent_category' => 'Leave empty for top-level category',
        ],
        'messages' => [
            'no_categories' => 'No rule categories found',
            'add_first_category' => 'Add your first rule category',
            'category_not_found' => 'Rule category not found',
            'error' => 'Error',
            'name_required' => 'Category name is required',
            'category_created' => 'Rule category successfully created',
            'category_updated' => 'Rule category successfully updated',
            'category_deleted' => 'Rule category :category successfully deleted',
            'delete_error' => 'Error deleting category',
            'confirm_delete' => 'Are you sure you want to delete this rule category?',
            'invalid_sort_data' => 'Invalid sort data',
            'categories_reordered' => 'Categories order updated',
            'cannot_set_self_as_parent' => 'Cannot set category as its own parent',
            'category_has_children' => 'Cannot delete category that has subcategories',
        ],
        'status' => [
            'active' => 'Active',
            'inactive' => 'Inactive',
        ],
    ],
];
