<?php
    $conn = mysqli_connect('localhost', 'root', '');
    if($conn == false){
        echo "OCURRIO UN ERROR AL CONECTARSE A LA BASE DE DATOS";
        die();
    }
    mysqli_select_db($conn, "workflow");
?>