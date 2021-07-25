<?php

global $user_ID;
global $wpdb;

if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit();
}

if ($_POST) {
    
    $user = array(
        'ID'           => $user_ID,
        'user_login'   => $wpdb->escape($_POST['user_login']),
        'user_email'   => $wpdb->escape($_POST['user_email']),
        'display_name' => $wpdb->escape($_POST['display_name']),
        'user_url'     => $wpdb->escape($_POST['user_url']),
    );

    if (!empty($_POST['user_pass'])) {
        $user['user_pass'] = $wpdb->escape($_POST['user_pass']);
    }

    $meta_cargo     = $wpdb->escape($_POST['meta_cargo']);
    $meta_nickname  = $wpdb->escape($_POST['meta_nickname']);
    $meta_telefone  = $wpdb->escape($_POST['meta_telefone']);

    $user_update = wp_update_user($user);

    if (is_wp_error( $user_update )) {
        $error['message'] = $user_update->get_error_message();
        $error['type'] = 'error';
    } else {
        $error['message'] = 'Os dados foram salvos com sucesso.';
        $error['type'] = 'success';
    }

}

$user = get_user_by('id', $user_ID);
$user_meta = get_user_meta($user_ID);

?>

<?php get_header(); ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col mb-4">
                <h3>Perfil do usuário</h3>
            </div>
        </div>

        <?php
            if ($error) {
        ?>
        <div class="row">
            <div class="col">
                <div class="alert <?=($error['type'] == 'error')?'alert-danger':'alert-success'?>"><?=$error['message']?></div>
            </div>
        </div>
        <?php
            }
        ?>

        <div class="row">
            <div class="col">
                <form action="" method="post" class="needs-validation" novalidate>
                    <div class="form-group row">
                        <label for="meta_empresa" class="col-sm-2 col-form-label">Empresa:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="meta_empresa" readonly value="<?=$user_meta['empresa'][0]?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_cargo" class="col-sm-2 col-form-label">Cargo/Função:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="meta_cargo" id="meta_cargo" value="<?=$user_meta['cargo'][0]?>">
                            <small class="form-text text-muted">Cargo ou função que ocupa na empresa</small>
                        </div>
                    </div>
                    <div class="form-group row pl-3 mt-5">
                        <h5>Pessoal</h5>
                    </div>
                    <div class="form-group row">
                        <label for="display_name" class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="display_name" id="display_name" value="<?=$user->display_name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_login" class="col-sm-2 col-form-label">Nome de usuário:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="user_login" id="user_login" value="<?=$user->user_login?>">
                            <small class="form-text text-muted">Este campo não pode conter números, espaços, pontos ou símbolos</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_nickname" class="col-sm-2 col-form-label">Apelido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="meta_nickname" id="meta_nickname" value="<?=$user_meta['nickname'][0]?>">
                            <small class="form-text text-muted">Como gostaria de ser chamado</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_telefone" class="col-sm-2 col-form-label">Telefone:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="meta_telefone" id="meta_telefone" value="<?=$user_meta['telefone'][0]?>">
                            <small class="form-text text-muted">Informe um telefone com DDD</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_email" class="col-sm-2 col-form-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="user_email" id="user_email" value="<?=$user->user_email?>">
                            <small class="form-text text-muted">Forneça um endereço de e-mail válido</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_url" class="col-sm-2 col-form-label">Website:</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" name="user_url" id="user_url" value="<?=$user->user_url?>">
                            <small class="form-text text-muted">Website pessoal ou corporativo</small>
                        </div>
                    </div>
                    <div class="form-group row pl-3 mt-5">
                        <h5>Segurança</h5>
                    </div>
                    <div class="form-group row">
                        <label for="user_pass" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="user_pass" id="user_pass">
                            <small class="form-text text-muted">Tente utilizar letras, números e símbolos</small>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-check mr-2"></i>Salvar informações</button>
                            <a href="<?=home_url()?>" class="btn btn-outline-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>