<?php
$idusuario = $_SESSION['usuario'];
$numero = $_SESSION['nrotramite'];
if ($idusuario != ''){
    $consulta="select * from seguimiento where idproce='p3' and idusuario='".$idusuario."';";
    if($resultado=mysqli_query($conn, $consulta)){//verificamos que tenga seguimiento
        $rowcount=mysqli_num_rows($resultado);
        if($rowcount==0){//INICIAMOS SEGUIMIENTO 
            $sql="insert into seguimiento(nrotramite, idusuario, flujo, idproce) values(".$numero.", '".$idusuario."', 'f1', 'p3');";
            $resultado=mysqli_query($conn, $sql);
        }
    }
}else{
    header('Location: index.php');
}

?>
<h3 align="center">Validación</h3>
<center>
<input type="checkbox" name="documento[]" value="carta"><label> Carta al Tribunal</label></input><br><br>
<input type="checkbox" name="documento[]" value="cartera"><label> Cartera Organización del frente</label></input><br><br>
<input type="checkbox" name="documento[]" value="integrantes"><label> Integrantes completos</label></input><br><br>
</center>
