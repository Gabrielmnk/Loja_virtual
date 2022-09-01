<?php
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');


//Titulo da página\
$page_title = "Login/Entrar";



//action do form
$action = htmlspecialchars($_SERVER["PHP_SELF"]);

//Variável de conteúdo
$page_content = "";


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

                        <button type="submit" class="btn btn-lg text-white" style="background-color: #8B4513;">Entrar</button>

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

        else :
            echo '<p>oi</p>';

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

<script>
    /**
     * JavaScript desta página
     */

    // Captura div com mensagem de erro → class="feedback_error":
    let alert = document.getElementsByClassName('alert');

    // Se encontrou a div...
    if(alert.length != 0) {

        // Oculta mensagem de erro após 5 segundos (5000 milissegundos):
         setTimeout(() => { alert[0].style.display = 'none'; }, 5000);
 
    }

    // Previne o reenvio do formulário ao recarregar a página:
    if ( window.history.replaceState )
        window.history.replaceState( null, null, window.location.href );

</script>

HTML;

//inclui rodapé da página
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
