<?php get_header(); ?>

<div class="container mb-5 ">

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

    <div class="row">
        <main class="col-12 col-lg-8 mb-4">

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>

                    <div class="row mb-3">
                        <div class="col">
                            <?= edit_post_link('<i class="far fa-edit mr-2"></i>Editar este post', '', '', 0, 'btn btn-sm btn-light') ?>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col">
                            <div class="post-categories"><?= the_category(' ') ?></div>
                            <h1 style="font-size:2rem;margin-bottom:1rem;"><?= the_title() ?></h1>
                            <?php
                            if (!is_page()) :
                            ?>
                                <h5 style="font-size:1.1rem;margin-bottom:1rem;" class='text-muted'><?= get_the_excerpt() ?></h5>
                                <p style="font-size:.9rem;"><i class="far fa-clock mr-1"></i>Publicado em: <?= get_the_date("d/m/Y") ?></p>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>

                    <?php
                    if (is_single()) :
                    ?>
                        <div class="row mb-4">
                            <div class="col">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a title="Compartilhe no Facebook" class="social-media-links" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"><i class="fab fa-lg fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title="Compartilhe no Twitter" class="social-media-links" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink()) ?>"><i class="fab fa-lg fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a title="Compartilhe no Linkedin" class="social-media-links" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(get_permalink()) ?>"><i class="fab fa-lg fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a title="Compartilhe no Pinterest" class="social-media-links" href="https://pinterest.com/pin/create/button/?url=<?= urlencode(get_permalink()) ?>"><i class="fab fa-lg fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a title="Compartilhe pelo Whatsapp" class="social-media-links" href="https://api.whatsapp.com/send?text=<?= urlencode("Veja esta publicação: " . get_permalink()) ?>"><i class="fab fa-lg fa-whatsapp"></i></a></li>
                                    <li class="list-inline-item"><a title="Imprimir" class="social-media-links" href="javascript:void(0);" onclick="window.print()"><i class="fas fa-lg fa-print"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>

                    <div class="row">
                        <div class="col singular-artigo">
                            <?= the_content() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col singular-tag-list">
                            <?= the_tags('<i class="fas fa-hashtag fa-lg mr-2"></i>', ' ') ?>
                        </div>
                    </div>

                    <?php if (!is_page()): ?>
                    <!-- Author card -->
                    <div class="row mt-4">
                        <div class="col">
                            <p style="font-family:'Montserrat',sans-serif; font-size:1.25rem;margin-bottom:.5rem;"><i class="fas fa-user-edit mr-2"></i>O Autor desta matéria</p>
                            <div class="single-author-card">
                                <div class="author-card__avatar">
                                    <img src="<?= get_avatar_url(get_the_author_meta('user_email')) ?>" title="<?= get_the_author_meta('display_name') ?>" alt="<?= get_the_author_meta('display_name') ?>">
                                </div>
                                <div class="author-card__body">
                                    <p class="author-card__title"><?= get_the_author_meta('display_name') ?></p>
                                    <a href="<?= get_the_author_meta('user_url') ?>" class="author-card__link" title="Entre em contato com <?= get_the_author_meta('display_name') ?>"><i class="far fa-comment-alt mr-2"></i>Entre em contato</a>
                                    <p class="author-card__bio"><?= get_the_author_meta('description') ?></p>
                                    <p class="author-card__social"><i class="far fa-heart mr-1"></i>Siga-nos no <a href="https://facebook.com/acevive.vix">Facebook</a> e no <a href="https://instagram.com/acevive.vix">Instagram</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <!-- Banner Ads Patrocinadores -->
            <div class="row my-4">
                <div class="col d-flex justify-content-center">
                    <?php
                    $args = array(
                        'post_type' => 'anuncios',
                        'orderby' => 'rand',
                        'posts_per_page' => 1,
                        'ignore_sticky_posts' => 1,
                    );
                    $relacionados = new WP_Query($args);
                    if ($relacionados->have_posts()) :
                        while ($relacionados->have_posts()) :
                            $relacionados->the_post();
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

            <div class="row mt-5 mb-4">
                <div class="col">
                    <h4><i class="far fa-lightbulb mr-2"></i>Você também pode gostar:</h4>
                </div>
            </div>

            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'rand',
                    'posts_per_page' => 2,
                    'ignore_sticky_posts' => 1,
                );
                $relacionados = new WP_Query($args);
                if ($relacionados->have_posts()) :
                    while ($relacionados->have_posts()) :
                        $relacionados->the_post();
                ?>
                        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                            <div class="article-card border p-3 h-100 d-flex flex-column bg-white shadow position-relative">
                                <span class="article-category"><?= the_category(' ') ?></span>
                                <img class="article-cover" src="<?= the_post_thumbnail_url('large'); ?>" alt="<?= the_title(); ?>">
                                <small class="article-time"><i class="far fa-clock"></i> <?= get_the_date('d/m/Y') ?></small>
                                <h5 class="article-title"><?= the_title() ?></h5>
                                <p class="article-excerpt"><?= get_the_excerpt() ?></p>
                                <div class="article-divider"></div>
                                <a class="article-link" href="<?= get_the_permalink() ?>">Saiba mais &raquo;</a>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </main>

        <aside class="col-12 col-lg-4">
            <div class="row">
                <div class="col">
                    <h4 class="mb-4"><i class="fas fa-history mr-2"></i>Artigos recentes</h4>
                    <div class="list-group rounded-0">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'ignore_sticky_posts' => 1,
                        );
                        $recentes = new WP_Query($args);
                        if ($recentes->have_posts()) :
                            while ($recentes->have_posts()) :
                                $recentes->the_post();
                        ?>
                                <a href="<?= get_the_permalink() ?>" class="list-group-item list-group-item-action">
                                    <p style="font-size:.7rem;margin:.25rem;color:#16a085;"><i class="fas fa-clock mr-1"></i><?= the_date('d/m/Y') ?> • <span class="text-uppercase"><?= (get_the_category()[0]->name == 'premium') ? get_the_category()[0]->name . "<i class='fas fa-star ml-1'></i>" : get_the_category()[0]->name ?></span></p>
                                    <h5 style="font-size: .9rem;"><?= the_title() ?></h5>
                                    <p style="font-size:.75rem;margin:0;line-height:1rem;"><?= get_the_excerpt() ?></p>
                                </a>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

<?php get_footer(); ?>