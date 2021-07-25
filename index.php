<?php get_header(); ?>
<div class="container mb-5 px-auto px-lg-5">

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

    <?php
    if (get_search_query()) :
    ?>
        <div class="row mb-2">
            <div class="col">
                <h5><i class="fas fa-search-plus mr-2"></i>Você está buscando por: <span style="color: #e67e22;"><?= get_search_query() ?></span></h5>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mb-5">
        <div class="col">
            <form action="" method="GET">
                <input type="hidden" name="post-type" value="post">
                <div class="form-row">
                    <div class="col-7 col-lg">
                        <input type="search" class="form-control form-control-sm mr-1" id="s" name="s" placeholder="Buscar artigo" value="<?= the_search_query(); ?>" required>
                    </div>
                    <div class="col-5 col-lg">
                        <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr-2"></i>Buscar artigos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <div class="row mb-4">
                <div class="col-12 col-lg-4">
                    <img src="<?= get_the_post_thumbnail_url(null, 'large') ?>" class="border mb-3 mb-lg-0" style="width:100%; height:auto;">
                </div>
                <div class="col-12 col-lg-8">
                    <small>
                        <i class="far fa-clock mr-1" style="color:#444;"></i><?= get_the_date('d/m/Y') ?>
                        <span class="news-category"><?= the_category(' ') ?></span>
                    </small>
                    <h4 class="mt-2" style="font-size:clamp(1rem, 1.5vw, 2.25rem);"><?= get_the_title() ?></h4>
                    <p class="mb-0" style="font-size:clamp(.85rem, 1vw, 1rem);"><?= get_the_excerpt() ?></p>
                    <a href="<?= the_permalink() ?>" class="stretched-link" style='font-size:.85rem'>Ver o artigo completo</a>
                </div>
            </div>
        <?php
        endwhile;
        ?>
        <div class='row mt-5'>
            <div class="col text-left">
                <?= previous_posts_link() ?>
            </div>
            <div class="col text-right">
                <?= next_posts_link() ?>
            </div>
        <?php
        wp_reset_postdata();
    endif;
        ?>
        </div>
</div>


<?php get_footer(); ?>