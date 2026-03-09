<?php

return [
    'meta' => [
        'title' => 'Règles',
        'description' => 'Règles et règlements du serveur',
    ],
    'page_title' => 'Règles',
    'page_description' => 'Lisez les règles et règlements du serveur',
    'back_to_rules' => 'Retour aux règles',
    'no_categories' => 'Aucune catégorie de règles trouvée',
    'category_not_found' => 'Catégorie de règles introuvable',
    'no_content' => 'Aucun contenu disponible',
    'content_changed' => 'Dernière mise à jour : :date',

    'admin' => [
        'menu' => [
            'rules' => 'Règles',
        ],
        'title' => [
            'categories' => 'Catégories de règles',
            'categories_description' => 'Gérer les catégories de règles',
            'add_category' => 'Ajouter une catégorie',
            'edit_category' => 'Modifier la catégorie :category',
        ],
        'fields' => [
            'name' => 'Nom',
            'content' => 'Contenu',
            'active' => 'Actif',
            'parent_category' => 'Catégorie parente',
            'no_parent' => 'Aucun parent (niveau supérieur)',
        ],
        'placeholders' => [
            'category_name' => 'Entrez le nom de la catégorie',
            'content' => 'Contenu de la catégorie',
            'parent_category' => 'Sélectionnez la catégorie parente',
        ],
        'helps' => [
            'content' => 'Contenu de texte enrichi pour cette catégorie',
            'parent_category' => 'Laissez vide pour une catégorie de niveau supérieur',
        ],
        'messages' => [
            'no_categories' => 'Aucune catégorie de règles trouvée',
            'add_first_category' => 'Ajoutez votre première catégorie de règles',
            'category_not_found' => 'Catégorie de règles introuvable',
            'error' => 'Erreur',
            'name_required' => 'Le nom de la catégorie est requis',
            'category_created' => 'Catégorie de règles créée avec succès',
            'category_updated' => 'Catégorie de règles mise à jour avec succès',
            'category_deleted' => 'Catégorie de règles :category supprimée avec succès',
            'delete_error' => 'Erreur lors de la suppression de la catégorie',
            'confirm_delete' => 'Êtes-vous sûr de vouloir supprimer cette catégorie de règles ?',
            'invalid_sort_data' => 'Données de tri invalides',
            'categories_reordered' => 'Ordre des catégories mis à jour',
            'cannot_set_self_as_parent' => 'Impossible de définir la catégorie comme son propre parent',
            'category_has_children' => 'Impossible de supprimer une catégorie qui a des sous-catégories',
        ],
        'status' => [
            'active' => 'Actif',
            'inactive' => 'Inactif',
        ],
    ],
];
