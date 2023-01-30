<?php
    if(!isset($_GET["id"]))
    {
        header("location:index.php");
    }

    $id = $_GET["id"];
    
    require '../../Persistencia/DAL/PedidoDAL.php';
    
    $dao = new PedidoDAL();
    
    $retorno = $dao->excluir($id);
    
    if($retorno > 0)
    {
        $msg = "Registro excluído com sucesso";
    }
    else
    {
        $msg = "Não foi possível excluir o registro. Verifique dependências";
    }

?>

<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
            <h3 class="well">Exclusão de Pedido</h3>
            </div>
            <div class="card-body">
<div class="col-md-5 offset1" style="margin-top: 20px">
        <div class="">
                    
                </div>
    
                    <input type="hidden" name="id" value="" />
                    <div class="alert alert-danger"> <h3><?php echo $msg; ?></h3>
                    </div>
                    <div class="form actions">
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
        <div>
</div>
</body>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
</html>
