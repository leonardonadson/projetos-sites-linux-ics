<?php
    include "../../Persistencia/DAL/produtoDAL.php";
    $pdao = new ProdutoDAL();
    
    $listaprods = $pdao->listar();
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAZER PEDIDO</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    
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
    .form-actions{
        display: flex;
        width: 200px;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANETA AZUL BAR</title>
 
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>

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
            <div class="card-header">
                <img src="../images/header-pedido.png" alt="">
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create-ok.php" method="post">

                <div class="control-group">
                        <label class="control-label">Nome:</label>
                        <input type="text" class="form-control" name="txtNome" placeholder="Digite seu nome completo"/><br />
                </div>
                <div class="control-group">
                        <label class="control-label">Telefone:</label>
                        <input type="text" class="form-control" name="txtNumero" placeholder="Ex.: 84 987654363" /><br />
                </div>

                    <div class="wrapper">
   <section class="module tour-list">
      <h3 class="section-title"><b>PRODUTOS</b></h3>
      <div class="content">
         <ul class="shows">
         <?php
   
        foreach($listaprods as $prod)
        {
        ?>
        <li>
            
            <p class="place"> <?php echo $prod->nome?> </p>
            <p class="country"><?php echo $prod->preco?> </p>
            <div class="button-container">
            <input type="checkbox" lass="btn-buy" name="produtos[]" value="<?php echo $prod->produto_id?>">
            <!--<a class="btn-buy" href="#">ADICIONAR</a>-->
        </li>
                       
        <?php                   
        }
        ?>
         </ul>

      </div>
   </section>
</div>
                    
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn">Adicionar</button>
                        <a href="../index.php" type="btn" class="btn" style="margin-left: 10px">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>