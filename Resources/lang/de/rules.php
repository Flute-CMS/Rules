<?php

return [
    'meta' => [
        'title' => 'Regeln',
        'description' => 'Serverregeln und -bestimmungen',
    ],
    'page_title' => 'Regeln',
    'page_description' => 'Lesen Sie die Serverregeln und -bestimmungen',
    'back_to_rules' => 'Zurück zu den Regeln',
    'no_categories' => 'Keine Regelkategorien gefunden',
    'category_not_found' => 'Regelkategorie nicht gefunden',
    'no_content' => 'Kein Inhalt verfügbar',
    'content_changed' => 'Zuletzt aktualisiert: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Regeln',
        ],
        'title' => [
            'categories' => 'Regelkategorien',
            'categories_description' => 'Regelkategorien verwalten',
            'add_category' => 'Kategorie hinzufügen',
            'edit_category' => 'Kategorie :category bearbeiten',
        ],
        'fields' => [
            'name' => 'Name',
            'content' => 'Inhalt',
            'active' => 'Aktiv',
            'parent_category' => 'Übergeordnete Kategorie',
            'no_parent' => 'Keine übergeordnete (oberste Ebene)',
        ],
        'placeholders' => [
            'category_name' => 'Kategoriename eingeben',
            'content' => 'Kategorieinhalt',
            'parent_category' => 'Übergeordnete Kategorie auswählen',
        ],
        'helps' => [
            'content' => 'Rich-Text-Inhalt für diese Kategorie',
            'parent_category' => 'Leer lassen für Kategorie der obersten Ebene',
        ],
        'messages' => [
            'no_categories' => 'Keine Regelkategorien gefunden',
            'add_first_category' => 'Fügen Sie Ihre erste Regelkategorie hinzu',
            'category_not_found' => 'Regelkategorie nicht gefunden',
            'error' => 'Fehler',
            'name_required' => 'Kategoriename ist erforderlich',
            'category_created' => 'Regelkategorie erfolgreich erstellt',
            'category_updated' => 'Regelkategorie erfolgreich aktualisiert',
            'category_deleted' => 'Regelkategorie :category erfolgreich gelöscht',
            'delete_error' => 'Fehler beim Löschen der Kategorie',
            'confirm_delete' => 'Sind Sie sicher, dass Sie diese Regelkategorie löschen möchten?',
            'invalid_sort_data' => 'Ungültige Sortierdaten',
            'categories_reordered' => 'Kategorienreihenfolge aktualisiert',
            'cannot_set_self_as_parent' => 'Kategorie kann nicht als eigener Parent gesetzt werden',
            'category_has_children' => 'Kategorie mit Unterkategorien kann nicht gelöscht werden',
        ],
        'status' => [
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
        ],
    ],
];
