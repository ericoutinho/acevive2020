<?php

function contactForm() {
    $enviado = false;

    if (isset($_POST['cadastrar']))
    {
        $data['nome']       = strtoupper(filter_input(INPUT_POST, 'nome'));
        $data['sobrenome']  = strtoupper(filter_input(INPUT_POST, 'sobrenome'));
        $data['email']      = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $data['telefone']   = filter_input(INPUT_POST, 'telefone');
        $data['mensagem']   = strtoupper(filter_input(INPUT_POST, 'mensagem'));

        date_default_timezone_set('America/Sao_Paulo');
        $agora = date('d/m/Y h:i:s');

        if ($data['nome'] != '' && $data['email'] != '' && $data['telefone'] != '' && $data['mensagem'] != '')
        {
            $headers  = array('Content-Type: text/html; charset=UTF-8');
            $destino  = 'Acevive <comunicacao@acevive.com>';
            $assunto  = "🔔 Mensagem de acevive.com | {$data['nome']} {$data['sobrenome']}";
            $mensagem = "<html><head><style>
            table{border-collapse: collapse;}
            td, th{padding:10px; border: 1px solid #000;}
            </style></head><body>
            <p>Mensagem enviada automaticamente do site <a target='_blank' href='https://www.acevive.com'>www.acevive.com</a>.<br/>\n
            Favor não responder esta mensagem ao remetente.</p>\n
            <h1>Mensagem</h1>\n
            <p>Solicitação enviada em: {$agora}</p>\n
            <table>
                <tr>
                    <th style='text-align:right;'>Nome:</th>
                    <td>{$data['nome']} {$data['sobrenome']}</td>
                </tr>
                <tr>
                    <th style='text-align:right;'>Email:</th>
                    <td><a href='{$data['email']}'>{$data['email']}</a></td>
                </tr>
                <tr>
                    <th style='text-align:right;'>Telefone:</th>
                    <td><a href='tel:{$data['telefone']}'>{$data['telefone']}</a></td>
                </tr>
                <tr>
                    <th style='text-align:right;'>Telefone da empresa:</th>
                    <td>{$data['mensagem']}</td>
                </tr>
            </table>\n
            <p>Favor responder a solicitação o mais breve possível, atendendo às demandas do solicitante.<br/>\n
            Caso esta solicitação não seja de sua competência, favor encaminhá-la para o setor responsável.</p>\n
            </body></html>";

            if (wp_mail($destino, $assunto, $mensagem, $headers))
            {
                $enviado = true;

                $headers  = array('Content-Type: text/html; charset=UTF-8');
                $destino  = "{$data['nome']} {$data['sobrenome']} <{$data['email']}>";
                $assunto  = "🔔 Mensagem de acevive.com";
                $mensagem = "<html><head><style>
                table{border-collapse: collapse;}
                td, th{padding:10px; border: 1px solid #000;}
                </style></head><body>
                <h3>Prezado(a) {$data['nome']},</h3>
                <p>Mensagem enviada automaticamente do site <a target='_blank' href='https://www.acevive.com'>www.acevive.com</a>.<br/>\n
                Favor não responder esta mensagem ao remetente.</p>\n
                <h1>Mensagem recebida</h1>\n
                <p>A sua mensagem foi recebida em nosso site e será respondida o mais breve possível.<br/>
                Agradecemos a sua participação.</p>
                <p>Cordialmente,<br>
                ACEVIVE<br<
                Associação Capixaba das Empresas de Vistoria de Veículos</p>
                <p>(27) 99918-6595<br>
                <a href='mailto:comunicacao@acevive.com'>comunicacao@acevive.com</a></p>
                <p>Mensagem enviada em: {$agora}</p>\n
                </body></html>";

                wp_mail($destino, $assunto, $mensagem, $headers);
            }
        }
    }

    if ($enviado) {

        return  "<div class='jumbotron'>
                    <h2>Mensagem enviada</h2>
                    <p class='lead'>Sua mensagem foi enviada e em breve sua solicitação será atendida.</p>
                    <hr class='my-3'>
                    <p>Caso tenha ficado alguma dúvida, você poderá enviá-la para <a href='mailto:comunicacao@acevive.com' target='_blank'>este e-mail</a>.</p>
                    <a class='btn btn-primary btn-lg' href='https://www.acevive.com' role='button'>Voltar ao início</a>
                </div>";

    } else {
        return "<div class='rounded p-4 bg-light border'>
        <form class='needs-validation' action='' method='post' id='form-contato' name='form-contato' novalidate>
            <div class='row'>
                <div class='form-group col'>
                    <label for='nome'>Primeiro nome</label>
                    <input type='text' pattern='.{3,}' name='nome' id='nome' class='form-control form-control-sm' required>
                    <div class='invalid-feedback'>É necessário informar o seu nome</div>
                    <small class='form-text text-muted'>Seu primeiro nome Ex. Marcos</small>
                </div>
                <div class='form-group col'>
                    <label for='sobrenome'>Sobrenome</label>
                    <input type='text' pattern='.{3,}' name='sobrenome' id='sobrenome' class='form-control form-control-sm' required>
                    <div class='invalid-feedback'>É necessário informar o seu sobrenome</div>
                    <small class='form-text text-muted'>Seu sobrenome Ex. de Oliveira</small>
                </div>
            </div>
            <div class='row'>
                <div class='form-group col'>
                    <label for='email'>Email</label>
                    <input type='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' class='form-control form-control-sm' name='email' id='email' required>
                    <div class='invalid-feedback'>É necessário informar um e-mail válido</div>
                </div>
            </div>
            <div class='row'>
                <div class='form-group col'>
                    <label for='telefone'>Telefone de contato</label>
                    <input type='tel' class='form-control form-control-sm' name='telefone' id='telefone' required>
                    <div class='invalid-feedback'>Por favor, informe um telefone para contato</div>
                    <small class='form-text text-muted'>Informe o número de telefone com DDD</small>
                </div>
            </div>
            <div class='row'>
                <div class='form-group col'>
                    <label for='mensagem'>Mensagem</label>
                    <div class='invalid-feedback'>Informe o município de atuação</div>
                    <textarea pattern='.{4,}' class='form-control form-control-sm' rows='10' name='mensagem' id='mensagem' placeholder='Escreva aqui a sua solicitação' required></textarea>
                </div>
            </div>
            <hr>
            <div class='row mb-3'>
                <div class='form-group col text-center' style='font-size:.75rem'>
                A Acevive, respeitando as normas e leis vigentes que protegem a pivacidade e segurança dos dados individuais, assume o compromisso e responsabilidade de não divulgar, repassar, compartilhar ou distribuir, para terceiros ou associados, quaisquer das informações aqui fornecidas através deste formulário de cadastro, ficando as informações restritas à utilização estritamente para estabelecer um canal de contato com a nossa instituição.
                </div>
            </div>
            <div class='row'>
                <div class='form-group col text-center'>
                    <a href='".home_url()."' class='btn btn-outline-secondary text-uppercase px-3 mr-1'><i class='fas fa-times mr-2'></i>Cancelar</a>
                    <button type='submit' class='btn btn-primary text-uppercase px-3' name='cadastrar'><i class='fas fa-check mr-2'></i>Enviar mensagem</button>
                </div>
            </div>
        </form>
        </div>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
        </script>";
    }
}

add_shortcode('contact-form', 'contactForm');