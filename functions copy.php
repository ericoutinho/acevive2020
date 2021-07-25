<?php

    require_once( dir(__FILE__) . "includes/post_type_testemunhos.php");

    require_once( dir(__FILE__) . "includes/post_type_parceiros.php");

    require_once( dir(__FILE__) . "includes/post_type_associados.php");

    require_once( dir(__FILE__) . "includes/bts_navwalker.php");

    require_once( dir(__FILE__) . "includes/contactForm.php");

    require_once( dir(__FILE__) . "includes/requestForm.php");

    
    // Set content width value based on the theme's design
    // if ( ! isset( $content_width ) ) $content_width = 600;

    // Register Theme Features
    function custom_theme_features()  {

    // Add theme support for Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for Post Formats
    // add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

    // Add theme support for Featured Images
    add_theme_support( 'post-thumbnails' );

    // Add theme support for Custom Background
    // $background_args = array(
    //     'default-color'          => '',
    //     'default-image'          => '',
    //     'default-repeat'         => '',
    //     'default-position-x'     => '',
    //     'wp-head-callback'       => '',
    //     'admin-head-callback'    => '',
    //     'admin-preview-callback' => '',
    // );
    // add_theme_support( 'custom-background', $background_args );

    // Add theme support for Custom Header
    // $header_args = array(
    //     'default-image'          => '',
    //     'width'                  => 0,
    //     'height'                 => 0,
    //     'flex-width'             => false,
    //     'flex-height'            => false,
    //     'uploads'                => true,
    //     'random-default'         => false,
    //     'header-text'            => false,
    //     'default-text-color'     => '',
    //     'wp-head-callback'       => '',
    //     'admin-head-callback'    => '',
    //     'admin-preview-callback' => '',
    //     'video'                  => true,
    //     'video-active-callback'  => '',
    // );
    // add_theme_support( 'custom-header', $header_args );

    // Add theme support for HTML5 Semantic Markup
    add_theme_support( 'html5', array(  ) );

    // Add theme support for document Title tag
    add_theme_support( 'title-tag' );

    // Add theme support for Translation
    load_theme_textdomain( 'acevive2020', get_template_directory() . '/language' );
    }
    add_action( 'after_setup_theme', 'custom_theme_features' );


    // Enqueue own styles
    function enqueue_custom_styles() {
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/styles/font-awesome/css/all.css', array(), false, 'all' );
        wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), false, 'all' );
        wp_enqueue_style( 'custom_css', get_template_directory_uri() .'/assets/styles/styles.css', array(), false, 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );


    // Enqueue own scripts
    function enqueue_custom_scripts() {
        wp_enqueue_script( 'popper_js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN', array('jquery'), false, true );
        wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'custom_js', get_template_directory_uri() .'/assets/scripts/scripts.js', array(), false, true );
    }
    add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

    
    // Register custom navigation menus
    function custom_nav_menus() {
        $locations = array(
            'menu-superior' => __( 'Menu localizado na parte superior da página', 'acevive2020' ),
            'menu-inferior' => __( 'Menu localizado na parte inferior da página', 'acevive2020' )
        );
        register_nav_menus( $locations );
    }
    add_action( 'init', 'custom_nav_menus' );


    // ------------------------------------------------------------------------
    // Adicionar featured image na coluna do admin
    function posts_columns($defaults){
        $defaults['riv_post_thumbs'] = __('Thumbs');
        return $defaults;
    }
     
    function posts_custom_columns($column_name, $id){
            if($column_name === 'riv_post_thumbs'){
            // echo the_post_thumbnail( 'featured-thumbnail' );
            echo the_post_thumbnail( 'thumbnail' );
        }
    }
    add_filter('manage_posts_columns', 'posts_columns', 5);
    add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
    // ------------------------------------------------------------------------


    function my_pagination() {
        $links_page = paginate_links(array(
            'type' => 'array'
        ));
        if (is_array($links_page) && count($links_page)) {
            echo "<nav class='text-center'><ul class='pagination'>";
            foreach ($links_page as $link) {
                echo "<li class='page-item'>" . $link . "</li>";
            }
            echo "</ul></nav>";
        }
    }


    function redirect_to_Custom_Login_Page() {
        wp_redirect(home_url('entrar'));
        exit();
    }
    add_action('wp_logout', 'redirect_to_Custom_Login_Page');


    // Create Shortcode paywall
    // Shortcode: [paywall]Content[/paywall]
    function create_paywall_shortcode($content = null) {
        $html = "<div class='my-5 px-4 py-5 bg-light border rounded shadow text-center'>
            <h3 class='mb-4'>CONTEÚDO RESTRITO</h3>
            <h5>Este conteúdo é voltado diretamente aos associados da Acevive.</h5>
            <p>Desbloqueie o acesso a todos os conteúdos do site filiando sua ECV em nossa associação.</p>
            <hr>
            <a href='".home_url()."' class='btn btn-outline-secondary mr-2'>Voltar ao início</a>
            <a href='".home_url()."' class='btn btn-primary'><i class='fas fa-check mr-2'></i>Quero filiar minha ECV</a>
        </div>\n";
        if (is_user_logged_in()) {
            return $content;
        } else {
            return $html;
        }
    }
    add_shortcode( 'paywall', 'create_paywall_shortcode' );


    // Create Shortcode paywall-inline
    // Shortcode: [paywall-inline page="filiacao"]Content[/paywall-inline]
    function create_paywallinline_shortcode($atts, $content = null) {
        $atts = shortcode_atts( array('page' => 'filiacao'), $atts, 'paywall-inline');
        $page = $atts['page'];
        $html = "<div class='p-4 my-5 bg-light border rounded shadow text-center'>
        <i class='fas fa-lock mr-3 text-muted'></i>Conteúdo restrito aos associados registrados. <a href='".home_url('entrar')."'>Fazer login</a> | <a href='".home_url($page)."'>Saiba mais</a></div>";
        return (is_user_logged_in()) ? $content : $html;
    }
    add_shortcode( 'paywall-inline', 'create_paywallinline_shortcode' );


    // Não enviar e-mail ao alterar a senha
    add_filter( 'password_change_email', '__return_false' );


    


   