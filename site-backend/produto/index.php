<?php
    include '../../Persistencia/DAL/produtoDAL.php';

    $dao = new ProdutoDAL();
    if(isset($_POST["txtFiltro"]))
    {
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else
    {
       $lista = $dao->listar(); 
    }
    
    //var_dump($lista);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>PRODUTOS</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>PRODUTOS</h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="add.php" class="btn btn-success">Adicionar</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->produto_id ?></td>
                        <td><?php echo $obj->nome ?></td>
                        <td><?php echo $obj->preco ?></td>
                        <td>
                        <a href="read.php?id=<?php echo $obj->produto_id?>" class="btn btn-info">Info</a>
                            <a href="upd.php?id=<?php echo $obj->produto_id?>" class="btn btn-warning">Editar</a>
                            <a href="del-ok.php?id=<?php echo $obj->produto_id?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>