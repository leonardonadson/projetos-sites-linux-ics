<?php
   if(!isset($_GET["id"]))
    {
      header("location: index.php");
    }
    
    require '../../Persistencia/modelo/Produto.php';
    require '../../Persistencia/DAL/ProdutoDAL.php';
    
    $produto_id = $_GET["id"];
    $dao = new ProdutoDAL();
    $obj = $dao->buscarPorChavePrimaria($produto_id);

    if($obj == null)
    {
        header("location: index.php");
    } 
    
?>

<link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

          
        
<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Informações do Produto</h3>
            </div>
            <div class="card-body">
                    <div class="control-grup">
                        <label class="control-label">Código:</label>
                        <input type="text" class="form-control" value="<?php echo $obj->produto_id ?>" readonly name="txtId"/><br />
                    </div>
                    <div class="control-grup">
                        <label class="control-label">Nome:</label>
                        <input type="text" class="form-control" value="<?php echo $obj->preco ?>" readonly name="txtNome"/><br />
                    </div>
                    <div class="control-grup">
                        <label class="control-label">Preço:</label>
                        <input type="text" class="form-control" value="<?php echo $obj->preco ?>" readonly name="txtPreco"/><br />
                    </div>
                   

                    <a href="index.php" class="btn">Voltar</a>
                    <a href="upd.php?id=<?php echo $obj->produto_id?>" class="btn btn-warning" >Editar</a>
            </div>
        </div>
    </body>
</html>