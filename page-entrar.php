<?php

    global $user_ID;
    global $wpdb;

    if (is_user_logged_in()) {wp_redirect(home_url()); exit(); }

    if (isset($_POST['login_submited'])) :

        $username = $wpdb->escape($_POST['username']);
        $password = $wpdb->escape($_POST['password']);
        $remember = true;

        $credentials = array(
            'user_login'    => $username,
            'user_password' => $password,
            'remember'      => $remember
        );

        $user = wp_signon($credentials, is_ssl());

        if (is_wp_error($user)) :
            $loginCustomError = $user->get_error_message();
        else :
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID, true, is_ssl());
            do_action('wp_login', $user->user_login, $user);
            wp_redirect(home_url());
            exit();
        endif;
    endif;
?>

<?php get_header(); ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class='bg-light border rounded py-4 px-5'>
                    <h3 class="text-center">Login</h3>
                    <?= ($loginCustomError) ? "<div class='px-3 py-2 alert alert-danger mb-2'>{$loginCustomError}</div>" : "" ?>
                    <form method='POST' action='' class='needs-validation mt-3' novalidate>
                        <div class='row'>
                            <div class='col form-group'>
                                <label for='username'>Usuário</label>
                                <input type='text' class='form-control' name='username' id='username' placeholder='Nome de usuário'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col form-group'>
                                <label for='password'>Password</label>
                                <input type='password' class='form-control' name='password' id='password' placeholder='Password'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col form-group text-center'>
                                <a href='".home_url()."' class='btn btn-outline-secondary'>Cancelar</a>
                                <button type='submit' class='btn btn-primary' name='login_submited'><i class='fas fa-check mr-2'></i>Entrar</button>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col form-group text-center mb-0'>
                                <a href='".home_url()."'>Esqueceu a senha?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>