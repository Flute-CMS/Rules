<?php

return [
    'meta' => [
        'title' => '规则',
        'description' => '服务器规则和条例',
    ],
    'page_title' => '规则',
    'page_description' => '阅读服务器规则和条例',
    'back_to_rules' => '返回规则',
    'no_categories' => '未找到规则分类',
    'category_not_found' => '未找到规则分类',
    'no_content' => '无可用内容',
    'content_changed' => '最后更新时间：:date',

    'admin' => [
        'menu' => [
            'rules' => '规则',
        ],
        'title' => [
            'categories' => '规则分类',
            'categories_description' => '管理规则分类',
            'add_category' => '添加分类',
            'edit_category' => '编辑分类 :category',
        ],
        'fields' => [
            'name' => '名称',
            'content' => '内容',
            'active' => '激活',
            'parent_category' => '父分类',
            'no_parent' => '无父分类（顶级）',
        ],
        'placeholders' => [
            'category_name' => '输入分类名称',
            'content' => '分类内容',
            'parent_category' => '选择父分类',
        ],
        'helps' => [
            'content' => '此分类的富文本内容',
            'parent_category' => '留空表示顶级分类',
        ],
        'messages' => [
            'no_categories' => '未找到规则分类',
            'add_first_category' => '添加您的第一个规则分类',
            'category_not_found' => '未找到规则分类',
            'error' => '错误',
            'name_required' => '分类名称是必需的',
            'category_created' => '规则分类创建成功',
            'category_updated' => '规则分类更新成功',
            'category_deleted' => '规则分类 :category 删除成功',
            'delete_error' => '删除分类时出错',
            'confirm_delete' => '您确定要删除此规则分类吗？',
            'invalid_sort_data' => '排序数据无效',
            'categories_reordered' => '分类顺序已更新',
            'cannot_set_self_as_parent' => '不能将分类设置为自己的父分类',
            'category_has_children' => '不能删除有子分类的分类',
        ],
        'status' => [
            'active' => '激活',
            'inactive' => '停用',
        ],
    ],
];
