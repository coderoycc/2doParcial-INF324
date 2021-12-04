<?php
    session_start();
    include "conexion.inc.php";
    $flujo=$_GET['flujo'];
    $proceso = $_GET['proceso'];
    $idusuario=$_SESSION['usuario'];
    $numero=$_SESSION['nrotramite'];
    /*
    $numero=$_SESSION['numero'];
    date_default_timezone_set("America/La_Paz");
    $ahora= date("Y-m-d H:i:s");
    $ahora=strtotime('+0 hour', strtotime($ahora));
    $ahora=strtotime($tiempo, $ahora);
    $ahora=date("Y-m-d H:i:s", $ahora);

    $sql="INSERT INTO seguimiento(nro, proceso, usuario, fin) VALUES(".$numero.",'".$proceso."', '".$encargado."', '".$ahora."');";
    $resultado=mysqli_query($conn, $sql);
*/

    if(isset($_GET["Siguiente"])){
        //Actualizamos el seguimiento del proceso que terminó con fecha fin
        date_default_timezone_set("America/La_Paz");
        $ahora= date("Y-m-d H:i:s");
        $sql = "UPDATE seguimiento SET fecha_fin='".$ahora."' WHERE idproce='".$proceso."' and idusuario='".$idusuario."' and nrotramite=".$numero.";";
        $resultado=mysqli_query($conn, $sql);
        //Consultamos para el proceso Siguiente
        $sql="select * from flujoproceso where flujo='".$flujo."' and idproc='".$proceso."';";
        $resultado = mysqli_query($conn, $sql);
        $fila = mysqli_fetch_array($resultado);
        $procesosiguiente = $fila['procsig'];
        //FLUJO CONDICIONAL O PROCESO FINAL 
        if($fila['procsig']==null){
            if($fila['tipo']=='C'){//es condicional
                $contador=0;
                if(!empty($_GET['documento'])){
                    foreach($_GET['documento'] as $seleccionado){
                        $contador++;
                    }
                }
                $consulta="SELECT * FROM flujocondicionante where idproc='".$proceso."';";
                //echo $consulta."<br>";
                $resultado=mysqli_query($conn, $consulta);
                $fila=mysqli_fetch_array($resultado);
                if($contador==3){//verificamos que haya marcado todo
                    $procesosiguiente=$fila['idsi'];
                }else{
                    $procesosiguiente=$fila['idno'];
                }
                //echo $procesosiguiente."--------------".$contador;
            }else{//es un proceso final

            }
        }
        //Proceso de tipo almacenamiento
        if($fila['tipo']=='A'){
            if(!empty($_GET['nombre_p']) && !empty($_GET['sigla'])){
                $consulta = "INSERT INTO frentes(sigla, nombre_frente) VALUES('".$_GET['sigla']."', '".$_GET['nombre_p']."');";
                $resultado=mysqli_query($conn, $consulta);
            }
        }
        //redireccionamos al proceso siguiente
        header("Location: desflujo.php?flujo=".$flujo."&proceso=".$procesosiguiente);
    }
    if(isset($_GET["Terminar"])){
        date_default_timezone_set("America/La_Paz");
        $ahora= date("Y-m-d H:i:s");
        $sql = "UPDATE seguimiento SET fecha_fin='".$ahora."' WHERE idproce='".$proceso."' and idusuario='".$idusuario."' and nrotramite=".$numero.";";
        $resultado=mysqli_query($conn, $sql);
        $consulta = "UPDATE tramites SET fin='SI' WHERE nrotramite=".$numero.";";
        $resultado = mysqli_query($conn, $consulta);
        header("Location: procesofin.php");
    }
    if(isset($_GET["Anterior"])){
        //redireccionamos al proceso anterior
        if($proceso=='p1' || $proceso == 'p2'){
            header("Location: desflujo.php?flujo=f1&proceso=p1");
        }else{
            //Verificamos que no sea condicional
            
            $sql="select * from flujoproceso where flujo='".$flujo."' and procsig='".$proceso."';";
            $resultado = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($resultado);
            if($rowcount==0){//significa que es un proceso de flujo condicional
                $consulta="select * from flujocondicionante where idsi='".$proceso."' or idno='".$proceso."';";
                //echo $consulta;
                $resultado2=mysqli_query($conn, $consulta);
                $fila = mysqli_fetch_array($resultado2);
                $proceso=$fila['idproc'];
            }else{
                $fila = mysqli_fetch_array($resultado);
                $proceso=$fila['idproc'];
            }

            header("Location: desflujo.php?flujo=".$flujo."&proceso=".$proceso);
        }
    }
    
?>