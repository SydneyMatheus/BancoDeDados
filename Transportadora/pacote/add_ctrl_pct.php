<?php
include('../config.php');
if(!isset($_GET['idCliente'])&& $_GET['idCliente']== "")
{
    echo "por favor informe a ID do cliente";
} else 
{
    $idCliente = $_GET['idCliente'];
    
    if ($_POST ['dataEntrada'] == '')
    {
        echo "Erro! Data de Entrada não informado";
    }
    else if ($_POST ['prevEntrega'] == '')
    {
        echo "Erro! Previsão não informado";
    }
    else if ($_POST ['peso'] == '')
    {
        echo "Erro! Peso não informado";
    }
    else if ($_POST ['largura'] == '' || !is_numeric($_POST['largura']))
    {
        echo "Erro! Largura não informado";
    }
    else if ($_POST ['altura'] == '' || !is_numeric($_POST['altura']))
    {
        echo "Erro! Altura não informado";
    }
    else if ($_POST ['comprimento'] == '' || !is_numeric($_POST['comprimento']))
    {
        echo "Erro! Comprimento não informado";
    }

        $dataEntrada = $_POST['dataEntrada'];
        $prevEntrega = $_POST['prevEntrega'];
        $peso = $_POST['peso'];
        $largura = $_POST['largura'];
        $altura = $_POST['altura'];
        $comprimento = $_POST['comprimento'];
        
        $sql = "SELECT idEndereco FROM endereco WHERE idCliente = '$idCliente'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_row(); 
        $idEndereco= $row[0];
        
        $sql = "INSERT INTO pacote (idDetalhes, idCliente, idEndereco, dataEntrada, dataPrev, peso, largura, altura, comprimento)
        VALUES (3, '$idCliente', '$idEndereco', '$dataEntrada', '$prevEntrega', '$peso', '$largura', '$altura', '$comprimento');";


        if($mysqli->query($sql)==true)
        {
            echo "Pacote Registrado.";
        } else 
        {
            echo "Erro ao registrar o pacote.";
        }
        
        /*$sql = "INSERT INTO pacote (idDetalhes, idCliente, idEndereco, dataEntrada, dataPrev, peso, largura, altura, comprimento)
                VALUES (idDetalhes, '$idCliente', idEndereco, '$dataEntrada', '$prevEntrega', '$peso', '$largura', '$altura', '$comprimento');";

        if($mysqli->query($sql)==true)
        {
            echo "Pacote Registrado.";
        } else 
        {
            echo "Erro ao registrar o pacote.";
        }*/
}
?>
<br/>
<br/>
<button type="button" onclick="location.href='/index.php'">Voltar</button>