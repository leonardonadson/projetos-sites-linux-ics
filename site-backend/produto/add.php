
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Adicionar Produto</title>
</head>

<body>

<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Produto</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="add-ok.php" method="post">

        <div>
            <div>
                <form action="add-ok.php" method="post">
                    <div class="control-group">
                        <label class="control-label">Nome:</label>
                        <input type="text" class="form-control" name="txtNome"/><br />
                    </div>
                    <div class="control-group">
                        <label class="control-label">Preço:</label>
                        <input type="text" class="form-control" name="txtPreco"/><br />
                    </div>

                    <input type="reset" class="btn btn-warning" value="Limpar" />
                    <input type="submit" class="btn btn-success" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>
