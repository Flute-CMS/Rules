<?php

return [
    'meta' => [
        'title' => 'Regras',
        'description' => 'Regras e regulamentos do servidor',
    ],
    'page_title' => 'Regras',
    'page_description' => 'Leia as regras e regulamentos do servidor',
    'back_to_rules' => 'Voltar para as regras',
    'no_categories' => 'Nenhuma categoria de regras encontrada',
    'category_not_found' => 'Categoria de regras não encontrada',
    'no_content' => 'Nenhum conteúdo disponível',
    'content_changed' => 'Última atualização: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Regras',
        ],
        'title' => [
            'categories' => 'Categorias de regras',
            'categories_description' => 'Gerenciar categorias de regras',
            'add_category' => 'Adicionar categoria',
            'edit_category' => 'Editar categoria :category',
        ],
        'fields' => [
            'name' => 'Nome',
            'content' => 'Conteúdo',
            'active' => 'Ativo',
            'parent_category' => 'Categoria pai',
            'no_parent' => 'Sem categoria pai (nível superior)',
        ],
        'placeholders' => [
            'category_name' => 'Digite o nome da categoria',
            'content' => 'Conteúdo da categoria',
            'parent_category' => 'Selecione a categoria pai',
        ],
        'helps' => [
            'content' => 'Conteúdo de texto formatado para esta categoria',
            'parent_category' => 'Deixe vazio para categoria de nível superior',
        ],
        'messages' => [
            'no_categories' => 'Nenhuma categoria de regras encontrada',
            'add_first_category' => 'Adicione sua primeira categoria de regras',
            'category_not_found' => 'Categoria de regras não encontrada',
            'error' => 'Erro',
            'name_required' => 'O nome da categoria é obrigatório',
            'category_created' => 'Categoria de regras criada com sucesso',
            'category_updated' => 'Categoria de regras atualizada com sucesso',
            'category_deleted' => 'Categoria de regras :category excluída com sucesso',
            'delete_error' => 'Erro ao excluir categoria',
            'confirm_delete' => 'Você tem certeza de que deseja excluir esta categoria de regras?',
            'invalid_sort_data' => 'Dados de ordenação inválidos',
            'categories_reordered' => 'Ordem das categorias atualizada',
            'cannot_set_self_as_parent' => 'Não é possível definir a categoria como seu próprio pai',
            'category_has_children' => 'Não é possível excluir categoria que possui subcategorias',
        ],
        'status' => [
            'active' => 'Ativo',
            'inactive' => 'Inativo',
        ],
    ],
];
