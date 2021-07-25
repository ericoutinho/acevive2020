<?php

    // Register Custom Post Type testemunho
    function create_testemunho_cpt() {

        $labels = array(
            'name' => _x( 'Testemunhos', 'Post Type General Name', 'acevive' ),
            'singular_name' => _x( 'Testemunho', 'Post Type Singular Name', 'acevive' ),
            'menu_name' => _x( 'Testemunhos', 'Admin Menu text', 'acevive' ),
            'name_admin_bar' => _x( 'Testemunho', 'Add New on Toolbar', 'acevive' ),
            'archives' => __( 'Testemunho Archives', 'acevive' ),
            'attributes' => __( 'Testemunho Attributes', 'acevive' ),
            'parent_item_colon' => __( 'Parent Testemunho:', 'acevive' ),
            'all_items' => __( 'Todos os Testemunhos', 'acevive' ),
            'add_new_item' => __( 'Novo Testemunho', 'acevive' ),
            'add_new' => __( 'Novo', 'acevive' ),
            'new_item' => __( 'Novo Testemunho', 'acevive' ),
            'edit_item' => __( 'Editar Testemunho', 'acevive' ),
            'update_item' => __( 'Atualizar Testemunho', 'acevive' ),
            'view_item' => __( 'Ver Testemunho', 'acevive' ),
            'view_items' => __( 'Ver Testemunhos', 'acevive' ),
            'search_items' => __( 'Buscar Testemunho', 'acevive' ),
            'not_found' => __( 'Não encontrado', 'acevive' ),
            'not_found_in_trash' => __( 'Não encontrado na lixeira', 'acevive' ),
            'featured_image' => __( 'Imagem destaque', 'acevive' ),
            'set_featured_image' => __( 'Definir imagem destaque', 'acevive' ),
            'remove_featured_image' => __( 'Remover imagem destaque', 'acevive' ),
            'use_featured_image' => __( 'Usar como imagem destaque', 'acevive' ),
            'insert_into_item' => __( 'Inserir em Testemunho', 'acevive' ),
            'uploaded_to_this_item' => __( 'Uploaded para este Testemunho', 'acevive' ),
            'items_list' => __( 'Lista de Testemunhos', 'acevive' ),
            'items_list_navigation' => __( 'Navegação lista de Testemunhos', 'acevive' ),
            'filter_items_list' => __( 'Filtrar lista Testemunhos', 'acevive' ),
        );
        $args = array(
            'label' => __( 'testemunhos', 'acevive' ),
            'description' => __( 'Cadastro de testemunhos sobre a Acevive', 'acevive' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-admin-comments',
            'supports' => array('title','thumbnail','author','custom-fields'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => true,
            'show_in_rest' => false,
            'publicly_queryable' => false,
            'capability_type' => 'post',
        );
        register_post_type( 'testemunhos', $args );

    }
    add_action( 'init', 'create_testemunho_cpt', 0 );