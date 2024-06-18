<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
        <h1>Login</h1>
    <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="logeo.php" method="post">
    	<input type="text" name="name" placeholder="Usuario">
    	<input type="password" name="contra" placeholder="Contraseña">
    	<input type="submit" name="register" >

    </form>
    <div class="button-container">
    <a href=".//log_google/index.php" class="button">Ingresar con Google</a><br>
    <a href="registrarse.php" class="button">Crear usuario</a><br>
    <a href="recovery.php" class="button">Olvido su contraseña?</a><br>
    <a href="borrar1.php" class button></a>
    </div>  
	
        <?php 
        include("logeo.php");
        ?>
</body>
</html>