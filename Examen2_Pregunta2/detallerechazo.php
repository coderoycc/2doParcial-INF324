<?php
$idusuario = $_SESSION['usuario'];
$numero = $_SESSION['nrotramite'];
if ($idusuario != ''){
    $consulta="select * from seguimiento where idproce='p6' and idusuario='".$idusuario."';";
    if($resultado=mysqli_query($conn, $consulta)){//verificamos que tenga seguimiento
        $rowcount=mysqli_num_rows($resultado);
        if($rowcount==0){//INICIAMOS SEGUIMIENTO 
            $sql="insert into seguimiento(nrotramite, idusuario, flujo, idproce) values(".$numero.", '".$idusuario."', 'f1', 'p6');";
            $resultado=mysqli_query($conn, $sql);
        }
    }
}else{
    header('Location: index.php');
}
echo "<h2 align='center'>Notificación</h2>";
echo "<h2 align='center'>Debe presentar Carta al tribunal electoral de la carrera de Informática, Cartera del frente y los integrantes deben ser de la carrera de Informática.</h2>";
echo "<h3 align='center'>Comuníquese con 2-22287382</h3>";
echo "<h3 align='center'> Fin del trámite T00".$numero."</h3>";
?>