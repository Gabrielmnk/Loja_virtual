<?php
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');


//Titulo da página\
$page_title = "Login / Entrar";


//action do form
$action = htmlspecialchars($_SERVER["PHP_SELF"]);

//Variável de conteúdo
$page_content = "";

// Se o usuário já está logado, envia ele para o perfil:
if ($user) header('Location: /');

// Inicializa variáveis:
$email = '';
$password = '';
$logged = '';

//Template do Formulário
$html_form = <<<HTML

<div class="container">
                <div class="row justify-content-center">
                    <form class="col-sm-10 col-md-8 col-lg-6" action="{$action}" method="post">
                    <h1>Identifique-se, por favor</h1>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" value="joca@silva.com" class="form-control" placeholder=" " autofocus>
                            <label for="txtEmail">E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="password" value="12345_Qwerty" class="form-control" placeholder=" ">
                            <label for="txtSenha">Senha</label>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="logged" id="logged" value="true">
                            <label for="chkLembrar" class="form-check-label">Lembrar de mim</label>
                        </div>

                        <button type="submit" class="btn btn-lg bg-dark text-white">Entrar</button>

                        <p class="mt-3">
                            Ainda não é cadastrado? <a href="/cadastro.html">Clique aqui</a> para se cadastrar.
                        </p>

                        <p class="mt-3">
                            Esqueceu sua senha? <a href="/recuperarsenha.html">Clique aqui</a> para recuperá-la.
                        </p>
                    </form>
                </div>
            </div>

HTML;



//se o formulário foi enviado...
if ($_SERVER['REQUEST_METHOD'] == 'POST') :

    // Processar campos usando a função post_clean() que criamos em "/_config.php":
    $email = post_clean('email', 'email');
    $password = post_clean('password', 'string');
    $logged = isset($_POST['logged']) ? 'true' : 'false';


    // Se tem campos vazios...
    if ($email == '' or $password == '') :

        // Exibe informação de erro e o formulário novamente:
        $page_content .= <<<HTML

<div class="alert alert-danger text-center col-lg-5 col-sm-8 col-md-6 mx-auto" role="alert">
  Um ou mais campos vazios<br>
  Por favor, preencha todos os campos e tente novamente.
</div>
    
    {$html_form}
HTML;

    // Se a senha é Inválida...
    elseif (!preg_match($rgpass, $password)) :

        // Exibe informação de erro e o formulário novamente:
        $page_content .= <<<HTML

<div class="alert alert-danger text-center col-lg-5 col-sm-8 col-md-6 mx-auto" role="alert">
<p>A senha digitada é inválida, porque deve ter o seguinte formato:</p>
<small> Entre 7 e 25 caracteres.<br>
    Pelo menos uma letra minúscula.<br>
    Pelo menos uma letra maiúscula.<br>
    Pelo menos um número.<br>
</small>
  <p>Por favor, preencha todos os campos e tente novamente.</p>
</div>

{$html_form}

HTML;

    // Se tudo está correto...
    else :

        // Query de consulta ao banco de dados:
        $sql = <<<SQL

SELECT * FROM users 
WHERE
user_email = '{$email}'
AND user_password = SHA1('{$password}')
AND user_status = 'on'

SQL;
        // Executa a query
        $res = $conn->query($sql);

        // Se não achou o usuário...
        if ($res->num_rows != 1) :

            // Exibe mensagem de erro e o formulário novamente:
            $page_content .= <<<HTML

<div class="alert alert-danger text-center col-lg-5 col-sm-8 col-md-6 mx-auto" role="alert">
<p>Usuário e/ou senha incorretos!</p>
  <p>Por favor, preencha todos os campos e tente novamente.</P>
</div>

{$html_form}

HTML;

        // Achei o usuário....
        else :

            // Extrai dados do usuário e armazena em $ck_user[]:
            $ck_user = $res->fetch_assoc();

            // Dados que vão para o cookie ficam em $ck:
            $ck = array(
                'id' => $ck_user['user_id'],
                'name' => $ck_user['user_name'],
                'email' => $ck_user['user_email'],
                'type' => $ck_user['user_type']
            );

            // Se marcou para manter logado...
            if ($logged == 'true') :

                // Gera cookie de 90 dias:
                $ck_validate = time() + (86400 * 90);

            // Se não marcou para manter logado...
            else :

                // Gera cookie de sessão:
                $ck_validate = 0;

            endif;

            // Gera cookie do usuário:
            setcookie("cookie", json_encode($ck), $ck_validate, '/');

            // Extrai o primeiro nome do usuário:
            $fst = explode(' ', $ck_user['user_name'])[0];

            header('location: /');

        endif;

    endif;

else :

    // Exibe o formulário em 
    $page_content .= $html_form;

endif;


//inclui cabeçalho da página
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');


//exibe o conteúdo da página
echo <<<HTML

{$page_content}

<script src="script.js"></script>
HTML;

//inclui rodapé da página
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
