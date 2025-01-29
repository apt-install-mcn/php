<?php
function authenticate() {
    $users = array("admin" => "password123");

    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Texto para enviar si el usuario presiona el botón Cancelar';
        exit;
    } else {
        if (!array_key_exists($_SERVER['PHP_AUTH_USER'], $users) || $users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW']) {
            header('HTTP/1.0 401 Unauthorized');
            echo 'Credenciales incorrectas';
            exit;
        }
    }
}
?>
