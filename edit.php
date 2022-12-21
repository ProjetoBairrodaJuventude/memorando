<?php
include('Conexao.php');

$ID = intval ($_GET['ID']);
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}


if(count($_POST) > 0) {

    $erro = false;
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $admin = $_POST['admin'];

    if(empty($nome)) {
        $erro = "Preencha o nome!";
    }
    if(empty($senha)) {
        $erro = "Preencha a Senha!";
    }

   

   

    if($erro) {
        echo "<br><b>ERRO: $erro</b><br>";
    } else {

        $sql_code = "UPDATE lista SET nome = '$nome', senha = '$senha' ,admin = '$admin'  WHERE ID = '$ID'";
        
        $deu_certo = $mysql->query($sql_code) or die  ($mysql->error);
        if($deu_certo) {
            echo "<br><b>Cliente atualizado com sucesso!!!</b><br>";
            unset($_POST);

        }
    }

}

$sql_lista = "SELECT * FROM lista WHERE ID = '$ID'";
$query_lista = $mysql->query($sql_lista) or die($mysql->error);
$cliente = $query_lista->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
</head>
<body>
    
    <a href="lista.php">Voltar para a lista</a>
    <form method="POST" action="">
		<p>
			<label>Nome:</label>
            <br>
			<input value="<?php echo $cliente['nome']; ?>" name="nome" type="text"><br>
			<label>Senha:</label>
            <br>
			<input value="<?php echo $cliente['senha']; ?>" name="senha" type="text"><br>
			
			<br>
            <label for="">Tipo:</label>
            <input name="admin" value="1" type="radio">ADMIN
            <input name="admin" value="0" type="radio">CLIENTE
            <br>
			<button type="submit">
				Salvar Cliente
			</button>
                
		</p>
	</form>



</body>
</html>