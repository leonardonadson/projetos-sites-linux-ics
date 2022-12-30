<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAZER PEDIDO</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    
</head>
<body>
<style>
    body{
        background: black; 
    }
    .card{
        background: black;
    }
    .form-control{
        background: black;
    }
    .form-control:active{
        background: black;
    }
    .form-control:focus{
        background: rgba(32, 32, 32, 0.445);
    }
    .card-header{
        text-align: center;
    }
    .card-header img{
        width: 400px;
    }
    .control-label{
        color: white;
    }
    a:hover{
        text-decoration: none;
    }
</style>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <img src="../images/header-pedido.png" alt="">
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Seu nome</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nome_cliente" type="text" placeholder="Insira seu nome completo"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group  <?php echo !empty($telefoneErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Seu telefone</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="numero_cliente" type="text" placeholder="Ex.: 00000000000"
                                   value="<?php echo !empty($telefone_cliente) ? $telefone_cliente : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="wrapper">
   <section class="module tour-list">
      <h3 class="section-title"><b>PRODUTOS</b></h3>
      <div class="content">
         <ul class="shows">
         <?php
                        include '../db.php';
                        $pdo = db::conectar();
                        $sql = 'SELECT * FROM produto ORDER BY id ASC';

                        foreach($pdo ->query($sql)as $row)
                        {
                            echo '<li>';
                            echo '<p class="place">'. $row['nome'] . '</p>';
                            echo '<p class="country">'. $row['preco'] .'</p>';
                            echo '<div class="button-container">';
                            echo '<a class="btn-buy" href="#">ADICIONAR</a>';
                            echo ' ';
                            echo '</li>';
                        }
                        db::desconectar();
                        ?>
         </ul>

      </div>
   </section>
</div>
                    
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn">Adicionar</button>
                        <a href="../index.php" type="btn" class="btn">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>