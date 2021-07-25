<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col text-center">
            <h1>Empresas Associadas</h1>
            <p>Aqui você encontra todas as empresas de vistoria credenciadas associadas à Acevive em todo o Estado do Espírito Santo.</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="row">
            <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args_query = array(
                    'paged' => $paged,
                    'post_type' => array('associados'),
                    'posts_per_page' => 10,
                    'order' => 'ASC',
                    'meta_key' => 'cidade',
                    'orderby' => 'meta_value'
                );
                $query = new WP_Query( $args_query );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) :
                        $query->the_post();

                    ?>
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="h-100 border p-2 text-center">
                            <img src="<?=the_field('logomarca')?>" style="width: 25%;">
                            <h3><?=the_field('empresa')?></h3>
                            <p><?=the_field('endereco')?>, <?=the_field('cidade')?> / <?=the_field('estado')?></p>
                            <h5><?=the_field('telefone_fixo')?> • 
                            <?=the_field('telefone_movel')?></h5>
                            <a href="https://wa.me/<?=the_field('whatsapp')?>" class="btn btn-success"><i class="fab fa-whatsapp fa-lg mr-2"></i>Chamar no Whatsapp</a>
                            <ul class="list-inline text-center my-3">
                                <?php echo (get_field('website') !== '') ? "<li class='list-inline-item'><a href='" . get_field('website') . "'><i class='fas fa-globe fa-lg fa-fw'></i></a></li>" : ""; ?>
                                <?php echo (get_field('email') !== '') ? "<li class='list-inline-item'><a href='mailto:" . get_field('email') . "'><i class='fas fa-envelope fa-lg fa-fw'></i></a></li>" : ""; ?>
                                <?php echo (get_field('facebook') !== '') ? "<li class='list-inline-item'><a href='https://facebook.com/" . get_field('facebook') . "'><i class='fab fa-facebook-square fa-lg fa-fw'></i></a></li>" : ""; ?>
                                <?php echo (get_field('instagram') !== '') ? "<li class='list-inline-item'><a href='https://instagram.com/" . get_field('instagram') . "'><i class='fab fa-instagram fa-lg fa-fw'></i></a></li>" : ""; ?>
                            </ul>
                            <?=the_field('mapa')?>
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
                        <!-- </div> -->
                    <?php
                    
                    wp_reset_postdata();
                endif;
            ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>