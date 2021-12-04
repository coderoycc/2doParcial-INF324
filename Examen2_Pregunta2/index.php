<html>
    <head>
        <title>ELECCIONES CEI</title>
    </head>
<style>
    body{
        font-family: 'Source Sans Pro', sans-serif;
        position: relative;
        
        font-size: 16px;
        background: #ffd89b;  
        background: -webkit-linear-gradient(to right, #19547b, #ffd89b);  
        background: linear-gradient(to right, #19547b, #ffd89b); 
    }
    h1{
        text-align: center;
        margin-top: 10px;
        color: #f3fafd;
        padding-top: 30px;
    }
    form{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: block;
        width: 100%;
        max-width: 400px;
        margin: 0;
        padding: 2.25em;
        box-sizing: border-box;
        border-radius: 0.5em;
        font-family: 'Source Sans Pro', sans-serif;
        background: rgba(0, 0, 70, 0.2);
    }
    form .inputGroup {
        margin: 0 0 2em;
        padding: 0;
        position: relative;
    }
    form .inputGroup:last-of-type {
        margin-bottom: 0;
    }
    form label {
        margin: 0 0 12px;
        display: block;
        font-size: 1.25em;
        color: #f3fafd;;
        font-weight: 700;
        font-family: inherit;
    }
    form input[type='email'], form input[type="text"], form input[type="number"], form input[type="url"], form input[type="search"], form input[type="password"] {
        display: block;
        margin: 0;
        padding: 0 1em 0;
        padding: 0.875em 1em 0;
        background-color: #f3fafd;
        border: solid 2px #217093;
        border-radius: 4px;
        -webkit-appearance: none;
        box-sizing: border-box;
        width: 100%;
        height: 65px;
        font-size: 1.55em;
        color: rgb(20, 40, 200);
        font-weight: 600;
        font-family: inherit;
        transition: box-shadow 0.2s linear, border-color 0.25s ease-out;
    }
    form input[type='email']:focus, form input[type="text"]:focus, form input[type="number"]:focus, form input[type="url"]:focus, form input[type="search"]:focus, form input[type="password"]:focus {
        outline: none;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, .1);
        border: solid 2px #4eb8dd;
    }
    form button {
        display: block;
        margin: 0;
        padding: 0.65em 1em 1em;
        background-color: #4eb8dd;
        border: none;
        border-radius: 4px;
        box-sizing: border-box;
        box-shadow: none;
        width: 100%;
        height: 65px;
        font-size: 1.55em;
        color: #fff;
        font-weight: 600;
        font-family: inherit;
        transition: background-color 0.2s ease-out;
    }
    form button:hover, form button:active {
        background-color: #217093;
    }
    form .inputGroup1 .helper {
        position: absolute;
        z-index: 1;
        font-family: inherit;
    }
    form .inputGroup1 .helper1 {
        top: 0;
        left: 0;
        transform: translate(1em, 2.2em) scale(1);
        transform-origin: 0 0;
        color:  rgb(20, 40, 160);
        font-size: 1.55em;
        font-weight: 400;
        opacity: 0.65;
        pointer-events: none;
        transition: transform 0.2s ease-out, opacity 0.2s linear;
    }
    form .inputGroup1.focusWithText .helper {
        transform: translate(1em, 1.55em) scale(0.6);
        opacity: 1;
    }
    form .inputGroup2 input[type="password"] {
        padding: 0.4em 1em 0.5em;
    }
    form .inputGroup2 input[type="text"] {
        padding: 0.025em 1em 0;
    }
    form .inputGroup2 #showPasswordToggle {
        display: block;
        padding: 0 0 0 1.45em;
        position: absolute;
        top: 0.25em;
        right: 0;
        font-size: 1em;
    }
    form .inputGroup2 #showPasswordToggle input {
        position: absolute;
        z-index: -1;
        opacity: 0;
    }
    form .inputGroup2 #showPasswordToggle .indicator {
        position: absolute;
        top: 0;
        left: 0;
        height: 0.85em;
        width: 0.85em;
        background-color: #f3fafd;
        border: solid 2px #217093;
        border-radius: 3px;
    }
    form .inputGroup2 #showPasswordToggle .indicator:after {
        content: "";
        position: absolute;
        left: 0.25em;
        top: 0.025em;
        width: 0.2em;
        height: 0.5em;
        border: solid #217093;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
        visibility: hidden;
    }
    form .inputGroup2 #showPasswordToggle input:checked ~ .indicator:after {
        visibility: visible;
    }
    form .inputGroup2 #showPasswordToggle input:focus ~ .indicator, form .inputGroup2 #showPasswordToggle input:hover ~ .indicator {
        border-color: #4eb8dd;
    }
    form .inputGroup2 #showPasswordToggle input:disabled ~ .indicator {
        opacity: 0.5;
    }
    form .inputGroup2 #showPasswordToggle input:disabled ~ .indicator:after {
        visibility: hidden;
    }
</style>
<body>
<h1>Bienvenido registro elecciones CEI</h1>
<form method="POST" action='ingreso.php'>
	<center>
		<img src="info.png" alt="HOLA" class="imagen" width='160px'>
	</center>
	<br>	
	<div style="color: red;">
		<!--<h2><?php //echo $mensaje; ?></h2>-->
	</div>
	<div class="inputGroup inputGroup1">
		<label for="idusuario" id="loginEmailLabel">Usuario</label>
		<input type="password" maxlength="254" name="idusuario"/>
		<p class="helper helper1"></p>
	</div>
	<div class="inputGroup inputGroup2">
		<label>Contraseña</label>
		<input type="password" id="loginPassword" name="pass"/>
	</div>
	<div class="inputGroup inputGroup3">
		<button id="login">Entrar</button>
	</div>	
</form>
</body>
</html>