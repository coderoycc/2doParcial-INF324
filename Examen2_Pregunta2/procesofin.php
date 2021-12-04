<?php
    session_start();
    echo "<br><br>";
    echo "<h1 align='center'>Trámite T00".$_SESSION['nrotramite']." Ternimado</h1>";
    echo '<meta http-equiv="refresh" content="3; url=index.php">';
?>
<style>
    body{
        background: #8e9eab;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #eef2f3, #8e9eab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */    
        font-family: 'Roboto Condensed', sans-serif;
    }
</style>