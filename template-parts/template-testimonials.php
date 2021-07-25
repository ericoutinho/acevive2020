<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            // Custom WP query query
            $args_query = array(
                'post_type' => 'testemunhos',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'orderby' => 'date',
            );

            $query = new WP_Query($args_query);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>
                    <div class="col-12 col-lg-4">
                        <div class="testimonials-card border rounded shadow-sm bg-white p-5 text-center mb-4 mx-4 mx-lg-0">
                            <p><?= the_field('testemunho') ?></p>
                            <img src="<?= the_field('avatar') ?>" class="mb-2 rounded-circle border shadow-sm" style="width: clamp(100px, 30%, 200px);">
                            <h5 class="mb-1"><?= the_field('nome') ?></h5>
                            <small class="mb-0 text-muted"><?= the_field('posicao') ?></small>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                echo "<div class='col-12 p-3 bg-light border rounded text-center'>Você ainda não possui testemunhos para este site. <a href='http://127.0.0.1:8080/wp-admin/edit.php?post_type=testemunhos'>Crie um</a></div>";
            endif;
            wp_reset_postdata();
            ?>


        </div>
    </div>
</section>