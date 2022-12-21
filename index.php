<?php
if (isset($_POST['nome']) && isset($_POST['senha'])) {

    include('conexao.php');
    $nome = $mysql->escape_string($_POST['nome']);
    $senha = $_POST['senha'];



    $sql_code = "SELECT * FROM lista WHERE nome = '$nome'";
    $sql_query = $mysql->query($sql_code) or die($mysql->error);

    if ($sql_query->num_rows == 0) {
        echo  "Os Dados Informados Estao Incorretos!";
        
    }else {
        $usuario = $sql_query->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            echo "Dados Errados";
        }else{
            if (!isset($_SESSION))
                session_start();
                $_SESSION['admin'] = $usuario['admin'];
            $_SESSION['ID'] = $usuario['ID'];

            if( $_SESSION['admin'] = $usuario['admin']){
                header("location:lista.php?ID=$_SESSION[ID]");
            }else{

            if( $_SESSION['ID'] = $usuario['ID'])
                header("location:painel.php?ID=$_SESSION[ID]");
            }   
            }
        }
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Entrar</h1>
    
    <p>Preencha Com Seus Dados.</p>
    <br>
    <form action="" method="POST">
    <label for="">Nome:</label>
    <input type="text" name="nome">
    <br>
    <label for="">Senha:</label>
    <input type="password" name="senha">
    <br>
    
    <button type="submit">Entrar</button>
    </form>
</body>
</html>