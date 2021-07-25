<?php

require_once(dir(__FILE__) . "includes/post_type_testemunhos.php");
require_once(dir(__FILE__) . "includes/post_type_parceiros.php");
require_once(dir(__FILE__) . "includes/post_type_associados.php");
require_once(dir(__FILE__) . "includes/post_type_anuncios.php");

require_once(dir(__FILE__) . "includes/bts_navwalker.php");

require_once(dir(__FILE__) . "includes/contactForm.php");

require_once(dir(__FILE__) . "includes/requestForm.php");

require_once(dir(__FILE__) . "includes/agendamento.php");
require_once(dir(__FILE__) . "includes/newsletter.php");
require_once(dir(__FILE__) . "includes/pesquisas.php");



// Set content width value based on the theme's design
// if ( ! isset( $content_width ) ) $content_width = 600;

// Register Theme Features
function custom_theme_features()
{

    // Add theme support for Automatic Feed Links
    add_theme_support('automatic-feed-links');

    // Add theme support for Post Formats
    add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

    // Add theme support for Featured Images
    add_theme_support('post-thumbnails');

    // add_image_size( 'custom-size', 220, 180, true );

    update_option('medium_size_w', 300);
    update_option('medium_size_h', 300);
    update_option('medium_crop', 1);

    update_option('large_size_w', 600);
    update_option('large_size_h', 300);
    update_option('large_crop', array('center','center'));

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
    add_theme_support('html5', array());

    // Add theme support for document Title tag
    add_theme_support('title-tag');

    // Add theme support for Translation
    load_theme_textdomain('acevive2020', get_template_directory() . '/language');
}
add_action('after_setup_theme', 'custom_theme_features');


// Enqueue own styles
function enqueue_custom_styles()
{
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/styles/font-awesome/css/all.css', array(), false, 'all');
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('custom_css', get_template_directory_uri() . '/assets/styles/styles.css', array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


// Enqueue own scripts
function enqueue_custom_scripts()
{
    wp_enqueue_script('popper_js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('agendamento', get_template_directory_uri() . '/assets/scripts/agendamento.js', array('jquery'), false, true);
    wp_enqueue_script('newsletter', get_template_directory_uri() . '/assets/scripts/newsletter.js', array('jquery'), false, true);
    wp_enqueue_script('custom_js', get_template_directory_uri() . '/assets/scripts/scripts.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// Register custom navigation menus
function custom_nav_menus()
{
    $locations = array(
        'menu-superior' => __('Menu localizado na parte superior da página', 'acevive2020'),
        'menu-inferior' => __('Menu localizado na parte inferior da página', 'acevive2020')
    );
    register_nav_menus($locations);
}
add_action('init', 'custom_nav_menus');


// ------------------------------------------------------------------------
// Adicionar featured image na coluna do admin
// function posts_columns($defaults){
//     $defaults['riv_post_thumbs'] = __('Thumbs');
//     return $defaults;
// }

// function posts_custom_columns($column_name, $id){
//         if($column_name === 'riv_post_thumbs'){
//         // echo the_post_thumbnail( 'featured-thumbnail' );
//         echo the_post_thumbnail( 'thumbnail' );
//     }
// }
// add_filter('manage_posts_columns', 'posts_columns', 5);
// add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
// ------------------------------------------------------------------------


function my_pagination()
{
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


function redirect_to_Custom_Login_Page()
{
    wp_redirect(home_url('/'));
    exit();
}
add_action('wp_logout', 'redirect_to_Custom_Login_Page');

// Não enviar e-mail ao alterar a senha
add_filter('password_change_email', '__return_false');


// Não exibe barra admin se usuario nao for administrador
if (!current_user_can('manage_options')) {
    add_filter('show_admin_bar', '__return_false');
}


// Remove o a tag title inserida pelo Wordpress
remove_action( 'wp_head', '_wp_render_title_tag', 1 );

// Método para inserir as tags de SEO do tema
function myThemeSEO() {

    if (!is_archive() && !is_home() && !is_404()) {
        $title = get_the_title() . " - " . get_bloginfo('name');
    } else {
        $title  = str_replace('Arquivos: ','', get_the_archive_title()) . " - " . get_bloginfo('name');
    }
    $description = (!empty(get_the_excerpt())) ? get_the_excerpt() : get_bloginfo('description');
    $image       = (!empty(get_the_post_thumbnail_url())) ? get_the_post_thumbnail_url() : get_template_directory_uri() . "/theme-cover.jpg";
    $url         = get_the_permalink();
    
    $html  = "\n\n<!-- Início de SEO Acevive -->\n\n";
    $html .= "\t\t<title>$title</title>\n";
    $html .= "\t\t<meta name='description' content='{$description}'>\n";
    $html .= "\t\t<meta property='og:title' content='{$title}'>\n";
    $html .= "\t\t<meta property='og:description' content='{$description}'>\n";
    $html .= "\t\t<meta property='og:image' content='{$image}'>\n";
    $html .= "\t\t<meta property='og:image:alt' content='{$title}'>\n";
    $html .= "\t\t<meta property='og:locale' content='pt_BR'>\n";
    $html .= "\t\t<meta property='og:type' content='website'>\n";
    $html .= "\t\t<meta name='twitter:card' content='summary_large_image'>\n";
    $html .= "\t\t<meta property='og:url' content='{$url}'>\n";
    $html .= "\t\t<link rel='canonical' href='{$url}'>\n";
    $html .= "\t\t<meta name='theme-color' content='#006554'>\n";
    $html .= "\n<!-- Fim de SEO Acevive -->\n\n";

    echo $html;
}
// Insere o método no Hook wp_head com prioridade 1
add_action('wp_head', 'myThemeSEO', 1);


// Modificar a saída do título quando é archives
add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_home() ) {
        $title = 'Notícias';
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_404() ) {
        $title = '404! Página não encontrada';
    } else {
        $title = __( 'Archives' );
    }
    return $title;
});
