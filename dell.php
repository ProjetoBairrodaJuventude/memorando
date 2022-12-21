<?php

if(isset($_POST['confirmar'])) {

    include("conexao.php");
    $ID = intval($_GET['ID']);
    $sql_code = "DELETE FROM lista WHERE ID = '$ID'";
   
    $sql_query = $mysql->query($sql_code) or die($mysql->error);


    if($sql_query) { ?>
        <h1>Cliente deletado com sucesso!</h1>
        <p><a href="lista.php">Clique aqui</a> para voltar para a lista de clientes.</p>
        <?php
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
</head>
<body>
    <h1>Tem certeza que deseja deletar este cliente?</h1>
    
    <form action="" method="post">
        <a href="lista.php">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>
</body>
</html>