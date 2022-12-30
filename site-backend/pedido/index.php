<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>PEDIDOS</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>PEDIDOS <span class="badge badge-secondary"></h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Adicionar</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Número do cliente</th>
                            <th scope="col">Nome do cliente</th>
                            <th scope="col">Total</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                             <tr>
			                <td scope="row">1</td>
                            <td>84987438803</td>
                            <td>Luísa Lima</td>
                            <td>R$ 10</td>
                             <td width=250>
                             <a class="btn btn-primary" href="read.php">Info</a>
                             
                             <a class="btn btn-warning" href="update.php">Atualizar</a>
                             
                             <a class="btn btn-danger" href="delete.php">Excluir</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>