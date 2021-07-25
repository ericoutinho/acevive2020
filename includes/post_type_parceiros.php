<?php

    // Register Custom Post Type parceiro
    function create_parceiro_cpt() {

        $labels = array(
            'name' => _x( 'Parceiros', 'Post Type General Name', 'acevive' ),
            'singular_name' => _x( 'Parceiro', 'Post Type Singular Name', 'acevive' ),
            'menu_name' => _x( 'Parceiros', 'Admin Menu text', 'acevive' ),
            'name_admin_bar' => _x( 'Parceiro', 'Add New on Toolbar', 'acevive' ),
            'archives' => __( 'Parceiro Archives', 'acevive' ),
            'attributes' => __( 'Parceiro Attributes', 'acevive' ),
            'parent_item_colon' => __( 'Parent parceiro:', 'acevive' ),
            'all_items' => __( 'Todos os parceiros', 'acevive' ),
            'add_new_item' => __( 'Novo parceiro', 'acevive' ),
            'add_new' => __( 'Novo', 'acevive' ),
            'new_item' => __( 'Novo parceiro', 'acevive' ),
            'edit_item' => __( 'Editar parceiro', 'acevive' ),
            'update_item' => __( 'Atualizar parceiro', 'acevive' ),
            'view_item' => __( 'Ver parceiro', 'acevive' ),
            'view_items' => __( 'Ver parceiros', 'acevive' ),
            'search_items' => __( 'Buscar parceiro', 'acevive' ),
            'not_found' => __( 'Não encontrado', 'acevive' ),
            'not_found_in_trash' => __( 'Não encontrado na lixeira', 'acevive' ),
            'featured_image' => __( 'Imagem destaque', 'acevive' ),
            'set_featured_image' => __( 'Definir imagem destaque', 'acevive' ),
            'remove_featured_image' => __( 'Remover imagem destaque', 'acevive' ),
            'use_featured_image' => __( 'Usar como imagem destaque', 'acevive' ),
            'insert_into_item' => __( 'Inserir em parceiro', 'acevive' ),
            'uploaded_to_this_item' => __( 'Uploaded para este parceiro', 'acevive' ),
            'items_list' => __( 'Lista parceiros', 'acevive' ),
            'items_list_navigation' => __( 'Navegação lista parceiros', 'acevive' ),
            'filter_items_list' => __( 'Filtrar lista parceiros', 'acevive' ),
        );
        $args = array(
            'label' => __( 'Parceiros', 'acevive' ),
            'description' => __( 'Cadastro de parceiros', 'acevive' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-businessman',
            'supports' => array('title','custom-fields'),
            'taxonomies' => array(''),
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
        register_post_type( 'parceiros', $args );

    }
    add_action( 'init', 'create_parceiro_cpt', 0 );