<?php
if(!isset($_POST["txtId"]) || !isset($_POST["txtNome"]) || !isset($_POST["txtNumero"]) )
{
    header("location:index.php");
}

require "../../Persistencia/modelo/Pedido.php";
require "../../Persistencia/DAL/PedidoDAL.php";

$obj = new Pedido();

$obj->id = $_POST["txtId"];
$obj->nome_cliente = $_POST["txtNome"];
$obj->numero_cliente = $_POST["txtNumero"];

$dao = new PedidoDAL();

$retorno = $dao->alterar($obj);
if($retorno > 0){
    $msg = "Registro alterado com sucesso";
}
else{
    $msg = "Não foi possível alterar o registro";
} 

?>
<link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualização de pedido</h3>
            </div>
            <div class="card-body">
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