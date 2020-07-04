<!DOCTYPE html>

<html>
    <body>

        <head>
        <meta charset="UTF-8">
        <title>Sistema da Transportadora</title>
        </head>
        <h1>Registrar Destinatário</h1>

        <form action="add_controle.php" method="post">
            Nome*:
            <input type="text" name="nome" id="nome" required="true"/>
            <br/>
            E-mail*:
            <input type="text" name="email" id="email" required="true"/>
            <br/>
            Logradouro*:
            <input type="text" name="lograd" id="lograd" required="true"/>
            <br/>
            Nº Residência*:
            <input type="text" name="numero" pattern="[0-9]{1,9}" id="numero" required="true"/>
            <br/>
            
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
            Telefone*:
            <input type="text" name="telefone" pattern="[0-9]{1,9}" id="telefone" required="true"/>
            <!--<br/>
            Telefone(2):
            <input type="text" name="telefone[]" pattern="[0-9]{1,9}" id="telefone"/>
            <br/>-->
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



