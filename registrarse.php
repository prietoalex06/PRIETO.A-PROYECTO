<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form method="post">
    	<h1>Registro</h1>
    	<input type="text" name="name" placeholder="Nombre Completo">
        <input type="email" name="email" placeholder="Email">
    	<input type="password" name="contra" placeholder="Contraseña">
        <input type="text" name="telefono" placeholder="Telefono">
    	<input type="submit" name="register" >
    </form>
    <?php

        $pass_hash= "";
        if(isset($_POST["contra"])){
            $pass_hash.=password_hash($_POST["contra"], PASSWORD_DEFAULT);
        }
    include("registro.php");
    ?>
<a href="index.php" class="button">Volver al inicio</a>
</body>
</html>