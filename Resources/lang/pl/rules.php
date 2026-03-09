<?php

return [
    'meta' => [
        'title' => 'Zasady',
        'description' => 'Zasady i regulamin serwera',
    ],
    'page_title' => 'Zasady',
    'page_description' => 'Przeczytaj zasady i regulamin serwera',
    'back_to_rules' => 'Powrót do zasad',
    'no_categories' => 'Nie znaleziono kategorii zasad',
    'category_not_found' => 'Nie znaleziono kategorii zasad',
    'no_content' => 'Brak dostępnej treści',
    'content_changed' => 'Ostatnia aktualizacja: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Zasady',
        ],
        'title' => [
            'categories' => 'Kategorie zasad',
            'categories_description' => 'Zarządzaj kategoriami zasad',
            'add_category' => 'Dodaj kategorię',
            'edit_category' => 'Edytuj kategorię :category',
        ],
        'fields' => [
            'name' => 'Nazwa',
            'content' => 'Treść',
            'active' => 'Aktywna',
            'parent_category' => 'Kategoria nadrzędna',
            'no_parent' => 'Brak nadrzędnej (najwyższy poziom)',
        ],
        'placeholders' => [
            'category_name' => 'Wprowadź nazwę kategorii',
            'content' => 'Treść kategorii',
            'parent_category' => 'Wybierz kategorię nadrzędną',
        ],
        'helps' => [
            'content' => 'Bogate treści tekstowe dla tej kategorii',
            'parent_category' => 'Pozostaw puste dla kategorii najwyższego poziomu',
        ],
        'messages' => [
            'no_categories' => 'Nie znaleziono kategorii zasad',
            'add_first_category' => 'Dodaj swoją pierwszą kategorię zasad',
            'category_not_found' => 'Nie znaleziono kategorii zasad',
            'error' => 'Błąd',
            'name_required' => 'Nazwa kategorii jest wymagana',
            'category_created' => 'Kategoria zasad została pomyślnie utworzona',
            'category_updated' => 'Kategoria zasad została pomyślnie zaktualizowana',
            'category_deleted' => 'Kategoria zasad :category została pomyślnie usunięta',
            'delete_error' => 'Błąd podczas usuwania kategorii',
            'confirm_delete' => 'Czy na pewno chcesz usunąć tę kategorię zasad?',
            'invalid_sort_data' => 'Nieprawidłowe dane sortowania',
            'categories_reordered' => 'Kolejność kategorii została zaktualizowana',
            'cannot_set_self_as_parent' => 'Nie można ustawić kategorii jako własnego rodzica',
            'category_has_children' => 'Nie można usunąć kategorii, która ma podkategorie',
        ],
        'status' => [
            'active' => 'Aktywna',
            'inactive' => 'Nieaktywna',
        ],
    ],
];
