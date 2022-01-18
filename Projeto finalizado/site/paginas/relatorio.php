<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="img/icone.png"> 
        <script src="js/cadPro.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>House Pharmacy - Página Principal</title>
        
        <!-- css rodapé -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/rodape.css"/>
        

        <!-- css tela -->
        <link rel="stylesheet" href="css/tela.css"/>
        <link rel="stylesheet" href="css/sobre.css"/>
        <link rel="stylesheet" href="css/adm.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body id="fundo">

      <!-- MENU -->
      <nav class="navbar navbar-expand-lg navbar-dark  bg-dark fixed">
        <div class="container">
          <a class="navbar-brand" href="homepageadm.php"><img src="img/logoMenu.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="alterna navegação">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="homepageadm.php">Página Principal<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastrarProdutos.php">Cadastrar Produtos<span class="sr-only"></span></a>
              </li>
            </ul>  
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="gerenciarInfo.php">PDF'S<span class="sr-only"></span></a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <div class="carrinho">
                <div class="compras">
                  <a data-toggle="modal" href="#" data-target="#modalLogin">
                    <ol>
                      <li><img class="car" src="img/iconLogin.png"></li>
                    </ol>
                  </a>
                </div>
              </div>
            </ul>
          </div>   
        </div>   
      </nav>

        <!-- Modal Login/logout --> 

      <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header text-light  bg-dark">
              <h5 class="modal-title" id="TituloModalCentralizado">Logout administrativo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="modal-body bg-dark">
                <footer id="myFooter" class="bg-dark">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                        <a href="../login/logoutAdm.php">
                          <button type="button" class="btn btn-default">Sair</button>
                        </a>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </footer>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <br><br><br><br><br><br><br><br>
      
      <!-- cria tabela -->

    <div class="container">

        <!-- tabela usuário -->
        <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
            <h2 id='oferta'>Cliente</h2><br>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <table class="table table-striped">
                        <tr>
                            <td class='text-success'><strong>ID</strong></td>
                            <td class='text-success'><strong>NOME</strong></td>
                            <td class='text-success'><strong>CPF</strong></td>
                            <td class='text-success'><strong>CEP</strong></td>
                            <td class='text-success'><strong>NÚMERO DA RESIDÊNCIA</strong></td>
                        </tr>
                        <?php
                        include './conexao2.php';
                        $getRequests = mysqli_query($conexao,"SELECT * FROM cliente ORDER BY id_cliente");
                        echo "<h4 id='oferta'>Ordenado por ID</h4><br>";
                        while($aux = $getRequests->fetch_assoc()){
                            echo "<tr>";
                            echo "  <td>".$aux['id_cliente']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['nomeCliente']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['cpf']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['cep']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['numeroResi']."&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="carousel-item">
                    <table class="table table-striped">
                        <tr>
                            <td class='text-success'><strong>NOME</strong></td>
                            <td class='text-success'><strong>ID</strong></td>
                            <td class='text-success'><strong>CPF</strong></td>
                            <td class='text-success'><strong>CEP</strong></td>
                            <td class='text-success'><strong>NÚMERO DA RESIDÊNCIA</strong></td>
                        </tr>
                        <?php
                        include './conexao2.php';
                        $getRequests = mysqli_query($conexao,"SELECT * FROM cliente ORDER BY nomeCliente");
                        echo "<h3 id='oferta'>Ordenado por nome do cliente</h3><br>";
                        while($aux = $getRequests->fetch_assoc()){
                            echo "<tr>";
                            echo "  <td>".$aux['nomeCliente']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['id_cliente']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['cpf']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['cep']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['numeroResi']."&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="carousel-item">
                    <table class="table table-striped">
                        <tr>
                            <td class='text-success'><strong>CPF</strong></td>
                            <td class='text-success'><strong>ID</strong></td>
                            <td class='text-success'><strong>NOME</strong></td>
                            <td class='text-success'><strong>CEP</strong></td>
                            <td class='text-success'><strong>NÚMERO DA RESIDÊNCIA</strong></td>
                        </tr>
                        <?php
                        include './conexao2.php';
                        $getRequests = mysqli_query($conexao,"SELECT * FROM cliente ORDER BY cpf");
                        echo "<h3 id='oferta'>Ordenado por CPF</h3><br>";  
                        while($aux = $getRequests->fetch_assoc()){
                            
                            echo "<tr>";
                            echo "  <td>".$aux['cpf']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['id_cliente']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['nomeCliente']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['cep']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['numeroResi']."&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
            <span  aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
            <span  aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
            </a>
        </div>
        
                   <br><br><br><br>

        <!-- tabela usuário -->
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
        <h2 id='oferta'>Usuário</h2><br>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <table class="table table-striped">
                <tr>
                    <td class='text-success'><strong>ID</strong></td>
                    <td class='text-success'><strong>NOME</strong></td>
                    <td class='text-success'><strong>USUÁRIO</strong></td>
                    <td class='text-success'><strong>TIPO</strong></td>
                </tr>
                <?php
                include './conexao2.php';
                 $getRequests = mysqli_query($conexao,"SELECT * FROM cliente ORDER BY id_cliente");
                 echo "<h4 id='oferta'>Ordenado por ID</h4><br>";
                   while($aux = $getRequests->fetch_assoc()){
                    echo "<tr>";
                    echo "  <td>".$aux['id_cliente']."&nbsp;&nbsp;</td>";
                    echo "  <td>".$aux['nomeCliente']."&nbsp;&nbsp;</td>";
                    echo "  <td>".$aux['usuario']."&nbsp;&nbsp;</td>";
                    echo "  <td>".$aux['tipo']."&nbsp;&nbsp;</td>";
                    echo "</tr>";
                   }
                ?>
            </table>
          </div>
          <div class="carousel-item">
          <table class="table table-striped">
                <tr>
                    <td class='text-success'><strong>USUÁRIO</strong></td>
                    <td class='text-success'><strong>ID</strong></td>
                    <td class='text-success'><strong>NOME</strong></td>
                    <td class='text-success'><strong>TIPO</strong></td>
                </tr>
                <?php
                include './conexao2.php';
                 $getRequests = mysqli_query($conexao,"SELECT * FROM cliente ORDER BY usuario");
                 echo "<h3 id='oferta'>Ordenado por nome do usuário</h3><br>";
                   while($aux = $getRequests->fetch_assoc()){
                    echo "<tr>";
                    echo "  <td>".$aux['usuario']."&nbsp;&nbsp;</td>";
                    echo "  <td>".$aux['id_cliente']."&nbsp;&nbsp;</td>";
                    echo "  <td>".$aux['nomeCliente']."&nbsp;&nbsp;</td>";
                    echo "  <td>".$aux['tipo']."&nbsp;&nbsp;</td>";
                    echo "</tr>";
                   }
                ?>
            </table>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
          <span  aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
          <span  aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>

      <br><br><br><br>

        <!-- tabela produtos -->
        <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
            <h2 id='oferta'>Produtos</h2><br>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <table class="table table-striped">
                        <tr>
                            <td class='text-success'><strong>CÓDIGO DO PRODUTO</strong></td>
                            <td class='text-success'><strong>NOME</strong></td>
                            <td class='text-success'><strong>PREÇO</strong></td>
                            <td class='text-success'><strong>ESTOQUE</strong></td>
                        </tr>
                        <?php
                        include './conexao2.php';
                        $getRequests = mysqli_query($conexao,"SELECT * FROM produto ORDER BY codProduto");
                        echo "<h4 id='oferta'>Ordenado pelo código do produto</h4><br>";
                        while($aux = $getRequests->fetch_assoc()){
                            echo "<tr>";
                            echo "  <td>".$aux['codProduto']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['nomeProduto']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['preco']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['estoque']."&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
    
                <div class="carousel-item">
                    <table class="table table-striped">
                        <tr>
                            <td class='text-success'><strong>NOME</strong></td>
                            <td class='text-success'><strong>CÓDIGO DO PRODUTO</strong></td>
                            <td class='text-success'><strong>PREÇO</strong></td>
                            <td class='text-success'><strong>ESTOQUE</strong></td>
                        </tr>
                        <?php
                        include './conexao2.php';
                        $getRequests = mysqli_query($conexao,"SELECT * FROM produto ORDER BY nomeProduto");
                        echo "<h3 id='oferta'>Ordenado por nome do produto</h3><br>";
                        while($aux = $getRequests->fetch_assoc()){
                            echo "<tr>";
                            echo "  <td>".$aux['nomeProduto']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['codProduto']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['preco']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['estoque']."&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="carousel-item">
                    <table class="table table-striped">
                        <tr>
                            <td class='text-success'><strong>ESTOQUE</strong></td>
                            <td class='text-success'><strong>CÓDIGO DO PRODUTO</strong></td>
                            <td class='text-success'><strong>NOME</strong></td>
                            <td class='text-success'><strong>PREÇO</strong></td>
                        </tr>
                        <?php
                        include './conexao2.php';
                        $getRequests = mysqli_query($conexao,"SELECT * FROM produto ORDER BY estoque");
                        echo "<h3 id='oferta'>Ordenado por quantidade de produtos disponíveis</h3><br>";
                        while($aux = $getRequests->fetch_assoc()){
                            echo "<tr>";
                            echo "  <td>".$aux['estoque']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['codProduto']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['nomeProduto']."&nbsp;&nbsp;</td>";
                            echo "  <td>".$aux['preco']."&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                <span  aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                <span  aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
     
    </div>
      
      <br><br><br><br><br><br><br><br><br><br><br><br><br>

      <!-- Rodapé -->
      <footer id="myFooter">
        <div class="container">
          <div class="row">
            <h2 class="display-4 text-success">
              House Pharmacy, com você em todo lugar, até mesmo em seu lar
            </h2>
          </div>  
        </div>    
      </footer>
      <footer id="myFooter">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <h2 class="logo"><a href=""><img src="img/logoMenu.png"></a></h2>
            </div>
            <div class="col-sm-2">
              <h5>Inicio</h5>
              <ul>
                  <li><a href="">Home</a></li>
                  <li><a href="../login/logout.php">Logout</a></li>
              </ul>
            </div>
            
            <div class="col-sm-3">
              <div class="social-networks">
                <a href="https://twitter.com/pharmacy_house" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/House-Pharmacy-107245028267756" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/housepharmacyofc/" class="instagram"><i class="fa fa-instagram"></i></a>
              </div>
              <a href="mailto:housepharmacycontact@gmail.com?subject=helo%20again">
                  <button type="button" class="btn btn-default">E-mail</button>
              </a>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <p>© 2021 Copyright - House Pharmacy</p>
        </div>
      </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



      <!-- Js do menu -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
    </body>
</html>