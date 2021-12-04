<?php
$idusuario = $_SESSION['usuario'];
$numero = $_SESSION['nrotramite'];
if ($idusuario != ''){
    $consulta="select * from seguimiento where idproce='p5' and idusuario='".$idusuario."';";
    if($resultado=mysqli_query($conn, $consulta)){//verificamos que tenga seguimiento
        $rowcount=mysqli_num_rows($resultado);
        if($rowcount==0){//INICIAMOS SEGUIMIENTO 
            $sql="insert into seguimiento(nrotramite, idusuario, flujo, idproce) values(".$numero.", '".$idusuario."', 'f1', 'p5');";
            $resultado=mysqli_query($conn, $sql);
        }
    }
}else{
    header('Location: index.php');
}
$consulta = "SELECT * FROM frentes;";
$resultado = mysqli_query($conn, $consulta);
?>
<div class="caja">
    <h2 align="center">ELECIONES CEI 2021</h2>
    <h2 align="center">Papeleta de Votación</h2>
    <?php
    while($fila=mysqli_fetch_array($resultado)){
        echo "<div class='cajita'>";
        echo "<h2 class='frente'>".$fila['sigla']."</h2>";
        echo "<p class='text'>".$fila['nombre_frente']."</p>";
        echo "</div>";
    }
    ?>  
</div>
<br>   <br>
<center>
    <input type="checkbox" name="acepta"><label for="acepta"> ¿De Acuerdo? </label>
</center>
    <br><br>