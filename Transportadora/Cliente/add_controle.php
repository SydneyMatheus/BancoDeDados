<?php

include('../config.php');

if ($_POST ['nome'] == '')
{
    echo "Erro! Nome não informado";
}
else if ($_POST ['email'] == '')
{
    echo "Erro! E-mail não informado";
}
else if ($_POST ['lograd'] == '')
{
    echo "Erro! Logradouro não informado";
}
else if ($_POST ['numero'] == '' || !is_numeric($_POST['numero']))
{
    echo "Erro! Nº da residência não informado";
}
else if ($_POST ['bairro'] == '')
{
    echo "Erro! Bairro não informado";
}
else if ($_POST ['cidade'] == '')
{
    echo "Erro! Cidade não informado";
}
else if ($_POST ['estado'] == '')
{
    echo "Erro! Estado não informado";
}
else if ($_POST ['telefone'] == '' || !is_numeric($_POST['telefone']))
{
    echo "Erro! Telefone não informado";
}
    
else 
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $lograd = $_POST['lograd'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    //$telefones = $_POST['telefone'];
    
    $sql = "INSERT INTO cliente (nome, email) VALUES ('$nome','$email');";
    if($mysqli->query($sql)==true)
    {
        echo "Cliente Registrado.";
    } else 
    {
        echo "Erro ao registrar o cliente.";
    }
    $sql = "SELECT idCliente FROM cliente ORDER BY idCliente DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idCliente = $row[0];
    echo "\n<br />\n<br />Id do último cliente: ". $idCliente;
    
    $sql = "INSERT INTO telefone (idCliente, telefone) VALUES ('$idCliente','$telefone');";
    if($mysqli->query($sql)==true)
    {
        echo "\n<br />\n<br />Telefone Registrado.";
    } else 
    {
        echo "\n<br />\n<br />Erro ao registrar o telefone.";
    }
    /*foreach ($telefones as $telefone)
    {
        $sql = "INSERT INTO telefone (idCliente, telefone) VALUES ('$idCliente','$telefone');";
        if($mysqli->query($sql)==true)
        {
            echo "Telefones registrados.";
        } else 
        {
            echo "Erro ao registrar telefones.";
        }
    }*/
    
    //$sql = "SELECT idBairro FROM bairro WHERE bairro = '$bairro'";
    //$result = $mysqli->query($sql);
    //$row = $result->fetch_row(); 
    $idBairro = $bairro; //= $row[0];
    
    $sql = "INSERT INTO endereco (idCliente, idBairro, lograd, numero) VALUES ('$idCliente','$idBairro', '$lograd', '$numero');";
    if($mysqli->query($sql)==true)
    {
        echo "\n<br />\n<br />Endereço Registrado.";
    } else 
    {
        echo "\n<br />\n<br />Erro ao registrar o endereço.";
    }
    $result->close();
}

$mysqli->close();
?>

<br/>
<br/>
<button type="button" onclick="location.href='/Cliente/adicionar.php'">Voltar</button>

