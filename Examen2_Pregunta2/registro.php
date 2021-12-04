<?php
$idusuario = $_SESSION['usuario'];
$numero = $_SESSION['nrotramite'];
if ($idusuario != ''){
    $consulta="select * from seguimiento where idproce='p4' and idusuario='".$idusuario."';";
    if($resultado=mysqli_query($conn, $consulta)){//verificamos que tenga seguimiento
        $rowcount=mysqli_num_rows($resultado);
        if($rowcount==0){//INICIAMOS SEGUIMIENTO 
            $sql="insert into seguimiento(nrotramite, idusuario, flujo, idproce) values(".$numero.", '".$idusuario."', 'f1', 'p4');";
            $resultado=mysqli_query($conn, $sql);
        }
    }
}else{
    header('Location: index.php');
}
?>
<h2>Registro del frente</h2>
<center>
    <label for="sigla">SIGLA</label>
    <input type="text" name="sigla" style="width: 300px; height:50px;" ></input><br><br>
    <label for="nombre_p">NOMBRE DEL PARTIDO</label>
    <input type="text" name="nombre_p" style="width: 300px; height:50px;"><br><br>
</center>