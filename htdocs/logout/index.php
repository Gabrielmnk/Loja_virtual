<?php
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

// Se usuário não está logado envia usuário para login:
if (!$user) :
    header('Location: /login');

else :
    // Apaga o cookie do usuário:
    setcookie("cookie", '', -1, '/');

    // Redireciona para página inicial:
    header('Location: /');

endif;
