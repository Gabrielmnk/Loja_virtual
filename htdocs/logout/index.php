<?php
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');




//Titulo da página\
$page_title = "Logout";

//Variável de conteúdo
$page_content = "";


// Se usuário não está logado envia usuário para login:
if (!$user) header('Location: /login');












//action do form
$action = htmlspecialchars($_SERVER["PHP_SELF"]);






//inclui cabeçalho da página
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');


//exibe o conteúdo da página
echo <<<HTML

{$page_content}


HTML;

//inclui rodapé da página
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
