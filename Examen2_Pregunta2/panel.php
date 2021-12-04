<?php
session_start();
$idusuario = $_SESSION['usuario'];
//Conectamos a la base de datos
include 'conexion.inc.php';

$query='SELECT s.nrotramite, u.nombre, s.idproce, s.fecha_inicio, s.fecha_fin FROM seguimiento s, usuarios u where s.idusuario=u.idusuario and s.idusuario = '.$idusuario.';';
$resultado = mysqli_query($conn, $query);

?>
<html>
<head>
    <title>PANEL SEGUIMIENTO</title>
</head>
<body>
<style>
    html, body {
        height: 100%;
    }
    body {
        margin: 0;
        background: #8e9eab;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #eef2f3, #8e9eab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */    
        font-family: sans-serif;
        font-weight: 100;
    }
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    th,td {
        padding: 15px;
        background-color: rgba(255,255,255,0.2);
    }
    th {
        text-align: left;
        color: #0099cc;
    }
    td{
        color:#0f2831;
    }
    thead {
        th {
            background-color: #55608f;
        }
    }
    tbody {
        tr {
            &:hover {
                background-color: rgba(255,255,255,0.3);
            }
        }
        td {
            position: relative;
            &:hover {
                &:before {
                    content: "";
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: -9999px;
                    bottom: -9999px;
                    background-color: rgba(255,255,255,0.2);
                    z-index: -1;
                }
            }
        }
    }
    a{
        text-decoration: none;
        color: #010101;
        font-weight: bold;
    }
    a.boton{
        color: #0099cc;
        background: transparent;
        border: 2px solid #0099cc;
        border-radius: 6px;
        text-decoration: none;
        text-transform:uppercase;
        padding: 10px 32px;
        font-size: 25px;
    }
</style>
<div class="container">
<h1 align="center">SEGUIMIENTO DE SU TRÁMITE</h1>
<center>
    <a href="index.php" class="boton">SALIR</a></b>
<center>
<br>
	<table>
		<thead>
			<tr>
				<th>NRO. TRAMITE</th>
                <th>NOMBRE</th>
				<th>ID PROCESO</th>
				<th>FECHA INICIO</th>
				<th>FECHA FIN</th>
				<th>OPCIONES</th>
			</tr>
		</thead>
		<tbody>
        <?php
        $variable=0;
        while($fila=mysqli_fetch_array($resultado)){
            echo "<tr>";
                echo "<td>T00".$fila['nrotramite']."</td>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['idproce']."</td>";
                echo "<td>".$fila['fecha_inicio']."</td>";
                echo "<td>".$fila['fecha_fin']."</td>";
                echo '<td><a href="desflujo.php?flujo=f1&proceso='.$fila['idproce'].'">MOSTRAR</a></td>';
            echo "</tr>";
            $variable=$fila['nrotramite'];
        }
        $_SESSION['nrotramite']=$variable;
        ?>
		</tbody>
    </table>
    <br>

</div>
</body>
</html>