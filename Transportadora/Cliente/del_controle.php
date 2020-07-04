<?php
include('../config.php');

if(!isset($_GET['idCliente'])&& $_GET['idCliente']== "")
{
    echo "por favor informe a ID do cliente";
} else 
{
    $idCliente = $_GET['idCliente'];
    $sql = "DELETE FROM telefone WHERE idCliente = $idCliente";
    if($mysqli->query($sql)==true)
    {
        echo "Telefone Removido.";
    } else 
    {
        echo "Erro ao remover Telefone.";
    }
    
    $sql = "DELETE FROM endereco WHERE idCliente = $idCliente";
    if($mysqli->query($sql)==true)
    {
        echo "Endereço Removido.";
    } else 
    {
        echo "Erro ao remover Endereço.";
    }    
    
    $sql = "DELETE FROM cliente WHERE idCliente = $idCliente;";
    if($mysqli->query($sql)==true)
    {
        echo "Cliente Removido.";
    } else 
    {
        echo "Erro ao remover cliente.";
    } 
}

$mysqli->close();
?>

<br/>
<br/>
<button type="button" onclick="location.href='/index.php'">Voltar</button>