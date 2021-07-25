<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light mb-4" style="font-family: 'Montserrat', sans-serif;">
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
                'container_id'    => '#navbarSupportedContent',
                'menu_class'      => 'navbar-nav ml-auto',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
        ?>
        
        <?php
            global $user_ID;
            if (is_user_logged_in()) {
                $user = get_user_meta($user_ID);
        ?>
        <div class="dropdown ml-3">
            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle mr-2"></i><?=$user['nickname'][0]?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?=home_url('perfil')?>">Meu perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=home_url('logout')?>"><i class="fas fa-sign-out-alt mr-2"></i>Sair</a>
            </div>
        </div>
        <?php
            } else {
        ?>
        <a href="<?=home_url('entrar')?>" class="btn btn-success btn-sm mr-2 ml-3"><i class="fas fa-unlock-alt mr-2"></i>Login</a>
        <?php
            }
        ?>
    </div>
</nav>