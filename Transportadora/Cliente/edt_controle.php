<?php

include('../config.php');

if(!isset($_GET['idCliente'])&& $_GET['idCliente']== "")
{
    echo "por favor informe a ID do cliente";
} else 
{
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

    else 
    {
        $idCliente = $_GET['idCliente'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $lograd = $_POST['lograd'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        
        $sql = "UPDATE cliente SET nome = '$nome', email = '$email' WHERE idCliente = $idCliente;";
        
        if($mysqli->query($sql)==true)
        {
            echo "Nome e E-mail Cliente Editado.";
        } else 
        {
            echo "Erro ao editar Nome/Email cliente.";
        }
        
        $idBairro = $bairro;
        $sql = "UPDATE endereco SET idBairro = '$idBairro', lograd = '$lograd', numero = '$numero' WHERE idCliente = $idCliente;";
                if($mysqli->query($sql)==true)
        {
            echo "Logradouro e Número Cliente Editado.";
        } else 
        {
            echo "Erro ao editar Logradouro e Número cliente.";
        }
        
        $sql = "UPDATE telefone SET telefone ='$telefone';";
        if($mysqli->query($sql)==true)
        {
            echo "Telefone Cliente Editado.";
        } else 
        {
            echo "Erro ao editar Telefone cliente.";
        }

    }
}
$mysqli->close();
?>

<br/>
<br/>
<button type="button" onclick="location.href='/index.php'">Voltar</button>
