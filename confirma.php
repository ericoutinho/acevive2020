<?php

    /**
     * Template name: confirma
     */

    global $wpdb;
    
    $erro = 0;

    if (isset($_GET['c'])):
        $codigo = filter_input(1, 'c');
        if ($user = $wpdb->get_results("SELECT nome, sobrenome, email FROM acv_clientes WHERE codigo = '{$codigo}' LIMIT 1", object)):

            $nome = $user[0]->nome;
            $message = "<h2>Confirmação de Cadastro</h2>\n <p>Olá {$nome},</p>\n <p>Seu cadastro no site da acevive.com foi concluído com sucesso e você já está participando das seleções para vagas em nossa associação e demais empresas associadas.</p>\n <p>Com as novas resoluções favoráveis ao mercado de vistorias automotivas, a demanda por profissionais neste setor está aumentando significativamente, abrindo muitos processos de seleção para novos funcionários em diversas empresas participantes da Acevive.</p>\n <p>As notificações de seleção e vagas serão feitas inicialmente por e-mail, mas pode se estender por outras formas de comunicação (telefone, correspondência, etc) conforme a necessidade.</p>\n <p>Agradecemos o seu contato e desejamos muita sorte nas seleções de vagas.</p>\n <hr/>\n <p><small>Esta mensagem foi gerada automaticamente pelo site acevive.com. Caso as informações contidas nesta mensagem não tenham sido solicitadas ou exibam informações de terceiros, pedimos que desconsidere este e-mail e nos comunique o ocorrido se possível para que eventuais falhas possam ser dirimidas.</small></p>\n";

            //Envio de mensagem
            add_filter('wp_mail_content_type', function($content_type){ return 'text/html'; });
            wp_mail($user[0]->email, "Acevive.com | Confirmação de Cadastro", $message);
        else:
            $erro = 1;
        endif;
    else:
        $erro = 1;
    endif;

?>


<?php get_header(); ?>

<main>
    <?php
        if(!$erro):
    ?>
    <section class="py-5">
        <div class="container">
            <div class="jumbotron">
                <h2>Cadastro concluído</h2>
                <p class="lead">Seu cadastro foi concluído com sucesso e um e-mail de confirmação foi enviado para <a href="mailto:<?php echo $user[0]->email ?>"><?php echo $user[0]->email; ?></a>.</p>
                <hr class="my-4">
                <p>Caso a entrega demore mais que o normal, verifique a caixa de spam ou lixo eletrônico.</p>
                <a class="btn btn-primary btn-lg" href="http://www.acevive.com" role="button">Página inicial</a>
            </div>
        </div>
    </section>
    <?php
        else:
    ?>
    <section class="py-5">
        <div class="container">
        <div class="jumbotron">
                <h1 class="display-4">Falha no cadastro</h1>
                <p class="lead">Infelizmente seu cadastro não pode ser concluído. Verifique os dados informados e tente novamente em alguns minutos.</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="http://www.acevive.com" role="button">Página inicial</a>
            </div>
        </div>
    </section>
    <?php
        endif;
    ?>
</main>

<?php get_footer(); ?>