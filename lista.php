<?php
include('conexao.php');



$sql_lista = "SELECT * FROM lista";
$query_lista = $mysql->query($sql_lista) or die($mysql->error);
$num_lista = $query_lista->num_rows;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <h1>Lista De Usuario</h1>
    <table border="1" cellpadding="10">
        <thead>
        
            <th>ID</th>
            <th>Admin</th>           
            <th>Nome</th>           
            <th>Senha</th>           
            <th>Ações</th>
            
        </thead>
        <tbody>
            <?php if ($num_lista == 0) { ?>
                <tr>
                    <td colspan="5">Nenhum cliente foi cadastrado</td>
                </tr>
            <?php
    } else {
        while ($cliente = $query_lista->fetch_assoc()) {


            ?>
                <tr>
                    
                    <td><?php echo $cliente['ID']; ?></td>
                    <td><?php if ($cliente['admin']){ echo ("SIM");}else{echo ('NAO');} ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['senha']; ?></td>
                    <td>
                        
                        <a href="dell.php?ID=<?php echo $cliente['ID']; ?>">Deletar</a>
                        <a href="edit.php?ID=<?php echo $cliente['ID']; ?>">Editar</a>
                    </td>
                    <?php } ?>  
                </tr>
              
                <?php
    }   
                ?>
        </tbody>
        
    </table>
    <a href="sair.php">Sair</a>

    
</body>
</html>