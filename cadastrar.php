
<?php

	function limpar_texto($str)
	{
		return preg_replace("/[^0-9]/", "", $str);
	}
	if (count($_POST) > 0) {

		include('conexao.php');
		 
		$erro = false;
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		$admin = $_POST['admin'];
 
		if (empty($nome)) {
			$erro = "preencha o Nome";
		} else if (empty($senha)) {
			$erro = "preencha o Senha";
		} else if (!$erro) {
			$sql_code = "INSERT INTO lista ( nome, senha , admin) VALUES ('$nome', '$senha', admin = '$admin')";
		
			$deu_certo = $mysql->query($sql_code) or die($mysql->error);
			if ($deu_certo) {
				$deu_certo = "Cliente cadastrado!!!";
			
				unset($_POST);
			}
		} else {
			$deu_certo = '';
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="vienwport" content="width=devince-width, initial-scale=1">
	<title>cadastrar clientes</title>
</head>

	

<body>
	
		<a href="lista.php">voltar para a lista</a>
	<form method="POST" action=""></div>
			<h1>Cadastrar Clientes </h1>
			<br>
			<p>preencha com suas informaçoes</p>
			<br>
			
	
			<label>Nome:</label><br>
			<input type="<?php if (isset($_POST['nome']))
		echo $_POST['nome']; ?>"type="text" name="nome">
		<br>
			<label>Senha:</label><br>
			<input type="<?php if (isset($_POST['senha']))
		echo $_POST['senha']; ?>"type="text" name="senha">
		<p>
			<label for="">Tipo:</label>
			<br>
			<input name="admin" value="1" type="radio">ADMIN
			<input name="admin" value="0" type="radio">CLIENTE
		</p>
		</p>
		<p>
			<button type="submit">
				Salvar Cliente
			</button>
		</p>
	</form>
	<?php
	if (isset($deu_certo)) {
		echo "<br><h1>$deu_certo</h1>";
	}
	if (isset($erro)) {
		echo "<br><h1>$erro</h1>";
	} ?>

		
	
</body>
</html>
