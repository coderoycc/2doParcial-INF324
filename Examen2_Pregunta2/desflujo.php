<html>
<head>
    <title>FLUJO DE PROCESO</title>
    <link rel="stylesheet" href="estilogeneral.css">
    <style><?php include 'estilos.css'; ?></style>     
</head>
<body>
    <h1>INSCRIPCIÓN DE FRENTES</h1>
    <div class="imagen">
        <img  src="info.png" alt="Facultad">
    </div>
    <?php
    session_start();
    include "conexion.inc.php";
    $proceso = $_GET['proceso'];
    
    $flujo=$_GET['flujo'];
    $sql="select * from flujoproceso where flujo='".$flujo."' and idproc='".$proceso."';";
    //echo $sql;
    $resultado = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_array($resultado);
    $btn = "Siguiente";
    if($fila['tipo'] == 'F'){
        $btn="Terminar";    
    }

    ?>
    <form action="motorflujo.php" method="GET">
        <div class="contenedor_vista">
            <?php include $fila['vista'].'.php'; ?>
        </div>
        <input type="hidden" value="<?php echo $flujo; ?>" name="flujo"/>
        <input type="hidden" value="<?php echo $proceso; ?>" name="proceso"/>
        <div class="contenedor_boton">
            <input class="boton" type="submit" value="Anterior" name="Anterior" />
            <input class="boton" type="submit" value="<?php echo $btn; ?>" name="<?php echo $btn; ?>" />
        </div>
        <br>
    </form>
</body>
</html>