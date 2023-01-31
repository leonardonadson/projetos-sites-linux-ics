<?php
    
   require '../../Persistencia/DAL/PedidoDAL.php';
   require '../../Persistencia/modelo/pedido.php';
   include '../../Persistencia/modelo/produto.php';
   include '../../Persistencia/DAL/produtoDAL.php';
   
   $pedido = new Pedido();
   
   $pedido->nome_cliente = $_POST["txtNome"];
   $pedido->numero_cliente = $_POST["txtNumero"];
 
   //var_dump($_POST["produtos"]);
   $produtos = array();
   foreach ($_POST["produtos"] as $produto_id)
   {
       $prod = new Produto();
       $prod->produto_id = $produto_id;
       $produtos[] = $prod;
       
   }
   $pedido->produtos = $produtos;
   
   $dao = new PedidoDAL();
   
   $retorno = $dao ->inserir($pedido);
?>
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANETA AZUL BAR</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>

<style>
    body{
        background: black; 
    }
    .card{
        background: black;
    }
    .form-control{
        background: black;
    }
    .form-control:active{
        background: black;
    }
    .form-control:focus{
        background: rgba(32, 32, 32, 0.445);
    }
    .card-header{
        text-align: center;
    }
    .card-header img{
        width: 400px;
    }
    .control-label{
        color: white;
    }
    a:hover{
        text-decoration: none;
    }
    h3{
        color:white;
    }
</style>

<header style="margin-top: 10px">
          <a href="#inicio"><img src="../images/logo-bar.png" alt="logo-bar"></a>
        <nav id="nav">
            <button aria-label="Abrir Menu" id="btmenu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span></span>
              </button>
            <ol id="menu">
                <li><a href="#inicio">INÍCIO</a></li>
                <li><a href="#skills">CARDÁPIO</a></li>
                <li><a href="#skills">CONTATO</a></li>
                <li class="btn-contato"><a href="https://mailto:luisalima0602@gmail.com/">FAZER PEDIDO</a></li>
            </ol>
        </nav>
        </header>

<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header" style="margin-top: 60px">
                <img src="../images/header-pedido.png" alt="">
            </div>
            <div class="card-body" >
        
            <div>
                <h3>Pedido inserido com sucesso</h3>
                <div>
                <?php
                  
                ?>
                    <a href="../index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>