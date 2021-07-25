<?php get_template_part('template-parts/template', 'footer'); ?>

<style>
        .js-lgpd-modal {
                position: fixed;
                bottom: 0;
                left: 0;
                z-index: 99999;
                background: #000;
                color: #fff;
                display: none;
                width: 100%;
                padding: 1.5rem 0 2rem;
        }
</style>

<div class="js-lgpd-modal">
        <div class="container">
                <div class="row">
                        <div class="col-12 col-lg-10 mb-4 mb-lg-0">
                                <div class="row">
                                        <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                <i class="fas fa-cookie-bite fa-2x"></i>
                                        </div>
                                        <div class="col-10 col-lg-11">
                                                <p style="font-size:.75rem;margin:0;">Embora não utilizemos cookies próprios, nosso site integra funcionalidades de terceiros que acabarão enviando cookies para seu dispositivo. Ao prosseguir navegando no site, estes cookies coletarão dados pessoais indiretos. Recomendamos que se informe sobre os cookies de terceiros.
                                                        Para saber mais, leia nossa <a href="<?= home_url('politica-de-privacidade') ?>">Política de Privacidade</a> e nosso aviso de <a href="<?= home_url('cookies') ?>">cookies</a>.</p>
                                        </div>
                                </div>
                        </div>
                        <div class="col-12 col-lg-2 d-flex justify-content-center align-items-center">
                                <button type="button" id="js-btn-lgpd" class="btn btn-light btn-sm btn-block"><i class="fas fa-check mr-2"></i>Estou ciente</button>
                        </div>
                </div>
        </div>
</div>

<?php wp_footer(); ?>
</body>

</html>