<?php


include('../config.php');
if(!isset($_GET['idCliente'])&& $_GET['idCliente']== "")
{
    echo "por favor informe a ID do cliente";
} else 
{
    $idCliente = $_GET['idCliente'];
?>
<html>
    <body>

        <head>
        <meta charset="UTF-8">
        <title>Sistema da Transportadora</title>
        </head>
        <h1>Registrar Pacote</h1>

        <form action="add_ctrl_pct.php?idCliente=<?php echo $idCliente?>" method="post">
            Data da Entrada*:
            <input type="text" name="dataEntrada" id="nodataEntradame" pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}" required="true"/>
            <br/>
            Previsão de Entrega*:
            <input type="text" name="prevEntrega" id="prevEntrega" pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}" required="true"/>
            <br/>
            Peso*:
            <input type="text" name="peso" id="peso" required="true"/>
            <br/>
            Largura*:
            <input type="text" name="largura" pattern="[0-9]{1,9}" id="largura" required="true"/>
            <br/>
            Altura*:
            <input type="text" name="altura" pattern="[0-9]{1,9}" id="altura" required="true"/>
            <br/>
            Comprimento*:
            <input type="text" name="comprimento" pattern="[0-9]{1,9}" id="comprimento" required="true"/>
            <br/>
            <br/>
            <small style="color: red;"> * Campos obrigatórios</small>
            <br/>
            <br/>
            <br/>
            <button type="button" onclick="location.href='/index.php'">Voltar</button>
            <button type="submit">Registrar</button>
        </form>
    </body>
</html>
<?php
}


?>
