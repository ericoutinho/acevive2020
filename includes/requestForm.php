<?php

    function requestForm() {
        $enviado = false;

        if (isset($_POST['cadastrar']))
        {
            $data['nome']               = strtoupper(filter_input(INPUT_POST, 'nome'));
            $data['cargo']              = strtoupper(filter_input(INPUT_POST, 'cargo'));
            $data['email']              = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $data['telefone']           = filter_input(INPUT_POST, 'telefone');
            $data['ramal']              = filter_input(INPUT_POST, 'ramal');
            $data['empresa']            = strtoupper(filter_input(INPUT_POST, 'empresa'));
            $data['estado']             = strtoupper(filter_input(INPUT_POST, 'estado'));
            $data['municipio']          = strtoupper(filter_input(INPUT_POST, 'municipio'));
            $data['telefoneEmpresa']    = filter_input(INPUT_POST, 'telefone-empresa');

            date_default_timezone_set('America/Sao_Paulo');
            $agora = date('d/m/Y h:i:s');

            if ($data['nome'] != '' && $data['cargo'] != '' && $data['email'] != '' && $data['telefone'] != '' && $data['empresa'] != '' && $data['estado'] != '' && $data['municipio'] != '' && $data['telefoneEmpresa'] != '')
            {
                $headers  = array('Content-Type: text/html; charset=UTF-8');
                $destino  = 'Acevive <comunicacao@acevive.com>';
                $assunto  = "🔔 Solicitação de Filiação | {$data['empresa']}";
                $mensagem = "<html><head><style>
                table{border-collapse: collapse;}
                td, th{padding:10px; border: 1px solid #000;}
                </style></head><body>
                <p>Mensagem enviada automaticamente do site <a target='_blank' href='https://www.acevive.com'>www.acevive.com</a>.<br/>\n
                Favor não responder esta mensagem ao remetente.</p>\n
                <h1>Solicitação de filiação</h1>\n
                <p>Solicitação enviada em: {$agora}</p>\n
                <table>
                    <tr>
                        <th style='text-align:right;'>Nome do contato:</th>
                        <td>{$data['nome']}</td>
                    </tr>
                    <tr>
                        <th style='text-align:right;'>Cargo que ocupa:</th>
                        <td>{$data['cargo']}</td>
                    </tr>
                    <tr>
                        <th style='text-align:right;'>Email:</th>
                        <td><a href='{$data['email']}'>{$data['email']}</a></td>
                    </tr>
                    <tr>
                        <th style='text-align:right;'>Telefone:</th>
                        <td><a href='tel:{$data['telefone']}'>{$data['telefone']}</a> | Ramal: {$data['ramal']}</td>
                    </tr>
                    <tr>
                        <th style='text-align:right;'>Empresa:</th>
                        <td>{$data['empresa']}</td>
                    </tr>
                    <tr>
                        <th style='text-align:right;'>Local:</th>
                        <td>{$data['municipio']} / {$data['estado']}</td>
                    </tr>
                    <tr>
                        <th style='text-align:right;'>Telefone da empresa:</th>
                        <td><a href='tel:{$data['telefoneEmpresa']}'>{$data['telefoneEmpresa']}</a></td>
                    </tr>
                </table>\n
                <p>Favor responder a solicitação o mais breve possível, atendendo às demandas do solicitante.<br/>\n
                Caso esta solicitação não seja de sua competência, favor encaminhá-la para o setor responsável.</p>\n
                </body></html>";
                if (wp_mail($destino, $assunto, $mensagem, $headers))
                {
                    $enviado = true;
                }
            }
        }

        if ($enviado) {

            return  "<div class='jumbotron'>
                        <h2>Cadastro realizado</h2>
                        <p class='lead'>O cadastro foi realizado com sucesso e em breve, entraremos em contato para prosseguirmos com o processo de filiação de sua empresa.</p>
                        <hr class='my-3'>
                        <p>Caso tenha ficado alguma dúvida quanto ao processo de cadastro, você poderá enviá-la para <a href='mailto:comunicacao@acevive.com' target='_blank'>este e-mail</a>.</p>
                        <a class='btn btn-primary btn-lg' href='https://www.acevive.com' role='button'>Voltar ao início</a>
                    </div>";

        } else {

            return "<div class='rounded p-4 bg-light border'>
            <form class='needs-validation' action='' method='post' id='form-cadastro' name='form-cadastro' novalidate>
                <h3 class='text-center'>Solicitação de Filiação</h3>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='nome'>Nome do representante</label>
                        <input type='text' pattern='.{3,}' name='nome' id='nome' class='form-control form-control-sm' required>
                        <div class='invalid-feedback'>É necessário informar o nome do responsável</div>
                        <small class='form-text text-muted'>Nome da pessoa responsável pela empresa</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='cargo'>Cargo ocupado</label>
                        <input type='text' pattern='.{3,}' name='cargo' id='cargo' class='form-control form-control-sm' required>
                        <div class='invalid-feedback'>Por favor, informe o cargo ocupado na empresa</div>
                        <small class='form-text text-muted'>Cargo da pessoa responsável</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='email'>Email do representante</label>
                        <input type='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' class='form-control form-control-sm' name='email' id='email' required>
                        <div class='invalid-feedback'>É necessário informar um e-mail válido</div>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='telefone'>Telefone do representante</label>
                        <input type='tel' class='form-control form-control-sm' name='telefone' id='telefone' required>
                        <div class='invalid-feedback'>Por favor, informe um telefone para contato</div>
                        <small class='form-text text-muted'>Informe o número de telefone com DDD</small>
                    </div>
                    <div class='form-group col col-md-4'>
                        <label for='ramal'>Ramal</label>
                        <input type='text' class='form-control form-control-sm' name='ramal' id='ramal'>
                    </div>
                </div>
                <hr>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='empresa'>Nome da empresa</label>
                        <input type='text' pattern='.{3,}' name='empresa' id='empresa' class='form-control form-control-sm' required>
                        <div class='invalid-feedback'>É necessário informar o nome da empresa</div>
                        <small class='form-text text-muted'>Nome Fantasia ou Razão Social</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='estado'>Estado de atuação</label>
                        <select class='custom-select custom-select-sm' name='estado' id='estado' required>
                            <option value='AC'>Acre</option>
                            <option value='AL'>Alagoas</option>
                            <option value='AP'>Amapá</option>
                            <option value='AM'>Amazonas</option>
                            <option value='BA'>Bahia</option>
                            <option value='CE'>Ceará</option>
                            <option value='DF'>Distrito Federal</option>
                            <option value='ES' selected>Espírito Santo</option>
                            <option value='GO'>Goiás</option>
                            <option value='MA'>Maranhão</option>
                            <option value='MT'>Mato Grosso</option>
                            <option value='MS'>Mato Grosso do Sul</option>
                            <option value='MG'>Minas Gerais</option>
                            <option value='PA'>Pará</option> 
                            <option value='PB'>Paraíba</option>
                            <option value='PR'>Paraná</option>
                            <option value='PE'>Pernambuco</option>
                            <option value='PI'>Piauí</option>
                            <option value='RJ'>Rio de Janeiro</option>
                            <option value='RN'>Rio Grande do Norte</option>
                            <option value='RS'>Rio Grande do Sul</option>
                            <option value='RO'>Rondônia</option>
                            <option value='RR'>Roraima</option>
                            <option value='SC'>Santa Catarina</option>
                            <option value='SP'>São Paulo</option>
                            <option value='SE'>Sergipe</option>
                            <option value='TO'>Tocantins</option>
                        </select>
                        <div class='invalid-feedback'>Selecione o Estado de atuação da empresa</div>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='municipio'>Município de atuação</label>
                        <div class='invalid-feedback'>Informe o município de atuação</div>
                        <input type='text' pattern='.{4,}' class='form-control form-control-sm' name='municipio' id='municipio' required>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col'>
                        <label for='telefone-empresa'>Telefone da empresa</label>
                        <input type='tel' pattern='[\(\)\s\-0-9]{10,}{' class='form-control form-control-sm' name='telefone-empresa' id='telefone-empresa' required>
                        <div class='invalid-feedback'>É necessário informar um telefone de contato</div>
                        <small class='form-text text-muted'>Informe o número de telefone com DDD</small>
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
                        <button type='submit' class='btn btn-primary text-uppercase px-3' name='cadastrar'><i class='fas fa-check mr-2'></i>Quero me filiar</button>
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

    add_shortcode("request-form", 'requestForm');