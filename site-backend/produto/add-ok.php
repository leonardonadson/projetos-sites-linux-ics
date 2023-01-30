<?php
    
   require '../../Persistencia/DAL/ProdutoDAL.php';
   require '../../Persistencia/modelo/Produto.php';
   
   $produto = new Produto();
   
   $produto->nome = $_POST["txtNome"];
   $produto->preco = $_POST["txtPreco"];
   
   $dao = new ProdutoDAL();
   $retorno = $dao ->inserir($produto);
   
?>
<link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Cadastro de produto</h3>
            </div>
            <div class="card-body">
        
            <div>
                <h3>Produto inserido com sucesso</h3>
                <div>
                <?php
                  
                ?>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>