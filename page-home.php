<?php get_header(); ?>

<?php if (date('m') == 5): ?>
<!-- Campanha Maio Amarelo válida até 31/05 -->
<section style="background:orange;">
    <div class="container">
        <div class="row">
            <div class="col py-2 text-center" style="color:#444; font-size: clamp(.75rem, 2vw, 1rem);">
                <i class="fas fa-ribbon mr-1"></i><strong>MAIO AMARELO</strong>: Perceba o risco. Proteja a vida! &nbsp; <a href="https://maioamarelo.com/" style="font-weight: bold; text-decoration:underline; color:inherit;" target="_blank">Saiba mais</a>
            </div>
        </div>
    </div>
</section>
<!-- Fim da Campanha Maior Amarelo -->
<?php endif; ?>

<header class="d-flex align-items-stretch">
    <div class="container d-flex align-items-stretch">
        <div class="row d-flex align-items-stretch">
            <div class="col-12 col-lg-6 text-light d-flex flex-column text-center text-lg-left justify-content-center py-5">
                <h1 class="mb-3">Junte-se as maiores ECV's do Estado!</h1>
                <h4 class="text-warning mb-3">Venha fazer parte do desenvolvimento</h4>
                <p class="mb-4">Filie sua ECV e ganhe maior visibilidade, representatividade e ainda contribua para o crescimento do setor de vistoria veicular Capixaba.</p>
                <p>
                    <a href="<?= home_url('quem-somos') ?>" class="btn btn-warning mr-2 font-montserrat mb-3 mb-lg-0"><i class="fas fa-search-plus fa-lg mr-2"></i>Conheça mais</a>
                    <a href="https://wa.me/5527999186595" target="_blank" class="btn btn-success font-montserrat shadow"><i class="fab fa-whatsapp fa-lg mr-2"></i>Chame no Whatsapp</a>
                </p>
            </div>
            <div class="col-12 col-lg-6 d-none d-lg-flex align-items-end justify-content-center">
                <img src="<?= get_template_directory_uri() ?>/assets/medias/header-actor_C.png" class="img-header-actor" style="max-height: 550px;">
            </div>
        </div>
    </div>
</header>

<section id="agendamento" style='background:#EAF2AE;'>
    <div class="container">
        <div class="row p-5">
            <?php echo do_shortcode('[form-agendamento]'); ?>
        </div>
    </div>
</section>

<section id="features" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <div class="border shadow-sm rounded p-3 bg-light h-100 mb-4 mb-lg-0 d-flex">
                    <div class="row">
                        <div class="col-4 col-lg-3 d-flex align-items-center justify-content-center">
                            <img src="<?= get_template_directory_uri() ?>/assets/medias/puzzle.png" class="mb-3 mb-lg-0" style="width: clamp(50px, 100%, 128px);">
                        </div>
                        <div class="col-8 col-lg-9 text-center">
                            <h4 style="margin-bottom:.5rem;">Filie sua ECV</h4>
                            <p style="font-size:.9rem;">Várias empresas, em todo o Estado, já fazem parte da Acevive. Filie-se também e colabore para o <strong>crescimento do Setor Capixaba de Vistorias</strong>.</p>
                            <a href="<?= home_url('filiacao') ?>" class="stretched-link font-montserrat text-decoration-none"><i class="fas fa-angle-right mr-1 fa-lg"></i>Desejo filiar a minha ECV</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="border shadow-sm rounded p-3 bg-light h-100 mb-4 mb-lg-0 d-flex">
                    <div class="row">
                        <div class="col-4 col-lg-3 d-flex align-items-center justify-content-center">
                            <img src="<?= get_template_directory_uri() ?>/assets/medias/setting.png" class="mb-3 mb-lg-0" style="width: clamp(50px, 100%, 128px);">
                        </div>
                        <div class="col-8 col-lg-9 text-center">
                            <h4 style="margin-bottom:.5rem;">Parcerias</h4>
                            <p style="font-size:.9rem;">Nossos associados têm acesso a <strong>preços e condições exclusivas</strong> em produtos e serviços, através de parcerias com diversas empresas de vários setores.</p>
                            <a href="<?= home_url('parceiros') ?>" class="stretched-link font-montserrat text-decoration-none"><i class="fas fa-angle-right mr-1 fa-lg"></i>Veja as empresas participantes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="vantagens" class="py-5 d-flex flex-column justify-content-center" style="min-height:100vh;">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 col-lg-8 offset-lg-2 text-center">
                <h2 class="mb-3 text-light">Vantagens em ser um associado</h2>
                <p class="text-light">A Acevive busca sempre oferecer aos seus associados, serviços e soluções que contribuam para o desenvolvimento da sua atividade, através de parcerias e convênios com outras empresas.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="p-3 h-100 text-center rounded bg-light shadow d-flex flex-column align-items-center">
                    <img class="mb-2" src="<?= get_template_directory_uri() ?>/assets/medias/rocket-launch.png" style="width:25%;max-width:128px;">
                    <h4 class="mb-2">Marketing de apoio</h4>
                    <p class="mb-2 flex-fill" style="font-size:.9rem;">A Acevive desenvolve regularmente ações de marketing nos mecanismos de busca e redes sociais, afim de promover o setor e seus associados.</p>
                    <a href="<?= home_url('vantagens#marketing') ?>" style="margin-bottom:.5rem;padding-top:.5rem;border-top:1px solid #ccc;width:100%;" class="stretched-link text-decoration-none d-block font-montserrat">Saiba mais detalhes</a>
                    <i class="text-muted fas fa-chevron-circle-down fa-lg"></i>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="p-3 text-center h-100 bg-light rounded shadow d-flex flex-column align-items-center">
                    <img class="mb-2" src="<?= get_template_directory_uri() ?>/assets/medias/business-partnership.png" style="width:25%;max-width:128px;">
                    <h4 class="mb-2">Assessoria jurídica</h4>
                    <p class="mb-2 flex-fill" style="font-size:.9rem;">Uma das vantagens em ser associado, é poder contar com suporte jurídico para sua ECV em processos administrativos, gratuitamente.</p>
                    <a href="<?= home_url('vantagens#juridico') ?>" style="margin-bottom:.5rem;padding-top:.5rem;border-top:1px solid #ccc;width:100%;" class="stretched-link text-decoration-none d-block font-montserrat">Veja como funciona</a>
                    <i class="text-muted fas fa-chevron-circle-down fa-lg"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="p-3 text-center h-100 bg-light rounded shadow d-flex flex-column align-items-center">
                    <img class="mb-2" src="<?= get_template_directory_uri() ?>/assets/medias/business-presentation.png" style="width:25%;max-width:128px;">
                    <h4 class="mb-2">Credenciamento</h4>
                    <p class="mb-2 flex-fill" style="font-size:.9rem;">A Acevive oferece aos seus associados assessoria especializada ao credenciamento de sua ECV e suporte integrado até o término do processo.</p>
                    <a href="<?= home_url('vantagens#credenciamento') ?>" style="margin-bottom:.5rem;padding-top:.5rem;border-top:1px solid #ccc;width:100%;" class="stretched-link text-decoration-none d-block font-montserrat">Saiba mais detalhes</a>
                    <i class="text-muted fas fa-chevron-circle-down fa-lg"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="news" class="py-5 bg-light">
    <div class="container">
        <!-- artigos -->
        <div class="row">

            <?php
            // Custom WP query query
            $args_query = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'orderby' => 'date',
                'ignore_sticky_posts' => true
            );

            $query = new WP_Query($args_query);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <article class="article-card border p-3 h-100 d-flex flex-column bg-white shadow position-relative">
                            <span class="article-category"><?= the_category(' | ') ?></span>
                            <img class="article-cover" src="<?= the_post_thumbnail_url('large'); ?>" alt="<?= the_title(); ?>">
                            <small class="article-time"><i class="far fa-clock"></i> <?= get_the_date('d/m/Y') ?></small>
                            <h5 class="article-title"><?= the_title() ?></h5>
                            <p class="article-excerpt"><?= get_the_excerpt() ?></p>
                            <div class="article-divider"></div>
                            <a class="article-link" href="<?= get_the_permalink() ?>">Saiba mais &raquo;</a>
                        </article>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo "<div class='col-12 border bg-light rounded p-3 h-100 text-center'>Você ainda não possui posts para exibir.</div>";
            endif;
            ?>

        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="<?= home_url('noticias') ?>" class="btn btn-light">Ver notícias anteriores<i class="fas fa-undo ml-2"></i></a>
            </div>
        </div>
    </div>
</section>

<section id="partners" class="py-5">
    <div class="container">
        <div class="row mb-4 mb-lg-0">
            <div class="col-12 text-center">
                <h2 class="text-muted">Empresas parceiras</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <?php
            // Custom WP query query
            $args_query = array(
                'post_type' => 'parceiros',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'date',
            );

            $query = new WP_Query($args_query);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>
                    <div class="col-4 col-lg-2">
                        <div class="text-center">
                            <a href="<?= the_field('website') ?>" class="partner-item">
                                <img src="<?= the_field('logomarca') ?>" style="width: 100%;height:auto;">
                            </a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo "<div class='col-12 border bg-light rounded p-3 h-100 text-center'>Você ainda não possui parceiros cadastrados para exibir.</div>";
            endif;
            ?>
        </div>
    </div>
</section>

<?php  #get_template_part('template-parts/template', 'testimonials'); 
?>

<?php get_footer(); ?>