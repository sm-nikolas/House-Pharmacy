<?php
    include './conexao.php';
    $usuario     = $_POST["usuario"];
    $senhaPri    = $_POST["senha"];
    $confSenha   = $_POST["cSenha"];
    $cpfCliente  = $_POST["cpfCliente"];
    $nomeCliente = $_POST["nomeCliente"];
    $cep         = $_POST["cep"];
    $numeroResi  = $_POST["numeroResi"];
    $tipo = 0;
    $messageSenha ="As senhas não conferem. Por favor, tente novamente.";

    $senha = md5($senhaPri);
    $cSenha = md5($confSenha);
 
    if(!empty($usuario) && !empty($senha) && !empty($cSenha)){
        if($senha == $cSenha){
            $sql = "INSERT INTO cliente(nomeCliente, cpf, cep, numeroResi, usuario, senha, tipo) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssissi",$nomeCliente,$cpfCliente,$cep,$numeroResi,$usuario,$senha,$tipo);
            if(!$stmt->execute()){
                $erro = $stmt->error;
                $erro1 = $stmt1->error;
                echo $erro;
            }else{
                header("Location: ../index.php");
                exit;
            }
        }else{
?>            
            <!DOCTYPE html>
            <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <title>House Pharmacy - Cadastro</title>
                    <link rel="shortcut icon" href="img/icone.png">  
                    <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                    <script src="js/cadastro.js"></script>
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                </head>
                <body id="fundo">
                    <div id="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                    <div id=form>
                                        <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>
            
                                        <br><br><br><br>
                                        
                                        <div class="dados">
                                            <form id="formulario1" method="POST" action="passaCadastro.php">
                                            <div>
                                                <input type="text" id="nomeCliente" name="nomeCliente" onkeypress="return somente_letras(this);" required>
                                                <label>Nome</label>
                                            </div>
                                            <div>
                                                <input type="text" required onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpfCliente" onblur="isValidCPF(this.value);">
                                                <label>CPF</label>
                                                <p id="informaCPF" class="informa"></p>
                                            </div>
                                            <hr class="h-2 hr">
                                            <br>
                                            
                                            <div>
                                                <input type="text" name="cep" id="cep" value="" onkeypress="$(this).mask('99999-999');" onblur="pesquisacep(this.value);" required>
                                                <label>CEP</label>
                                                <p id="informaCEP" class="informa"></p>
                                            </div>
                                            <div class="row">    
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                    <input id="rua" type="text" name="rua" required>
                                                    <label class="cep">Endereço</label>
                                                </div>    
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                    <input id="numeroResi" name="numeroResi" type="number" required>
                                                    <label class="cep">Número</label>
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                        <input id="bairro" type="text" required/>       
                                                        <label class="cep">Bairro</label>
                                                    </div>
                                                    <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                        <input id="cidade" type="text" required/>
                                                        <label class="cep">Cidade</label>
                                                    </div>    
                                                </div>
                                                <br>
                                                <div>
                                                    <input type="text" id="usuario1" name="usuario" onkeypress="return formata_User(this)" required>
                                                    <label>Usuário</label>
                                                </div>
                                                
                                                <div>
                                                    <input type="password" id="senha1" name="senha" required>
                                                    <label>Senha</label>
                                                </div>
                                                <div>    
                                                    <input type="password" id="cSenha1" name="cSenha" required>
                                                    <label>confirme sua senha</label>
                                                    <p class="message" style="color: red"><?php if($messageSenha!="") { echo $messageSenha; } ?></p>	
                                                </div>
                                                <div>
                                                    <br><br>
                                                    <input type="submit" class="btn btn-success" value="Cadastrar-se" id="cadastrar1" name="cadastrar">
                                            </form>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </body>
            </html>
<?php            
        }
    }
    if(isset($_SESSION['usuario'])) {
        header("Location:../paginas/homepage.php");
    }
?>