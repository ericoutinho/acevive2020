<?php

function renderNewsletterForm($args)
{
    $wp_ajax_url = admin_url('admin-ajax.php');

    $render = 
    "<form data-url='{$wp_ajax_url}' id='js-newsletter-form' method='post' class='border bg-light rounded p-4'>
        <div class='row'>
            <div class='col-12 text-center'>
                <h4><i class='fas fa-envelope-open mr-2'></i>Fique por dentro!</h4>
                <p>Saiba de tudo o que acontece no setor em primeira mão, assinando a nossa newsletter.</p>
            </div>
        </div>
        <div class='row'>
            <div class='col-12'>
                <div id='js-newsletter-info' class='text-center alert d-none'></div>
            </div>
        </div>
        <div class='row'>
            <div class='col-12 form-group'>
                <input class='form-control' type='email' name='js-newsletter-email' id='js-newsletter-email' placeholder='Informe o seu melhor e-mail' required>
            </div>
        </div>
        <div class='row'>
            <div class='col-12 form-group mb-0 text-center'>
                <button type='submit' id='js-newsletter-submit' class='btn btn-success btn-block'>Quero me cadastrar!</button>
            </div>
        </div>
    </form>";
    return $render;
}
add_shortcode('form-newsletter', 'renderNewsletterForm');


function ajaxNewsletter()
{
    if ($_POST) {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email) {
            global $wpdb;
            // 👉 Verifica se email já está cadastrado
            $checkEmail = $wpdb->get_var("SELECT email FROM acv_newsletter WHERE email = '{$email}'");
            if ($checkEmail) {
                echo 'match';
                exit();
            }
            // 👉 Tenta inserir o novo registro
            $newsletter = $wpdb->insert('acv_newsletter', array('email' => $email));
            if ($newsletter) {
                echo 'success';
                exit();
            }
        }
    }
    echo 'empty';
    exit();
}
add_action('wp_ajax_nopriv_ajaxNewsletter', 'ajaxNewsletter');
add_action('wp_ajax_ajaxNewsletter', 'ajaxNewsletter');
