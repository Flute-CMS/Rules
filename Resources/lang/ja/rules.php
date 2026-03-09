<?php

return [
    'meta' => [
        'title' => 'ルール',
        'description' => 'サーバールールと規則',
    ],
    'page_title' => 'ルール',
    'page_description' => 'サーバールールと規則をお読みください',
    'back_to_rules' => 'ルールに戻る',
    'no_categories' => 'ルールカテゴリが見つかりません',
    'category_not_found' => 'ルールカテゴリが見つかりません',
    'no_content' => '利用可能なコンテンツがありません',
    'content_changed' => '最終更新：:date',

    'admin' => [
        'menu' => [
            'rules' => 'ルール',
        ],
        'title' => [
            'categories' => 'ルールカテゴリ',
            'categories_description' => 'ルールカテゴリの管理',
            'add_category' => 'カテゴリを追加',
            'edit_category' => 'カテゴリ :category を編集',
        ],
        'fields' => [
            'name' => '名前',
            'content' => 'コンテンツ',
            'active' => 'アクティブ',
            'parent_category' => '親カテゴリ',
            'no_parent' => '親なし（トップレベル）',
        ],
        'placeholders' => [
            'category_name' => 'カテゴリ名を入力',
            'content' => 'カテゴリコンテンツ',
            'parent_category' => '親カテゴリを選択',
        ],
        'helps' => [
            'content' => 'このカテゴリのリッチテキストコンテンツ',
            'parent_category' => 'トップレベルカテゴリの場合は空のままにしてください',
        ],
        'messages' => [
            'no_categories' => 'ルールカテゴリが見つかりません',
            'add_first_category' => '最初のルールカテゴリを追加してください',
            'category_not_found' => 'ルールカテゴリが見つかりません',
            'error' => 'エラー',
            'name_required' => 'カテゴリ名は必須です',
            'category_created' => 'ルールカテゴリが正常に作成されました',
            'category_updated' => 'ルールカテゴリが正常に更新されました',
            'category_deleted' => 'ルールカテゴリ :category が正常に削除されました',
            'delete_error' => 'カテゴリの削除エラー',
            'confirm_delete' => 'このルールカテゴリを削除してもよろしいですか？',
            'invalid_sort_data' => '無効なソートデータ',
            'categories_reordered' => 'カテゴリの順序が更新されました',
            'cannot_set_self_as_parent' => 'カテゴリを自分自身の親として設定することはできません',
            'category_has_children' => 'サブカテゴリを持つカテゴリは削除できません',
        ],
        'status' => [
            'active' => 'アクティブ',
            'inactive' => '非アクティブ',
        ],
    ],
];
