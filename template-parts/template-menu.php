<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style="font-family: 'Montserrat', sans-serif;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="<?=home_url('/')?>" class="navbar-brand mr-4">
            <img src="<?php echo get_template_directory_uri();?>/assets/medias/logo-acevive.svg" style="width: 180px; height:auto;">
        </a>
        <?php
            wp_nav_menu( array(
                'theme_location'  => 'menu-superior',
                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'navbarSupportedContent',
                'menu_class'      => 'navbar-nav ml-auto',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
        ?>
        
        <?php
            if (is_user_logged_in()) {
        ?>
        <a href="<?=home_url('login')?>?a=logout" class="btn btn-secondary btn-sm mr-2 ml-3"><i class="fas fa-lock mr-2"></i>Logout</a>
        <?php
            } else {
        ?>
        <a href="<?=home_url('login')?>" class="btn btn-success btn-sm mr-2 ml-3"><i class="fas fa-unlock-alt mr-2"></i>Login</a>
        <?php
            }
        ?>
    </div>
</nav>