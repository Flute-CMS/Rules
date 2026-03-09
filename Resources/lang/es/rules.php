<?php

return [
    'meta' => [
        'title' => 'Reglas',
        'description' => 'Reglas y reglamentos del servidor',
    ],
    'page_title' => 'Reglas',
    'page_description' => 'Lee las reglas y reglamentos del servidor',
    'back_to_rules' => 'Volver a las reglas',
    'no_categories' => 'No se encontraron categorías de reglas',
    'category_not_found' => 'Categoría de reglas no encontrada',
    'no_content' => 'No hay contenido disponible',
    'content_changed' => 'Última actualización: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Reglas',
        ],
        'title' => [
            'categories' => 'Categorías de reglas',
            'categories_description' => 'Gestionar categorías de reglas',
            'add_category' => 'Agregar categoría',
            'edit_category' => 'Editar categoría :category',
        ],
        'fields' => [
            'name' => 'Nombre',
            'content' => 'Contenido',
            'active' => 'Activo',
            'parent_category' => 'Categoría padre',
            'no_parent' => 'Sin padre (nivel superior)',
        ],
        'placeholders' => [
            'category_name' => 'Ingrese el nombre de la categoría',
            'content' => 'Contenido de la categoría',
            'parent_category' => 'Seleccione la categoría padre',
        ],
        'helps' => [
            'content' => 'Contenido de texto enriquecido para esta categoría',
            'parent_category' => 'Dejar vacío para categoría de nivel superior',
        ],
        'messages' => [
            'no_categories' => 'No se encontraron categorías de reglas',
            'add_first_category' => 'Agregue su primera categoría de reglas',
            'category_not_found' => 'Categoría de reglas no encontrada',
            'error' => 'Error',
            'name_required' => 'El nombre de la categoría es obligatorio',
            'category_created' => 'Categoría de reglas creada exitosamente',
            'category_updated' => 'Categoría de reglas actualizada exitosamente',
            'category_deleted' => 'Categoría de reglas :category eliminada exitosamente',
            'delete_error' => 'Error al eliminar la categoría',
            'confirm_delete' => '¿Está seguro de que desea eliminar esta categoría de reglas?',
            'invalid_sort_data' => 'Datos de ordenamiento inválidos',
            'categories_reordered' => 'Orden de categorías actualizado',
            'cannot_set_self_as_parent' => 'No se puede establecer la categoría como su propio padre',
            'category_has_children' => 'No se puede eliminar una categoría que tiene subcategorías',
        ],
        'status' => [
            'active' => 'Activo',
            'inactive' => 'Inactivo',
        ],
    ],
];
