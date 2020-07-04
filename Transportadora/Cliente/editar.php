<?php
include('../config.php');

if(!isset($_GET['idCliente'])&& $_GET['idCliente']== "")
{
    echo "por favor informe a ID do cliente";
} else 
{
    $idCliente = $_GET['idCliente'];
    $sql = "SELECT cliente.nome, cliente.email, telefone.telefone from cliente inner join 
           telefone where cliente.idCliente = $idCliente and telefone.idCliente = $idCliente;";
    if($result = $mysqli->query($sql))
    {
        $row = $result->fetch_row();
        $nome = $row[0];
        $email = $row[1];
        $telefone = $row[2];

        $sql = "SELECT idBairro, lograd, numero FROM endereco WHERE idCliente = $idCliente;";
        if($result = $mysqli->query($sql))
        {
            $row = $result->fetch_row();
            $idBairro = $row[0];
            $lograd = $row[1];
            $numero = $row[2];

            $sql = "SELECT idCidade, bairro FROM bairro WHERE idBairro = $idBairro;";
            if($result = $mysqli->query($sql))
            {
                $row = $result->fetch_row();
                $idCidade = $row[0];
                $bairro = $row[1];

                $sql = "SELECT idEstado, cidade FROM cidade WHERE idCidade = $idCidade;";
                if($result = $mysqli->query($sql))
                {
                    $row = $result->fetch_row();
                    $idEstado = $row[0];
                    $cidade = $row[1];

                    $sql = "SELECT estado FROM estado WHERE idEstado = $idEstado;";
                    if($result = $mysqli->query($sql))
                    {
                        $row = $result->fetch_row();
                        $estado = $row[0];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema da Transportadora</title>
    </head>
    <body>
        <h1>Editar Destinatário</h1>
        <form action="edt_controle.php?idCliente=<?php echo $idCliente?>" method="post">
            Nome*:
            <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" required="true"/>
            <br/>
            E-mail*:
            <input type="text" name="email" id="email" value="<?php echo $email;?>" required="true"/>
            <br/>
            Logradouro*:
            <input type="text" name="lograd" id="lograd" value="<?php echo $lograd;?>" required="true"/>
            <br/>
            Nº Residência*:
            <input type="text" name="numero" pattern="[0-9]{1,9}" id="numero" value="<?php echo $numero;?>" required="true"/>
            <br/>
            Bairro Atual:
            <font style="color: grey"><?php echo $bairro;?></font>
            
            Bairro*:
            <select name="bairro" id="bairro">
                <option> Selecione Bairro</option>
                <?php
                    $query = "SELECT * FROM bairro ORDER BY bairro";
                    $result = $mysqli->query($query);
                    if($result->num_rows >0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            echo '<option value='.$row['idBairro'].'>'.$row['bairro'].'</option>';
                        }
                    }
                ?>
            </select>
            <br/>
            
            Cidade Atual:
            <font style="color: grey"><?php echo $cidade;?></font>
            
            Cidade*:
            <select name="cidade" id="cidade" class="form-control"  required>
                <option value="">Selecione a Cidade</option>
                <?php
                    $query = "SELECT * FROM cidade ORDER BY cidade";
                    $result = $mysqli->query($query);
                    if($result->num_rows >0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            echo '<option value='.$row['idCidade'].'>'.$row['cidade'].'</option>';
                        }
                    }
                ?>
            </select>
            <br/>
            Estado Atual:
            <font style="color: grey"><?php echo $estado;?></font>
            
            Estado*:
            <select name="estado" id="estado" class="form-control" required>
            <option value="">Selecione o Estado</option>
            <?php
                include('../config.php');
            
                $query = "SELECT * FROM estado ORDER BY estado";
                $result = $mysqli->query($query);
                if($result->num_rows >0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo '<option value='.$row['idEstado'].'>'.$row['estado'].'</option>';
                    }
                }
            ?>
            </select>
            <br/>
            Telefone*:
            <input type="text" name="telefone" pattern="[0-9]{1,9}" id="telefone" value="<?php echo $telefone;?>" required="true"/>
            <!--<br/>
            Telefone(2):
            <input type="text" name="telefone2" pattern="[0-9]{1,9}" id="telefone"/>
            <br/>-->
            <br/>
            <small style="color: red;"> * Campos obrigatórios</small>
            <br/>
            <br/>
            <br/>
            <button type="button" onclick="location.href='/index.php'">Voltar</button>
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>
<?php                               
                    }
                }
            }
        }
    }
    $result->close();
}
$mysqli->close();
?>