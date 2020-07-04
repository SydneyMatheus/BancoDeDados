<?php
include ('config.php');

if(!isset($_GET['idCliente'])&& $_GET['idCliente']== "")
{
    echo "por favor informe a ID do cliente";
} else 
{
    $idCliente = $_GET['idCliente'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema da Transportadora</title>
    </head>
    <body>
        <h1>Pacotes</h1>
        <button type="button" onclick="location.href='pacote/adicionarPacote.php?idCliente=<?php echo $idCliente?>'" method="post">Adicionar Pacote</button>
        <br>
        <br>
    </body>
    <table border="1px">
        <tr>
            
            <th>Entrada</th>
            <th>Prev. Entrega</th>
            <th>Peso</th>
            <th>largura</th>
            <th>Altura</th>
            <th>Comprimento</th>
        </tr>
        
        <?php
        $sql = "SELECT dataEntrada, dataPrev, peso, largura, altura, comprimento FROM pacote WHERE idCliente = $idCliente;";
        if($result = $mysqli->query($sql))
        {
            while ($row = $result->fetch_assoc()) 
            {
                echo"<tr>";
                echo "<td>" .$row['dataEntrada']."</td>";
                echo "<td>" .$row['dataPrev']."</td>";
                echo "<td>" .$row['peso']."</td>";
                echo "<td>" .$row['largura']."</td>";
                echo "<td>" .$row['altura']."</td>";
                echo "<td>" .$row['comprimento']."</td>";
                echo"</tr>";
            }
            $result->close();
        }
        ?>
    </table>
    </br>
    </br>
    <button type="button" onclick="location.href='/index.php'">Voltar</button>
</html>

<?php
}
$mysqli->close();
?>