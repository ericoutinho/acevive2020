<?php get_header(); ?>

<div class="container mb-5">

    <!-- Banner Ads Patrocinadores -->
    <div class="row mt-4 mb-5">
        <div class="col d-flex justify-content-center">
            <?php
            $args = array(
                'post_type' => 'anuncios',
                'orderby' => 'rand',
                'posts_per_page' => 1,
                'ignore_sticky_posts' => 1,
            );
            $ads = new WP_Query($args);
            if ($ads->have_posts()) :
                while ($ads->have_posts()) :
                    $ads->the_post();
            ?>
                    <?= get_the_content() ?>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
    <!-- Fim de Banner Ads -->

    <div class="row mb-4">
        <div class="col">
            <h1><i class="far fa-handshake"></i> Empresas Associadas</h1>
            <p>Relacionamos as empresas de vistoria veicular credenciadas ao Detran/ES e filiadas à Acevive em todo o Estado do Espírito Santo separadas por cidade. Escolha a mais próxima de você e realize sua vistoria hoje mesmo.</p>
        </div>
    </div>

    <?php
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

    $qcidade;
    if (isset($_GET['cidade'])) {
        $qcidade = filter_input(INPUT_GET, 'cidade');
    }

    ?>
    <form action="<?= home_url('/'); ?>" method="get" role="search">
        <div class="form-row">
            <div class="form-group col-12 col-lg-4">
                <label for="sort-cidade"><i class="fas fa-map-marker-alt mr-2"></i>Cidade</label>
                <select name="cidade" id="js-associados-cidade" class="form-control form-control-sm">
                    <option value="">Todas as cidades</option>
                    <?php
                    foreach ($cidades as $option) {
                        $selected = ($option == $qcidade) ? 'selected' : '';
                        echo "<option value='{$option}' {$selected}>{$option}</option>\n";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-12 col-lg-5">
                <label for="s"><i class="fas fa-search mr-2"></i>Nome da ECV</label>
                <div class="input-group mb-3">
                    <input type="search" class="form-control form-control-sm" name="s" id="s" value="<?= the_search_query() ?>" placeholder="Buscar ECV">
                    <input type="hidden" name="post_type" value="associados">
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn-sm" type="submit" id="submit">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col-12">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args_query = array(
                's' => get_query_var('s'),
                'paged' => $paged,
                'post_type' => 'associados',
                'posts_per_page' => 10,
                'meta_key' => 'cidade',
                'meta_value' => $qcidade,
                'orderby' => array('meta_value' => 'ASC', 'title' => 'ASC')
            );

            $query = new WP_Query($args_query);

            if ($query->have_posts()) :
            ?>
                <div class="row">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="h-100 border px-2 py-3 text-center bg-white shadow-sm">
                                <?= edit_post_link('<i class="far fa-edit mr-2"></i>Editar este post','','',0,'btn btn-sm btn-light') ?>
                                <h4 class="mb-2"><?= the_field('empresa') ?></h4>
                                <p class="mb-2" style="font-size:.9rem;"><i class="fas fa-map-marker-alt mr-2"></i><?= the_field('endereco') ?><br /><?= the_field('cidade') ?>/<?= the_field('estado') ?></p>
                                <h5 class="mb-2"><i class="fas fa-phone mr-2"></i><?= the_field('telefone_fixo') ?> • <i class="fas fa-mobile-alt mr-2"></i><?= the_field('telefone_movel') ?></h5>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= the_field('whatsapp') ?>&text=Olá! estive no site da ACEVIVE e fui direcionado para o seu contato. Como posso agendar minha vistoria?" class="btn btn-light"><i class="fab fa-whatsapp fa-lg mr-2"></i>Chamar no Whatsapp</a>
                                <ul class="list-inline text-center my-3 border-top pt-2">
                                    <?php echo (get_field('website') !== '') ? "<li class='list-inline-item'><a href='" . get_field('website') . "'><i class='fas fa-globe fa-lg fa-fw'></i></a></li>" : ""; ?>
                                    <?php echo (get_field('email') !== '') ? "<li class='list-inline-item'><a href='mailto:" . get_field('email') . "'><i class='fas fa-envelope fa-lg fa-fw'></i></a></li>" : ""; ?>
                                    <?php echo (get_field('facebook') !== '') ? "<li class='list-inline-item'><a href='https://facebook.com/" . get_field('facebook') . "'><i class='fab fa-facebook-square fa-lg fa-fw'></i></a></li>" : ""; ?>
                                    <?php echo (get_field('instagram') !== '') ? "<li class='list-inline-item'><a href='https://instagram.com/" . get_field('instagram') . "'><i class='fab fa-instagram fa-lg fa-fw'></i></a></li>" : ""; ?>
                                </ul>
                                <iframe src="https://www.google.com/maps/embed?pb=<?= get_field('mapa') ?>" width="100%" height="300" frameborder="0" loadind="lazy" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                        
                    <?php
                    endwhile;
                    ?>
                </div>
                <div class="row">
                    <div class="col-6 text-left">
                        <?php previous_posts_link(); ?>
                    </div>
                    <div class="col-6 text-right">
                        <?php next_posts_link(); ?>
                    </div>
                </div>
            <?php
                wp_reset_postdata();
            else :
            ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert"><i class="fas fa-lg fa-info-circle mr-2"></i>Não foram encontradas <strong>Empresas Associadas</strong>. Verifique os dados informados.</div>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>