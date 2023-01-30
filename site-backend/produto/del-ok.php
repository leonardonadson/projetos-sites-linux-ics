<?php
    if(!isset($_GET["id"]))
    {
        header("location:index.php");
    }

    $id = $_GET["id"];
    
    require '../../Persistencia/DAL/ProdutoDAL.php';
    
    $dao = new ProdutoDAL();
    
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
            <h3 class="well">Exclusão do Produto</h3>
            </div>
            <div class="card-body">
<div class="col-md-5 offset1" style="margin-top: 20px">
        <div class="">
        <div>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>