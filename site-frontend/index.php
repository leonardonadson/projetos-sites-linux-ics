

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANETA AZUL BAR</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>

<header>
          <a href="#inicio"><img src="images/logo-bar.png" alt="logo-bar"></a>
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

<section class="banner">
    <img src="images/banner-bar.png" alt="">
</section>

<div class="wrapper">
   <section class="module tour-list">
      <h3 class="section-title"><b>CARDÁPIO</b></h3>
      <div class="content">
         <ul class="shows">
         <?php

            include "../Persistencia/DAL/produtoDAL.php";

            $dao = new ProdutoDAL();
            if(isset($_POST["txtFiltro"]))
            {
               $lista = $dao->listar($_POST["txtFiltro"]); 
            }
            else
            {  
               $lista = $dao->listar(); 
            }

            foreach ($lista as $obj)
            {
            ?>
           <li>
            <p class="place"><?php echo $obj->nome ?></p>
            <p class="country"><?php echo $obj->preco ?></p>
            <div class="button-container">
            <a class="btn-buy" href="#">PEDIR</a>
           </li>
           <?php
            }
           ?>                        
         </ul>
         <a href="pedido/create.php"> <button class="btn">FAZER PEDIDO</button></a>

      </div>
   </section>
</div>

<footer>
   <div class="content">
      <article>
         <p class="text">CANETA AZUL BAR @ 2022 — all rights reserved</p>
      </article>
   </div>
</footer>

<script src="index.js"></script>

</body>
</html>