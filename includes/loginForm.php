<?php
    // ob_start();

    function loginForm() {

        $loginCustomError = '';

        $html = ($loginCustomError) ? "<div class='px-3 py-2 alert alert-danger mb-2'>{$loginCustomError}</div>" : "";
        $html .= "<div class='bg-light border rounded p-4'>";

        $html .= "<form method='POST' action='' class='needs-validation' novalidate>";

        $html .= "\t<div class='row'>\n";
        $html .= "\t\t<div class='col form-group'>\n";
        $html .= "\t\t\t<label for='username'>Usuário</label>\n";
        $html .= "\t\t\t<input type='text' class='form-control' name='username' id='username' placeholder='Nome de usuário'>\n";
        $html .= "\t\t</div>\n";
        $html .= "\t</div>\n";

        $html .= "\t<div class='row'>\n";
        $html .= "\t\t<div class='col form-group'>\n";
        $html .= "\t\t\t<label for='password'>Password</label>\n";
        $html .= "\t\t\t<input type='password' class='form-control' name='password' id='password' placeholder='Password'>\n";
        $html .= "\t\t</div>\n";
        $html .= "\t</div>\n";

        $html .= "\t<div class='row'>\n";
        $html .= "\t\t<div class='col form-group text-center'>\n";
        $html .= "\t\t\t<a href='".home_url()."' class='btn btn-outline-secondary'>Cancelar</a>\n";
        $html .= "\t\t\t<button type='submit' class='btn btn-primary' name='login_submited'><i class='fas fa-check mr-2'></i>Entrar</button>\n";
        $html .= "\t\t</div>\n";
        $html .= "\t</div>\n";

        $html .= "\t<div class='row'>\n";
        $html .= "\t\t<div class='col form-group text-center mb-0'>\n";
        $html .= "\t\t\t<a href='".home_url()."'>Esqueceu a senha?</a>\n";
        $html .= "\t\t</div>\n";
        $html .= "\t</div>\n";

        $html .= "</form>";

        $html .= "</div>";

        return $html;

    }

    add_shortcode('login-form', 'loginForm');