

<?php
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $precoErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoProduto = False;
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        } else {
            $nomeErro = 'Por favor digite o nome do produto!';
            $validacao = False;
        }
    }
    if (!empty($_POST['preco'])) {
        $preco = $_POST['preco'];
    } else {
        $precoErro = 'Por favor digite o preço do produto!';
        $validacao = False;
    }
//Inserindo no Banco:
    if ($validacao) {
        $pdo = db::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO produto (nome, preco) VALUES(?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $preco));
        db::desconectar();
        header("Location: index.php");
    }
}
?>


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
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nome" type="text" placeholder="Nome do produto"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="control-group <?php echo !empty($precoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Preço</label>
                        <div class="controls">
                            <input size="35" class="form-control" name="preco" type="text" placeholder="Preço do produto"
                                   value="<?php echo !empty($preco) ? $preco : ''; ?>">
                            <?php if (!empty($precoErro)): ?>
                                <span class="text-danger"><?php echo $precoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

