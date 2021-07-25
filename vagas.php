<?php

    /**
     * Template name: vagas
     */

    global $wpdb;
    $notice = '';

    if (isset($_POST['form-vagas'])):
        
        $setor          = filter_input(0, 'setor');
        $dnascimento    = filter_input(0, 'dnascimento');
        $nome           = filter_input(0, 'nome');
        $sobrenome      = filter_input(0, 'sobrenome');
        $sexo           = filter_input(0, 'sexo');
        $email          = filter_input(0, 'email');
        $telefone       = filter_input(0, 'telefone');
        $celular        = filter_input(0, 'celular');
        $cep            = filter_input(0, 'cep');
        $endereco       = filter_input(0, 'endereco');
        $numero         = filter_input(0, 'numero');
        $complemento    = filter_input(0, 'complemento');
        $bairro         = filter_input(0, 'bairro');
        $cidade         = filter_input(0, 'cidade');
        $UF             = filter_input(0, 'uf');
        $aceite         = filter_input(0, 'aceite');
        $news           = filter_input(0, 'news');
        $origem         = filter_input(0, 'origem');

        $codigo         = uniqid('acvc');
        $processo_id    = 2;

        if (!$wpdb->get_results("SELECT email FROM acv_clientes WHERE email = '{$email}' AND p_selecao_id = {$processo_id} LIMIT 1")):

            if ($wpdb->insert('acv_clientes', array(
                'p_selecao_id' => $processo_id,
                'nome'  => trim($nome),
                'sobrenome' => trim($sobrenome),
                'sexo' => $sexo,
                'email' => trim($email),
                'telefone'=> str_replace(array(' ','-','.','_','/',',',';','@','(',')','[',']'), '', $telefone),
                'celular'=> str_replace(array(' ','-','.','_','/',',',';','@','(',')','[',']'), '', $celular),
                'setor' => $setor,
                'dnascimento' => date("Y-m-d", strtotime($dnascimento)),
                'cep' => str_replace(array(' ','-','.','_','/',',',';','@'), '', $cep),
                'endereco' => $endereco,
                'numero' => $numero,
                'complemento' => $complemento,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'uf' => $UF,
                'aceite' => $aceite,
                'news' => $news,
                'origem' => $origem,
                'codigo' => $codigo
            ))) :

                header("Location: /vagas/confirma?c={$codigo}");

            else:
                $notice = "Não foi possível realizar o cadastro.";
            endif;
        else:
            $notice = "Endereço de email já cadastrado.";
        endif;

    endif;

    $values = $_POST;

?>


<?php get_header(); ?>

    <main>
        <section class="py-5">
            <div class="container">
                <?php echo (!empty($notice)) ? '<div class="alert alert-danger" role="alert">'.$notice.'</div>' : ''; ?>
                <h2>Oferta de Vagas</h2>
                <p>A Acevive está sempre buscando profissionais para preeencher vagas disponíveis em sua equipe de colaboradores e das empresas que particiam da associação.</p>

                <form action="" method="post" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-12 col-md-5 form-group">
                            <label for="setor">Vaga pretendida</label>
                            <select name="setor" id="setor" class="custom-select custom-select-sm" required>
                                <option value="">Selecione</option>
                                <?php 
                                    foreach(array('ADM'=>'Administração','VIS'=>'Vistoria veicular') as $k=>$v):
                                        $s = ($k == $values['setor']) ? " selected" : '';
                                        echo "<option value='{$k}'{$s}>{$v}</option>";
                                    endforeach;
                                ?>
                            </select>
                            <small class="form-text text-muted">
                                Setor em que possui experiência ou deseja trabalhar
                            </small>
                            <div class="invalid-feedback">
                                Escolha o setor em que deseja trabalhar
                            </div>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="dnascimento">Data de nascimento</label>
                            <input type="date" max="<?php echo date("Y-m-d", strtotime("-18 years", strtotime("Today"))); ?>" name="dnascimento" id="dnascimento" class="form-control form-control-sm" value="<?= $values['dnascimento']; ?>" required>
                            <div class="invalid-feedback">
                                Informe sua data de nascimento
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-4 form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome" id="nome" placeholder="Nome" value="<?= $values['nome']; ?>" required>
                            <div class="invalid-feedback">
                                Informe o seu nome
                            </div>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control form-control-sm" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="<?= $values['sobrenome']; ?>" required>
                            <div class="invalid-feedback">
                                Por favor, informe o seu sobrenome
                            </div>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="custom-select custom-select-sm" required>
                                <option value=''>Selecionar</option>
                                <?php
                                    $source = array('M'=>'Masculino','F'=>'Feminino','N'=>'Prefiro não declarar');
                                    foreach($source as $k=>$v):
                                        $s = ($k == $values['sexo']) ? ' selected' : '';
                                        echo "<option value='{$k}'{$s}>{$v}</option>";
                                    endforeach;
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Favor escolher uma opção
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="E-mail" value="<?= $values['email']; ?>" required>
                            <small class="form-text text-muted">
                                Endereço de e-mail que será usado para contato
                            </small>
                            <div class="invalid-feedback">
                                Informe um endereço de email válido
                            </div>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" name="telefone" id="telefone" class="form-control form-control-sm" placeholder="DDD + Telefone" value="<?= $values['telefone']; ?>" required>
                            <small class="form-text text-muted">
                                Telefone com DDD (somente números)
                            </small>
                            <div class="invalid-feedback">
                                Informe um número de telefone
                            </div>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="celular">Celular</label>
                            <input type="tel" name="celular" id="celular" class="form-control form-control-sm" placeholder="DDD + Celular" value="<?= $values['celular']; ?>" required>
                            <small class="form-text text-muted">
                                Celular com DDD (somente números)
                            </small>
                            <div class="invalid-feedback">
                                Informe um número de celular
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-2 form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control form-control-sm" name="cep" id="cep" placeholder="CEP" value="<?= $values['cep']; ?>" size="10" maxlength="9" onblur="pesquisacep(this.value);"required>
                            <small class="form-text text-muted">
                                Somente números
                            </small>
                            <div class="invalid-feedback">
                                Informe o seu CEP
                            </div>
                        </div>
                        <div class="col-12 col-md form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control form-control-sm" name="endereco" id="endereco" placeholder="Rua, avenida, logradouro" value="<?= $values['endereco']; ?>" required>
                            <div class="invalid-feedback">
                                Informe seu endereço
                            </div>
                        </div>
                        <div class="col-12 col-md-2 form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control form-control-sm" name="numero" id="numero" value="<?= $values['numero']; ?>" required>
                            <div class="invalid-feedback">
                                Insira o número
                            </div>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control form-control-sm" name="complemento" id="complemento" placeholder="Complemento" value="<?= $values['complemento']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control form-control-sm" name="bairro" id="bairro" placeholder="Bairro" value="<?= $values['bairro']; ?>" required>
                            <div class="invalid-feedback">
                                Informe o bairro
                            </div>
                        </div>
                        <div class="col-12 col-md form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control form-control-sm" name="cidade" id="cidade" placeholder="Cidade" value="<?= $values['cidade']; ?>" required>
                            <div class="invalid-feedback">
                                Informe a cidade
                            </div>
                        </div>
                        <div class="col-12 col-md form-group">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control form-control-sm" maxlength="2" name="uf" id="uf" placeholder="UF" value="<?= $values['uf']; ?>" required>
                            <div class="invalid-feedback">
                                Informe a UF
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <label for="oigem">Como ficou sabendo sobre a vaga?</label>
                            <select name="origem" id="origem" class="custom-select custom-select-sm" required>
                                <option value="">Ecolha um opção</option>
                                <?php
                                    $source = array('google'=>'Busca no Google','instagram'=>'Instagram','facebook'=>'Facebook','olx'=>'OLX','grupos'=>'Páginas ou grupos de emprego','impressos'=>'Anúncio em jornal/revista','indicacao'=>'Indicação de amigo/colega','outro'=>'Outro');
                                    foreach($source as $k=>$v):
                                        $s = ($k == $values['origem']) ? ' selected' : '';
                                        echo "<option value='{$k}'{$s}>{$v}</option>";
                                    endforeach;
                                ?>
                            </select>
                            <small class="form-text text-muted">
                                Gostaríamos de saber como ficou sabendo das vagas
                            </small>
                            <div class="invalid-feedback">
                                Por favor informe como ficou sabendo do cadastro
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group">
                            <!-- <textarea id="termo" class="form-control form-control-sm" rows="5">Termos para Preenchimento de Vagas</textarea> -->
                            <div class="border p-3 my-3" style="height:120px; overflow:scroll;">
                                <h4>Termos e Condições para Cadastro de Candidatos</h4>
                                <p>Ao fazer o cadastro no site www.acevive.com/vagas, o usuário estará fazendo parte automaticamente da base de dados de candidatos a ofertas de vagas de trabalho conforme a demanda da Acevive - Associação Capixaba das Empresas de Vistoria de Veículos e de todas as empresas associadas, bem como seus parceiros de negócios.</p>
                                <p>As vagas serão disponibilizadas conforme a demanda por novas contratações das empresas particpantes da associação.</p>
                                <p>Os dados pessoais fornecidos neste ato de inscrição serão utilizados exclusivamente para análise e seleção de candidatos, não podendo ser utilizados para outros fins, preservando a privacidade e integridade do candidato.</p>
                                <p>Todas as notificações aos candidatos, feitas pelas Acevive e seus associados, serão feitas inicialmente através do endereço de e-mail fornecido no ato de inscrição, podendo ser extendidas por outros meios de comunicação (telefone, correspondência, etc).</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="1" name="aceite" id="aceite" required>
                                <label class="custom-control-label" for="aceite">Declaro estar <strong>totalmente ciente</strong> e <strong>aceitar integralmente</strong> os termos e condições propostos para cadastro de candidato.</label>
                                <div class="invalid-feedback">
                                    É necessário aceitar os termos propostos
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="1" name="news" id="news" checked>
                                <label class="custom-control-label" for="news">Desejo receber periodicamente emails com informações da Acevive e seus parceiros.</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group text-center">
                            <button type="reset" class="btn btn-outline-secondary mr-2">Cancelar</button>
                            <button type="submit" name="form-vagas" class="btn btn-primary">Cadastrar meus dados</button>
                        </div>
                    </div>
                </form>

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
                </script>
            </div>
        </section>
    </main>

<?php get_footer(); ?>

