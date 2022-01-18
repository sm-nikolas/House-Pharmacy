<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="img/icone.png"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>House Pharmacy - Produtos</title>
        <!-- css rodapé -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/rodape.css"/>

        <!-- css tela -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/produtos.css"/>
      </head>
    <body id="fundo">

      <!-- MENU -->
      <nav class="navbar navbar-expand-lg navbar-light  bg-white fixed">
        <div class="container">
          <a class="navbar-brand" href="homepage.php"><img src="img/logoMenu.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="alterna navegação">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../paginas/homepage.php">Página Principal<span class="sr-only"></span></a>
              </li>
              
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="nav-link" href="#">Contatos<span class="sr-only"></span></a>
              </li>
              <!-- carrinho -->

              <div class="carrinho">
                <div class="compras">
                  <a data-toggle="modal"  href="#" data-target="#modalLogin">
                    <ol>
                      <li><img class="car" src="img/iconLogin.png"></li>
                    </ol>
                  </a>
                </div>
              </div>
              <div class="carrinho">
                <div class="compras">
                  <a  href="#" data-target="#modalCarrinho">
                    <ol>
                      <li><img class="car" src="img/carrinho.png"></li>
                    </ol>
                  </a>
                </div>
              </div>
            </ul>
          </div>   
        </div>
        <form method="POST" class="form-inline">
            <input class="form-control mr-sm-2" type="text" name="pesquisar" placeholder="O que você procura?" aria-label="Search">
        </form>   
      </nav>
      <?php
          include './conexao2.php';
        if(!empty($_POST['pesquisar'])){
          $pesquisar = $_POST["pesquisar"];

          if($pesquisar == ""){
              
          }else{
              $getRequests = mysqli_query($conexao,"SELECT * FROM produto WHERE nomeProduto LIKE '%$pesquisar%' LIMIT 5");
              $produtos=mysqli_num_rows($getRequests); 
            if( $produtos == 0 ){
              echo "<div class='container'>";
              echo " <br><br><br><br><h3 id='erroCad' style='color: red;' class='display-5'>Produto não encontrado!</h3>";
              echo "</div>";
            }else{
              echo "<br><br><br><br><h2 id='oferta'>Resultado</h2><br><br><br><br>";
              echo "<div class='container'>";
                echo "<div class='row'>";
              while($aux = $getRequests->fetch_assoc()){
                  echo "<div class='col-xs-12 col-sm- 6 col-md-6 col-lg-4 col-xl-4'  id='cardPro'>";
                    echo "<div class='cartao' style='width: 17rem;'><br>";
                      echo "<img id='imgProdutos' alt='".$aux["descricao"]."' title='".$aux["descricao"]."' style='width: 200px; height: 200px;' src='imgCarregadas/".$aux["imagem"]."'/>";
                      echo "<div class='card-body'>";
                        echo "<h5 class='h5'>".$aux["nomeProduto"]."</h5><br>";
                        echo "<p class='card-text'>R$".$aux["preco"]."</p>";
                        echo "<input type='submit' value='Adicionar ao carrinho' class='btn btn-success'/>";
                      echo "</div>";  
                    echo "</div>";
                  echo "</div>"; 
            } 
                echo "</div>";
            echo "</div>";
            echo "<br><br><br><br><br><br><br><br>";
          }
          }
        }  
          
      ?>


       <!-- Modal --> 

      <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header text-light  bg-dark">
              <h5 class="modal-title" id="TituloModalCentralizado">Contatos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bg-dark">
              <footer id="myFooter" class="bg-dark">
                <div class="container">
                  <div class="row">
                    
                    <div class="col-sm-12">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            
              </footer>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Login/logout --> 

      <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header text-light  bg-dark">
              <h5 class="modal-title" id="TituloModalCentralizado">Perfil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bg-dark">
              <footer id="myFooter" class="bg-dark">
                <div class="container">
                  <div class="row">
                    
                    <div class="col-sm-12">
                      <a href="../login/loginAdm.php">
                          <button type="button" class="btn btn-default">Entrar como ADM</button>
                      </a>
                      <a href="../login/logout.php">
                          <button type="button" class="btn btn-default">Logout</button>
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

    <br><br><br><br>

    <!-- produtos -->

    <h2 id='oferta'>Produtos</h2><br><br><br><br>
    <div class='container'>
      <div class='row'>
    <?php
    include './conexao2.php';
    $getRequests = mysqli_query($conexao,"SELECT * FROM produto WHERE codProduto>=1");
    $produtos=mysqli_num_rows($getRequests); 
    if( $produtos == 0 ){
      echo "<div class='container'>";
      echo "  <h3 id='erroCad' class='display-5'>O site ainda não contém produtos cadastrados!</h3>";
      echo "</div>";
    }else{
      while($aux = $getRequests->fetch_assoc()){
        echo "<div class='col-xs-12 col-sm- 6 col-md-6 col-lg-4 col-xl-4'  id='cardPro'>";
          echo "<div class='cartao' style='width: 17rem;'><br>";
            echo "<img id='imgProdutos' alt='".$aux["descricao"]."' title='".$aux["descricao"]."' style='width: 200px; height: 200px;' src='imgCarregadas/".$aux["imagem"]."'/>";
            echo "<div class='card-body'>";
              echo "<h5 class='h5'>".$aux["nomeProduto"]."</h5><br>";
              echo "<p class='card-text'>R$".$aux["preco"]."</p>";
              echo "<input type='submit' value='Adicionar ao carrinho' class='btn btn-success'/>";
            echo "</div>";  
          echo "</div>";
        echo "</div>";
      }
    }       

    ?>
      </div>
    </div>
      <br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>  

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
              <div class="col-sm-2">
                <h5>Sobre-nós</h5>
                <ul>
                    <li><a href="sobre.php">Informações da Empresa</a></li>
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
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



      <!-- Js do menu -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
    </body>
</html>