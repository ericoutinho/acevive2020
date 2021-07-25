<?php

if (!function_exists('oneoneTimeFunctionMaps')) {

    function oneTimeFunctionMaps()
    {
        $args = array(
            'numberposts' => -1,
            'post_status' => 'publish',
            'post_type'   => 'associados',
        );
        $associados = get_posts($args);

        if (!$associados) {
            wp_die("Não foram encontrados resgistros nestes termos.", "Nenhum 'Associado' encontrado!");
        }
    
        foreach ($associados as $a) {
            $data = get_post_meta($a->ID, 'mapa', true);
    
            $pb_pattern = "/^(?:.+pb\=)([^\"]+)(?:\".+)$/";
            $m_pattern = "/\{([a-z0-9]*)\}/";
    
            if (!preg_match($pb_pattern, $data)) {
                echo "<script>alert('Not Match criteria PB')</script>";
                exit();
            }
            $pb = preg_replace($pb_pattern, "$1", $data);

            if (!preg_match($m_pattern, $pb)) {
                echo "<script>alert('Not Match criteria M')</script>";
                exit();
            }
            $m = preg_replace($m_pattern, "%", $pb);
    
            if (update_post_meta($a->ID, 'mapa', $m)) {
                echo $a->post_title . " 👍 OK <br/>\n";
            } else {
                echo "Nada foi alterado. <br/>\n";
            }
    
        }
    }

    oneTimeFunctionMaps();
}

