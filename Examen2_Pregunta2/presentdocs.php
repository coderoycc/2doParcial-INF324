<?php
$idusuario = $_SESSION['usuario'];
$numero = $_SESSION['nrotramite'];
if ($idusuario != ''){
    $consulta="select * from seguimiento where idproce='p2' and idusuario='".$idusuario."';";
    if($resultado=mysqli_query($conn, $consulta)){//verificamos que tenga seguimiento
        $rowcount=mysqli_num_rows($resultado);
        if($rowcount==0){//INICIAMOS SEGUIMIENTO 
            $sql="insert into seguimiento(nrotramite, idusuario, flujo, idproce) values(".$numero.", '".$idusuario."', 'f1', 'p2');";
            $resultado=mysqli_query($conn, $sql);
        }
    }
}else{
    header('Location: index.php');
}?>
<h3 align="center">Nombres de los Ejecutivos del frente</h3>
<br>
<br>
<label for="titular1">1er Titular Ejecutivo</label>
<input type="text" name="titular1" style="width: 270px;">
<label for="titular2" style="margin-left: 30px;">2do Titular Ejecutivo</label>
<input type="text" name="titular2" style="width: 250px;"><br>
<input type="file">
<br>
<br>
<center>
<h3>Su tramite tiene el número</h3>
<h2><?php echo "T00".$numero; ?></h2>
<h3>Click en siguiente para continuar</h3>
</center>

<br><br><br> 
