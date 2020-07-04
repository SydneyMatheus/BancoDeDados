<?php
//Conexão com o Banco

$mysqli = new mysqli("localhost","root","senha","transportadora");

if(mysqli_connect_error())
{
    echo "Erro ao conectar no BD: ". mysqli_connect_error();
    exit();
}


?>
