<?php
// Inicializa a sess�o.
session_start();

// Apaga todas as vari�veis da sess�o
$_SESSION = array();

// Se � preciso matar a sess�o, ent�o os cookies de sess�o tamb�m devem ser apagados.
// Nota: Isto destruir� a sess�o, e n�o apenas os dados!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Por �ltimo, destr�i a sess�o
session_destroy();

// Redireciona para a p�gina de login
header('Location:index.php');
