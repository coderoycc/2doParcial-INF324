<?php
    include 'conexion.inc.php';
    $idusuario = $_POST['idusuario'];
    $pass = $_POST['pass'];
    $sql = "select * from usuarios where idusuario='".$idusuario."' and pass='".$pass."';";
    if($resultado=mysqli_query($conn, $sql)){
        $rowcount=mysqli_num_rows($resultado);//cantidad de registros obtenidos
        if($rowcount!=0){
            session_start();
            $_SESSION['usuario']=$idusuario;
            $sql = "select * from tramites where idusuario='".$idusuario."';";
            if($resultado=mysqli_query($conn, $sql)){//verificamos si tiene un tramite o no
                $rowcount=mysqli_num_rows($resultado);
                if($rowcount!=0){//tiene un tramite 
                    header('Location: panel.php');
                    /*if($resultado=mysqli_query($conn, $sql)){//verificamos que su tramite no haya terminado
                        $rowcount=mysqli_num_rows($resultado);
                        if($rowcount!=0){//No termino su tramite
                            //en donde se quedo?
                            $consulta = "select * from seguimiento where idusuario='".$idusuario."' and fecha_fin is NULL;";
                            if($resultado=mysqli_query($conn, $consulta)){
                                $fila=mysqli_fetch_array($resultado);
                                $proceso=$fila['idproce'];
                                $_SESSION['nrotramite'] = $fila['nrotramite'];
                                header('Location: desflujo.php?flujo=f1&proceso='.$proceso); 
                            }
                            
                            //header();
                        }else{//tiene un tramite pero ya lo termino
                            echo "<h1 align='center'>Usted ya terminó su tramite</h1>";
                            echo '<meta http-equiv="refresh" content="2; url=index.php">';                            
                        }
                    }*/
                }else{//no tiene tramite, creamos uno nuevo
                    $consulta = "insert into tramites(idusuario) values('".$idusuario."');";
                    $resultado=mysqli_query($conn, $consulta);
                    $numero=mysqli_insert_id($conn);
                    $_SESSION['nrotramite']=$numero;
                    header('Location: desflujo.php?flujo=f1&proceso=p1');
                    //echo $consulta;
                }
            }
        }else{//No esta en la base de datos
            echo "<h1 align='center'>Credenciales incorrectas</h1>";
            echo '<meta http-equiv="refresh" content="2; url=index.php">';            
        }
    }

    
    
?>