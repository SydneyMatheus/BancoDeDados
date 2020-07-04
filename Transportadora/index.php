<!DOCTYPE html>
<?php
include ('config.php');

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema da Transportadora</title>
    </head>
    <body>
        <h1>Sistema da Transportadora</h1>
        <button type="button" onclick="location.href='Cliente/adicionar.php'">Registrar Destinatário</button>
        <br>
        <br>
    </body>
    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Opções</th>
        </tr>
        <?php
        $sql = "SELECT idCliente, nome, email FROM cliente;";
        if($result = $mysqli->query($sql))
        {
            while ($row = $result->fetch_assoc()) 
            {
                echo"<tr>";
                echo "<td>" .$row['nome']."</td>";
                echo "<td>" .$row['email']."</td>";
                echo "<td>";
                echo "<a href='Cliente/del_controle.php?idCliente=" .$row ['idCliente'] ."'>Excluir</a>  ";
                echo "<a href='Cliente/editar.php?idCliente=" .$row ['idCliente']."'>Editar</a>";
                echo "<a href='/visualizar.php?idCliente=" .$row ['idCliente']."'>Pacote</a>";
                echo "</td>";
                echo"</tr>";
            }
            $result->close();
        }
        ?>
    </table>
</html>

<?php
$mysqli->close();


function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>
