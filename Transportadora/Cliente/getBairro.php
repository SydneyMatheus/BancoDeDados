<?php

include('../config.php');

//echo $_GET['idBairro'];
    $result = mysqli_query($mysqli,"SELECT * FROM bairro");
    
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    //print_r($rows);
    echo json_encode($rows);

?>