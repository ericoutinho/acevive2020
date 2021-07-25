<?php

    // Register Custom Post Type Associado
    function create_associado_cpt() {

        $labels = array(
            'name' => _x( 'Associados', 'Post Type General Name', 'acevive' ),
            'singular_name' => _x( 'Associado', 'Post Type Singular Name', 'acevive' ),
            'menu_name' => _x( 'Associados', 'Admin Menu text', 'acevive' ),
            'name_admin_bar' => _x( 'Associado', 'Add New on Toolbar', 'acevive' ),
            'archives' => __( 'Associado Archives', 'acevive' ),
            'attributes' => __( 'Associado Attributes', 'acevive' ),
            'parent_item_colon' => __( 'Parent Associado:', 'acevive' ),
            'all_items' => __( 'Todos Associados', 'acevive' ),
            'add_new_item' => __( 'Novo Associado', 'acevive' ),
            'add_new' => __( 'Novo', 'acevive' ),
            'new_item' => __( 'Novo Associado', 'acevive' ),
            'edit_item' => __( 'Editar Associado', 'acevive' ),
            'update_item' => __( 'Update Associado', 'acevive' ),
            'view_item' => __( 'Ver Associado', 'acevive' ),
            'view_items' => __( 'Ver Associados', 'acevive' ),
            'search_items' => __( 'Buscar Associado', 'acevive' ),
            'not_found' => __( 'Não encontrado', 'acevive' ),
            'not_found_in_trash' => __( 'Não encontrado in Trash', 'acevive' ),
            'featured_image' => __( 'Imagem destaque', 'acevive' ),
            'set_featured_image' => __( 'Definir imagem destaque', 'acevive' ),
            'remove_featured_image' => __( 'Remover imagem destaque', 'acevive' ),
            'use_featured_image' => __( 'Usar como imagem destaque', 'acevive' ),
            'insert_into_item' => __( 'Inserir em Associado', 'acevive' ),
            'uploaded_to_this_item' => __( 'Uploaded para este Associado', 'acevive' ),
            'items_list' => __( 'Lista Associados', 'acevive' ),
            'items_list_navigation' => __( 'Navegação lista Associados', 'acevive' ),
            'filter_items_list' => __( 'Filtrar lista Associados', 'acevive' ),
        );
        $args = array(
            'label' => __( 'associados', 'acevive' ),
            'description' => __( 'Cadastro dos associados da Acevive', 'acevive' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-groups',
            'supports' => array('title','custom-fields'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type( 'associados', $args );

    }
    add_action( 'init', 'create_associado_cpt', 0 );