<?php

/**
 * Shortcode para gerar o forulário de agendamento
 * @param array $atts Atributos do shortcode
 * @return string codigo html do formulario
 */
function formAgendamento($atts) {

    $cidades = array();
    $args = array(
                'numberposts' => -1,
                'post_status' => 'publish',
                'post_type'   => 'associados',
                'meta_query'   => array(
                                'city' => array(
                                    'key' => 'cidade'
                                ),
                                'company' => array(
                                    'key' => 'empresa'
                                ),
                            ),
                            'orderby' => array(
                                'city' => 'ASC',
                                'company' => 'ASC'
                            )
            );
    $associados = get_posts($args);

    foreach ($associados as $associado) {
        $cidade = get_post_meta($associado->ID, 'cidade', true);
        if (!in_array($cidade, $cidades)) {
            $cidades[] = $cidade;
        }
    }

    $wp_ajax_url = admin_url('admin-ajax.php');
    $wp_action_url = admin_url('admin-post.php');
    $wp_action = 'formRequest';
    $html = "<div class='col-12'>
                    <form method='POST' id='form-agendamento' action='{$wp_action_url}' target='_blank' class='needs-validation' novalidate>
                    <input type='hidden' name='action' value='{$wp_action}'>
                    <div class='row mb-4'>
                        <div class='col-12 text-center'>
                            <h2 class='mb-0'><i class='far fa-calendar-check mr-2'></i>Agende sua vistoria agora mesmo!</h2>
                            <p>Escolha a empresa credenciada mais próxima de você.</p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 col-lg-4 form-group mb-lg-0 text-center'>
                            <label for='js-select-cidade' class='font-montserrat text-muted font-weight-bold'>Escolha a Cidade</label>
                            <select name='js-select-cidade' id='js-select-cidade' class='custom-select' data-url='{$wp_ajax_url}' required>
                                <option value=''>Escolha a cidade</option>";

    foreach ($cidades as $option) {
        $html .= "<option value='{$option}'>{$option}</option>\n";
    }
                            
    $html .=                "</select>
                        </div>
                        <div class='col-12 col-lg-4 form-group mb-lg-0 text-center'>
                            <label for='js-select-empresa' class='font-montserrat text-muted font-weight-bold'>Escolha a Empresa</label>
                            <select name='js-select-empresa' id='js-select-empresa' class='custom-select' disabled required>
                                <option>Escolha a empresa</option>
                            </select>
                        </div>
                        <div class='col-12 col-lg-4 form-group mb-lg-0 text-center'>
                            <label for='js-input-whatsapp' class='font-montserrat text-muted font-weight-bold'>Seu Whatsapp</label>
                            <input type='text' name='js-input-whatsapp' id='js-input-whatsapp' class='form-control' pattern='[0-9]{10,}' disabled required placeholder='DDD + Whatsapp'>
                            <small class='form-text text-muted'>Informe somente os números</small>
                            <div class='invalid-feedback'>Informe um número de Whatsapp válido</div>
                        </div>
                    </div>
                    <div class='row justify-content-center'>
                        <div class='col-12 col-lg-3 form-group d-flex align-items-end mb-lg-0'>
                            <button type='submit' id='js-btn-agendar' class='btn btn-success btn-block font-montserrat' disabled><i class='fas fa-check mr-2'></i>Agendar agora</button>
                        </div>
                    </div>
                    </form>
            </div>\n";

    return $html;
    
}

add_shortcode('form-agendamento', 'formAgendamento');


/**
 * Função do Ajax para retornar as empresas conforme a cidade
 * @return string nome das empresas com ID em lista de <options>
 */
function ajaxGetEmpresas() {
    if (isset($_POST['cidade'])) {
        $cidade = $_POST['cidade'];
        $args = array(
            'numberposts' => -1,
            'post_type'   => 'associados',
            'post_status' => 'publish',
            'meta_query'  => array(
                            'cidade' => array(
                                'key' => 'cidade',
                                'value' => $cidade
                            ),
                            'empresa' => array(
                                'key' => 'empresa'
                            ),
                        ),
                        'orderby' => array(
                            'empresa' => 'ASC'
                        )
        );
        $ecvs = get_posts($args);

        if ($ecvs) {
            echo "<option value=''>Escolha a empresa</option>\n";
            foreach ($ecvs as $ecv) {
                $id = $ecv->ID;
                $empresa = get_post_meta($ecv->ID, 'empresa', true);
                echo "<option value='{$id}'>{$empresa}</option>\n";
            }
        }
        wp_die();
    }
}

add_action( 'wp_ajax_nopriv_ajaxGetEmpresas', 'ajaxGetEmpresas' );
add_action( 'wp_ajax_ajaxGetEmpresas', 'ajaxGetEmpresas' );


/**
 * Função para processar a requisição do formulario de agendamento
 * @return void Direciona para a página conforme o resultado
 */
function formRequest() {
    if (isset($_POST)) {
        global $wpdb;
        $ID         = filter_input(INPUT_POST, 'js-select-empresa');
        $telefone   = filter_input(INPUT_POST, 'js-input-whatsapp');

        $whatsapp   = get_post_meta($ID, 'whatsapp', true);
        $empresa    = mb_strtoupper(get_post_meta($ID, 'empresa', true));
        $cidade     = get_post_meta($ID, 'cidade', true);
        $email      = get_post_meta($ID, 'email', true);

        $texto      = urlencode("Olá {$empresa}, estive no site da ACEVIVE e fui direcionado para o seu contato. Como posso agendar minha vistoria?");
        $agora      = date("d/m/Y H:i:s");

        if (!empty($whatsapp) && !empty($ID)) {
            $data = array('associado_id'=>$ID, 'associado'=>$empresa, 'cidade'=>$cidade);
            $result = $wpdb->insert( 'acv_redirects', $data);

            if ($result) {
                $headers = array('Content-Type: text/html; charset=UTF-8');
                $message = "😀 Olá! Um usuário com o número de Whatsapp {$telefone}, em {$agora}, foi redirecionado do site da Acevive para o Whatsapp da {$empresa} buscando informações sobre os serviços oferecidos.";
                wp_mail($email, "✉ Mensagem de Acevive", $message, $headers);
            }

            wp_redirect("https://api.whatsapp.com/send?phone={$whatsapp}&text={$texto}");
            exit();
        }
    } else {
        wp_redirect(home_url('/'));
        exit();
    }
}

add_action('admin_post_nopriv_formRequest','formRequest');
add_action('admin_post_formRequest','formRequest');