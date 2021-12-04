<?php

$idusuario = $_SESSION['usuario'];
$numero = $_SESSION['nrotramite'];
if ($idusuario != ''){
    $consulta="select * from seguimiento where idproce='p1' and idusuario='".$idusuario."';";
    if($resultado=mysqli_query($conn, $consulta)){//verificamos que tenga seguimiento
        $rowcount=mysqli_num_rows($resultado);
        if($rowcount==0){//INICIAMOS SEGUIMIENTO 
            $sql="insert into seguimiento(nrotramite, idusuario, flujo, idproce) values(".$numero.", '".$idusuario."', 'f1', 'p1');";
            $resultado=mysqli_query($conn, $sql);
        }
    }
}else{
    header('Location: index.php');
}
?>
<html>

<style>
    h2{
        text-align: justify;
        color: #022b3a;
    }
    h3{
        margin-bottom:0px;
    }
    ol{
        list-style: square;
        margin: 0px;
    }
    li{
        padding: 5px;
        margin-left: 40px;
    }
    .lista{
        margin-top: 0px;
    }
</style>
<body>
    <h2>Convocatoria para frentes electorales Inicio 1 - Dic.</h2>
    <h3>Requisitos Documentales</h3>
    <div class="lista">
        <ol>
            <li>Fotocopia simple de matricula de cada uno de los integrantes del frente.</li>
            <li>Conformación de su cartera. (con cargos)</li>
            <li>Carta al Tribunal encargado de las eleciones.</li>
            <li>Plan de trabajo en formato PDF</li>
        </ol>
    </div>
    <h3>Requisitos de los integrantes del frente</h3>
    <div class="lista">
        <h4>Todo integrante: </h4>
        <ol>
            <li>Debe ser estudiante regular en la carrera.</li>
            <li>No debe ser parte de la federacion universitaria local.</li>
            <li>Debe tener vencido minimamente hasta el tercer semestre.</li>
            <li>No debe tener deuda con la universidad.</li>
            <li>No debe tener ningun cargo profesional.</li>
        </ol>
    </div>
    <h4>Nota: Todo presentar en formato digital. Click en 'SIGUIENTE'</h4>
</body>
</html>