<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col">
            <h1>Empresas parceiras</h1>
            <p>Somente os associados da Acevive podem contar com uma <strong>parceria realizada entre a associação e várias empresas de serviços complementares ao setor</strong>, oferecendo <strong>condições diferenciadas</strong> para seus membros.</p>
        </div>
    </div>

    <div class="row mt-5">
        <?php
            // Custom WP query query
            $args_query = array(
                'post_type' => array('parceiros'),
                'posts_per_page' => -1,
                'nopaging' => true,
                'order' => 'ASC',
                'orderby' => 'meta_value',
                'meta_key' => 'atuacao',
            );

            $query = new WP_Query( $args_query );

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="archive-parceiros-card border rounded p-3 h-100 position-relative d-flex flex-column align-items-center">
                <div class="border bg-light rounded p-2 text-center w-75" style="margin-top: -25px;"><?=the_field('atuacao')?></div>
                <img src="<?=the_field('logomarca')?>" style="width: 50%;" alt="">
                <div class="flex-fill text-center">
                    <h5><?=the_field('empresa')?></h5>
                    <p class='mb-2 text-center'>
                        <?=(get_field('endereco') !== '') ? get_field('endereco')."<br/>" : ""?>
                        <?=the_field('cidade')?> / <?=the_field('estado',false, false)?> | <?=the_field('cep')?>
                    </p>
                    <h5><?=the_field('telefone_fixo')?></h5>
                </div>
                <div class="text-center">
                    <ul class="list-inline text-center my-3">
                        <?php echo (get_field('website') !== '') ? "<li class='list-inline-item'><a href='" . get_field('website') . "'><i class='fas fa-globe fa-lg fa-fw'></i></a></li>" : ""; ?>
                        <?php echo (get_field('email') !== '') ? "<li class='list-inline-item'><a href='mailto:" . get_field('email') . "'><i class='fas fa-envelope fa-lg fa-fw'></i></a></li>" : ""; ?>
                        <?php echo (get_field('facebook') !== '') ? "<li class='list-inline-item'><a href='https://facebook.com/" . get_field('facebook') . "'><i class='fab fa-facebook-square fa-lg fa-fw'></i></a></li>" : ""; ?>
                        <?php echo (get_field('instagram') !== '') ? "<li class='list-inline-item'><a href='https://instagram.com/" . get_field('instagram') . "'><i class='fab fa-instagram fa-lg fa-fw'></i></a></li>" : ""; ?>
                    </ul>
                    <?php
                        if(get_field('whatsapp') !== ''):
                    ?>
                    <a href="https://wa.me/55<?=get_field('whatsapp')?>" class="btn btn-success btn-sm"><i class="fab fa-whatsapp mr-2"></i>Chamar via Whatsapp</a>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <?php
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>