<?php

function formEnquete($atts = array()) {

    // Valores default
    // nomes em lower case
    extract(shortcode_atts(array(
        'answer' => 'Choose one option',
        'labela' => 'SIM',
        'labelb' => 'NÃO',
        'post_id' => get_the_ID(),
        'show_results' => false
       ), $atts));

    if ($show_results) {

    }

    $ajax_url = admin_url('');

    $html;
    $html .= "<div class='border bg-light rounded shadow-sm p-4 my-4'>";
    $html .= "<form method='POST' action='{$ajax_url}' id='form-pesquisa'>";
    $html .= "<input type='hidden' name='post' value='{$post_id}'>";
    $html .= "<h3 class='mb-2'><i class='fas fa-clipboard-list mr-2'></i>Pesquisa:</h3>";
    $html .= "<p class='mb-3'>{$answer}</p>";

    $html .= "<div class='row mb-2'>\n";
    $html .= "<div class='col'>\n";
    $html .= "\t<div class='custom-control custom-radio'>\n";
    $html .= "\t\t<input style='cursor:pointer;' type='radio' class='custom-control-input' name='choose' id='option-a' value='A'>\n";
    $html .= "\t\t<label style='cursor:pointer;' class='custom-control-label user-select-none' for='option-a' spellcheck='false'>{$labela}</label>\n";
    $html .= "\t</div>\n";
    $html .= "</div>\n";
    $html .= "</div>\n";

    $html .= "<div class='row'>\n";
    $html .= "<div class='col'>\n";
    $html .= "\t<div class='custom-control custom-radio'>\n";
    $html .= "\t\t<input style='cursor:pointer;' type='radio' class='custom-control-input' name='choose' id='option-b' value='B'>\n";
    $html .= "\t\t<label style='cursor:pointer;' class='custom-control-label user-select-none' for='option-b' spellcheck='false'>{$labelb}</label>\n";
    $html .= "\t</div>\n";
    $html .= "</div>\n";
    $html .= "</div>\n";

    $html .= "<hr/>";
    $html .= "<p class='mb-0'><button type='submit' class='btn btn-outline-success' id='button-pesquisa'><i class='fas fa-check mr-2'></i>Enviar meu voto</button> <button type='reset' class='btn btn-secondary'><i class='fas fa-times mr-2'></i>Cancelar</button></p>";
    $html .= "</form>";
    $html .= "</div>";

    return $html;
}

add_shortcode('form-enquete', 'formEnquete');