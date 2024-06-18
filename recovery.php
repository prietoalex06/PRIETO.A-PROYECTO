<!DOCTYPE html>
<html>
<head>
    <title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="center">

        <h1>Recovery</h1>
        <?php
        include("conect.php");
        if (isset($_POST['email'])) {
            $email = mysqli_real_escape_string($conex, $_POST['email']);
            $sSql = "SELECT email FROM datos WHERE email = '$email'";
            $result = mysqli_query($conex, $sSql);
            if (mysqli_num_rows($result) == 1) {
              ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="email" value="<?php echo $email;?>">
                <br><br>
                Contraseña <br>
                <input type="password" name="contranew"> <br>
                <input type="submit" value="actualizar">
                </form>
                <?php
            } else {
                echo "Email no encontrado";
            }
        } else {
           ?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <button type="submit">Recuperar contraseña</button>
            </form>
            <?php
        }

        if (isset($_POST['contranew'])) {
            $email = mysqli_real_escape_string($conex, $_POST['email']);
            $contranew = password_hash($_POST["contranew"], PASSWORD_DEFAULT);
            $sSql = "UPDATE datos SET contra='$contranew' WHERE email = '$email'";
            if (mysqli_query($conex, $sSql)) {
                echo "Contraseña actualizada correctamente";
            } else {
                echo "Error al actualizar contraseña: ". mysqli_error($conex);
            }
        }

        mysqli_close($conex);
       ?>
        <a href="index.php"class="button">Volver</a>
    </div>
   
</body>
</html>