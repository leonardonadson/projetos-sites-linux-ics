<?php
   if(!isset($_GET["id"]))
    {
      header("location: index.php");
    }
    
    require '../../Persistencia/modelo/Pedido.php';
    require '../../Persistencia/DAL/PedidoDAL.php';
    
    $id = $_GET["id"];
    $dao = new PedidoDAL();
    $obj = $dao->buscarPorChavePrimaria($id);
    $listaprods = $dao->buscarProdutos($id);

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
                <h3 class="well"> Atualizar Pedido</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="upd-ok.php" method="post">
                    <div class="control-grup">
                        <label class="control-label">Código:</label>
                        <input type="text" class="form-control" value="<?php echo $obj->id ?>" readonly name="txtId"/><br />
                    </div>
                    <div class="control-grup">
                        <label class="control-label">Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $obj->nome_cliente ?>"  name="txtNome"/><br />
                    </div>
                    <div class="control-grup">
                        <label class="control-label">Telefone:</label>
                        <input type="text" class="form-control" value="<?php echo $obj->numero_cliente ?>"  name="txtNumero"/><br />
                    </div>

                    <?php
                    foreach ($listaprods as $prod) {
                    
                    ?>

                    <input type="checkbox" name="produtos[]" value="<?php echo $prod->produto_id?>" disabled >
                    <?php echo $prod->nome?><br/>
                    
                    <?php
                    }
                    ?>
                    <br/>

                    <input type="reset" value="Limpar" class="btn btn-warning" />
                    <input type="submit" value="Salvar" class="btn btn-success" />
                </form>
            </div>
        </div>
    </body>
</html>
