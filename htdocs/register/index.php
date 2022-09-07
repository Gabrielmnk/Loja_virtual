<?php
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

// Se o usuário já está logado, envia ele para o perfil:
if ($user) header('Location: /');

$page_title = 'Cadastre-se';

//action do form
$action = htmlspecialchars($_SERVER["PHP_SELF"]);


//variável de conteudo
$page_content = "";

//formulário de cadastro

$html_form = <<<HTML
 <div class="container">
                <h1>Informe seus dados, por favor</h1>
                <hr>
                <form class="mt-3" action="{$action}" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Dados Pessoais</legend>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="name" id="name" value="Patolino da Silva"placeholder=" " autofocus />
                                    <label for="txtNome">Nome</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="text" name="cpf" id="cpf" value="999-999-999-99" placeholder=" " />
                                    <label for="txtCPF">CPF</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="date" name="date" id="txtDataNascimento" placeholder=" " />
                                    <label for="txtDataNascimento" class="d-inline d-sm-none d-md-inline d-lg-none">Data
                                        Nascimento</label>
                                    <label for="txtDataNascimento" class="d-none d-sm-inline d-md-none d-lg-inline">Data
                                        de Nascimento</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Contatos</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" name="email" type="email" id="txtEmail" value="patotop@gemeio.com" placeholder=" " />
                                    <label for="txtEmail">E-mail</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " type="text" name="phone" value="2199878983" id="txtTelefone" />
                                    <label for="txtTelefone">Telefone</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Endereço</legend>
                                <div class="form-floating mb-3 col-md-6 col-lg-4">
                                    <input class="form-control" type="text" name="zip_code" id="txtCEP" value="99999-999" placeholder=" " />
                                    <label for="txtCEP">CEP</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-lg-8 align-self-end">
                                    <input class="form-control" type="text" name="address" id="txtAddress" value="Rua na Verdade" placeholder=" " />
                                    <label for="txtEndereco">Endereco</label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-floating mb-3 col-md-4">
                                    <input class="form-control" type="text" name="housenbr" id="txtNumero" value="00" placeholder=" " />
                                    <label for="txtNumero">Número</label>
                                </div>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="complement" id="txtComplemento" value="APTO" placeholder=" " />
                                    <label for="txtComplemento">Complemento</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="reference" id="txtReferencia" value="rua do açougue" placeholder=" " />
                                    <label for="txtReferencia">Referência</label>
                                </div>
                            </fieldset>
                            <fieldset class="row gx-3">
                                <legend>Senha de Acesso</legend>
                                <small>
                                Entre 7 e 25 caracteres.<br>
                                Pelo menos uma letra minúscula.<br>
                                Pelo menos uma letra maiúscula.<br>
                                Pelo menos um número.<br>
                                </small>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" type="password" name="password" id="txtSenha" value="12345_Qwerty" placeholder=" " />
                                    <label for="txtSenha">Senha</label>
                                </div>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" type="password" id="txtConfirmacaoSenha" name="confirmpassword" value="12345_Qwerty"placeholder=" " />
                                    <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr />
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Desejo receber informações sobre promoções.
                        </label>
                    </div>
                    <div class="mb-3 text-left">
                        <a class="btn btn-lg btn-light btn-outline-dark" href="/">Cancelar</a>
                        <input type="submit" value="Criar meu cadastro" class="btn btn-lg btn-dark"
                            />
                    </div>
                </form>
            </div>
HTML;

//Código php desta página

//se o formulário foi enviado...
if ($_SERVER['REQUEST_METHOD'] == 'POST') :

    // armazenas os dados do formulário em variáveis
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $zip_code = $_POST['zip_code'];
    $address = $_POST['address'];
    $housenbr = $_POST['housenbr'];
    $complement = $_POST['complement'];
    $reference = $_POST['reference'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    //se tem campos vazios...
    if (
        empty($name) or empty($cpf) or empty($email) or empty($phone) or empty($date) or
        empty($zip_code) or empty($address) or empty($housenbr) or empty($complement) or empty($reference) or
        empty($password) or empty($confirmpassword)
    ) :
        $page_content .= <<<HTML

    <div class="alert alert-danger text-center col-lg-5 col-sm-8 col-md-6 mx-auto" role="alert">
      Um ou mais campos vazios<br>
      Por favor, preencha todos os campos e tente novamente.
    </div>
        
        {$html_form}

HTML;

    // Se a senha é Inválida...
    elseif (!preg_match($rgpass, $password)) :


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

    //Se a senha escolhida é diferente da confirmação...
    elseif ($password != $confirmpassword) :
        $page_content .= <<<HTML

    <div class="alert alert-danger text-center col-lg-5 col-sm-8 col-md-6 mx-auto" role="alert">
    <p>As Senhas não coincidem</p>
      <p>Por favor, tente novamente.</p>
    </div>
    
    {$html_form}
    
    HTML;

    endif;

else :

    $page_content .= $html_form;

endif;






// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');

echo <<<HTML
{$page_content}
HTML;

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
