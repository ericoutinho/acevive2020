<?php

    // Register Custom Post Type Associado
    function create_anuncio_cpt() {

        $labels = array(
            'name' => _x( 'Anuncios', 'Post Type General Name', 'acevive' ),
            'singular_name' => _x( 'Anuncio', 'Post Type Singular Name', 'acevive' ),
            'menu_name' => _x( 'Anuncios', 'Admin Menu text', 'acevive' ),
            'name_admin_bar' => _x( 'Anuncio', 'Add New on Toolbar', 'acevive' ),
            'archives' => __( 'Anuncio Archives', 'acevive' ),
            'attributes' => __( 'Anuncio Attributes', 'acevive' ),
            'parent_item_colon' => __( 'Parent Anuncio:', 'acevive' ),
            'all_items' => __( 'Todos Anuncios', 'acevive' ),
            'add_new_item' => __( 'Novo Anuncio', 'acevive' ),
            'add_new' => __( 'Novo', 'acevive' ),
            'new_item' => __( 'Novo Anuncio', 'acevive' ),
            'edit_item' => __( 'Editar Anuncio', 'acevive' ),
            'update_item' => __( 'Update Anuncio', 'acevive' ),
            'view_item' => __( 'Ver Anuncio', 'acevive' ),
            'view_items' => __( 'Ver Anuncios', 'acevive' ),
            'search_items' => __( 'Buscar Anuncio', 'acevive' ),
            'not_found' => __( 'Não encontrado', 'acevive' ),
            'not_found_in_trash' => __( 'Não encontrado in Trash', 'acevive' ),
            'featured_image' => __( 'Imagem destaque', 'acevive' ),
            'set_featured_image' => __( 'Definir imagem destaque', 'acevive' ),
            'remove_featured_image' => __( 'Remover imagem destaque', 'acevive' ),
            'use_featured_image' => __( 'Usar como imagem destaque', 'acevive' ),
            'insert_into_item' => __( 'Inserir em Anuncio', 'acevive' ),
            'uploaded_to_this_item' => __( 'Uploaded para este Anuncio', 'acevive' ),
            'items_list' => __( 'Lista Anuncios', 'acevive' ),
            'items_list_navigation' => __( 'Navegação lista Anuncios', 'acevive' ),
            'filter_items_list' => __( 'Filtrar lista Anuncios', 'acevive' ),
        );
        $args = array(
            'label' => __( 'anuncios', 'acevive' ),
            'description' => __( 'Cadastro dos anuncios da Acevive', 'acevive' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-megaphone',
            'supports' => array('title','editor','custom-fields','page-atributes','post-formats'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => false,
            'can_export' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => true,
            'show_in_rest' => false,
            'publicly_queryable' => false,
            'capability_type' => 'post',
        );
        register_post_type( 'anuncios', $args );

    }
    add_action( 'init', 'create_anuncio_cpt', 0 );