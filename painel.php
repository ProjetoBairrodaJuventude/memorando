<?php
if (!isset($_SESSION))
session_start();

include('conexao.php');

$sql_lista = "SELECT nome,setor FROM lista WHERE ID='$_SESSION[ID]'";
$query_lista = $mysql->query($sql_lista) or die($mysql->error); 
$cliente = $query_lista->fetch_assoc();









?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Bem Vindo(a)  <?php echo $cliente['nome']; ?></h1>
   <table border="1" cel style="display:flex ;">

    <div>
        <label for="">De:</label>
        <?php echo $cliente['nome']; ?> 
    </div>
    <div>
        <label for="">Setor de Origem:</label>
        <?php echo $cliente['setor']; ?> 
    </div>


    <div>
        <label for="">Para:</label>
        <select id=cbDest>
        <option>Selecione O Destinatário</option>
<?php
        $sql_lista = "SELECT * FROM lista";
$query_lista = $mysql->query($sql_lista) or die($mysql->error); 
while ($lista = $query_lista->fetch_assoc()) {
?>
       <option><?php echo $lista['nome']; ?></option>
     
         
<?php }$sql_lista2 = "SELECT setor FROM lista where nome= '$lista[nome]' ";
echo $sql_lista2;

$query_lista2 = $mysql->query($sql_lista) or die($mysql->error);

while ($lista2 = $query_lista->fetch_assoc()) { ?>
</select>
    </div> 
    

<label for="">Setor Destino:</label>
<label><?php echo $lista2['setor']; ?></label>
<?php } ?>
<label for=""></label>

   </table>
   <a href="sair.php">Sair</a>
</body>
</html>