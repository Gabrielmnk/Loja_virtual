<?php
$user_type = "";
if (!empty($user)) :
    $user_type = $user['type'];
endif;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/estilos.css">

    <title><?php echo $site_name ?> :: <?php echo $page_title ?></title>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <div class="logo"><img src="<?php echo $site_logo ?>"></div>
                </a>
                <a class="navbar-brand" href="/"> <b><?php echo $site_name ?></b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/index.html">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/contato.html">Contato</a>
                        </li>
                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <?php
                            // Se o usuário está logado...
                            if ($user_type == 'user') :
                            ?>
                                <li class="nav-item">

                                    <!-- Example split danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark"><?php echo $user['name'] ?></button>
                                        <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                                            <li><a class="dropdown-item" href="#">Meus Pedidos</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="/logout">Sair</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php
                            // se o usuário for um admin...
                            elseif ($user_type == 'admin') :
                            ?> <li class="nav-item">
                                    <a href="/" class="nav-link text-white"><b><?php echo $user['name'] ?></b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/add_product" class="nav-link text-white">Adicionar Produto</a>
                                </li>
                            <?php
                            // Se não tem usuário logado...
                            else :
                            ?> <li class="nav-item">
                                    <a href="/register" class="nav-link text-white">Cadastre-se</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/login" class="nav-link text-white">Entrar</a>
                                </li>
                            <?php
                            endif;
                            ?> <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-dark position-absolute ms-4 mt-0" title="0 produto(s) no carrinho"><small>0</small></span>
                                <a href="/carrinho.html" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        <main class="flex-fill">