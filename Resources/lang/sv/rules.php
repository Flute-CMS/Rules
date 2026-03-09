<?php

return [
    'meta' => [
        'title' => 'Regler',
        'description' => 'Serverregler och förordningar',
    ],
    'page_title' => 'Regler',
    'page_description' => 'Läs serverreglerna och förordningarna',
    'back_to_rules' => 'Tillbaka till regler',
    'no_categories' => 'Inga regelkategorier hittades',
    'category_not_found' => 'Regelkategori hittades inte',
    'no_content' => 'Inget innehåll tillgängligt',
    'content_changed' => 'Senast uppdaterad: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Regler',
        ],
        'title' => [
            'categories' => 'Regelkategorier',
            'categories_description' => 'Hantera regelkategorier',
            'add_category' => 'Lägg till kategori',
            'edit_category' => 'Redigera kategori :category',
        ],
        'fields' => [
            'name' => 'Namn',
            'content' => 'Innehåll',
            'active' => 'Aktiv',
            'parent_category' => 'Överordnad kategori',
            'no_parent' => 'Ingen överordnad (toppnivå)',
        ],
        'placeholders' => [
            'category_name' => 'Ange kategorinamn',
            'content' => 'Kategoriinnehåll',
            'parent_category' => 'Välj överordnad kategori',
        ],
        'helps' => [
            'content' => 'Rich text-innehåll för denna kategori',
            'parent_category' => 'Lämna tom för kategori på toppnivå',
        ],
        'messages' => [
            'no_categories' => 'Inga regelkategorier hittades',
            'add_first_category' => 'Lägg till din första regelkategori',
            'category_not_found' => 'Regelkategori hittades inte',
            'error' => 'Fel',
            'name_required' => 'Kategorinamn krävs',
            'category_created' => 'Regelkategori skapad framgångsrikt',
            'category_updated' => 'Regelkategori uppdaterad framgångsrikt',
            'category_deleted' => 'Regelkategori :category raderad framgångsrikt',
            'delete_error' => 'Fel vid radering av kategori',
            'confirm_delete' => 'Är du säker på att du vill radera denna regelkategori?',
            'invalid_sort_data' => 'Ogiltiga sorteringsdata',
            'categories_reordered' => 'Kategoriers ordning uppdaterad',
            'cannot_set_self_as_parent' => 'Kan inte sätta kategori som sin egen förälder',
            'category_has_children' => 'Kan inte radera kategori som har underkategorier',
        ],
        'status' => [
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
        ],
    ],
];
