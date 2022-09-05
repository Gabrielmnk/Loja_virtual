<?php
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

$page_title = 'Página modelo';


//formulário de cadastro

$html_form = <<<HTML
 <div class="container">
                <h1>Informe seus dados, por favor</h1>
                <hr>
                <form class="mt-3" action="index.php" method="post">
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
                                <div class="mb-3 col-md-6 col-lg-8 align-self-end">
                                    <textarea class="form-control text-muted bg-light"
                                        style="height: 58px; font-size: 14px;"
                                        disabled>Digite o CEP para buscarmos o endereço.</textarea>
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
                                    <input class="form-control" type="password" id="txtConfirmacaoSenha" name="password" value="12345_Qwerty"placeholder=" " />
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
                            onclick="window.location.href='/confirmarcadastro.html'" />
                    </div>
                </form>
            </div>
HTML;

//Código php desta página

if ($_SERVER['REQUEST_METHOD'] == 'POST') :

    print_r($_POST);


















endif;






// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');

echo <<<HTML
$html_form;
HTML;

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
