<?php

return [
    'meta' => [
        'title' => 'Правила',
        'description' => 'Правила та регламент сервера',
    ],
    'page_title' => 'Правила',
    'page_description' => 'Ознайомтесь із правилами та регламентом сервера',
    'back_to_rules' => 'Назад до правил',
    'no_categories' => 'Категорії правил не знайдено',
    'category_not_found' => 'Категорію правил не знайдено',
    'no_content' => 'Контент недоступний',
    'content_changed' => 'Останнє оновлення: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Правила',
        ],
        'title' => [
            'categories' => 'Категорії правил',
            'categories_description' => 'Управління категоріями правил',
            'add_category' => 'Додати категорію',
            'edit_category' => 'Редагувати категорію :category',
        ],
        'fields' => [
            'name' => 'Назва',
            'content' => 'Зміст',
            'active' => 'Активна',
            'parent_category' => 'Батьківська категорія',
            'no_parent' => 'Без батьківської (верхній рівень)',
        ],
        'placeholders' => [
            'category_name' => 'Введіть назву категорії',
            'content' => 'Зміст категорії',
            'parent_category' => 'Оберіть батьківську категорію',
        ],
        'helps' => [
            'content' => 'Багатий текстовий вміст для цієї категорії',
            'parent_category' => 'Залиште порожнім для категорії верхнього рівня',
        ],
        'messages' => [
            'no_categories' => 'Категорії правил не знайдено',
            'add_first_category' => 'Додайте першу категорію правил',
            'category_not_found' => 'Категорію правил не знайдено',
            'error' => 'Помилка',
            'name_required' => 'Назва категорії обовʼязкова',
            'category_created' => 'Категорію правил успішно створено',
            'category_updated' => 'Категорію правил успішно оновлено',
            'category_deleted' => 'Категорію правил :category успішно видалено',
            'delete_error' => 'Помилка під час видалення категорії',
            'confirm_delete' => 'Ви впевнені, що хочете видалити цю категорію правил?',
            'invalid_sort_data' => 'Недійсні дані сортування',
            'categories_reordered' => 'Порядок категорій оновлено',
            'cannot_set_self_as_parent' => 'Не можна призначити категорію батьком самої себе',
            'category_has_children' => 'Не можна видалити категорію, у якої є підкатегорії',
        ],
        'status' => [
            'active' => 'Активна',
            'inactive' => 'Вимкнена',
        ],
    ],
];
