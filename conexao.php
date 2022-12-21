<?php
//colocar o indereço do banco de dados
 $host = "localhost";
 $db  = "cursin";
 $user = "root";
 $pass = "";

 $mysql = new mysqli($host, $user, $pass, $db);
 if ($mysql->connect_errno){
 	die("falha na conexao com o banco de dados");
}

?>