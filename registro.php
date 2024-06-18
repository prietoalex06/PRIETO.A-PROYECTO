<?php 

include("conect.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['contra']) >= 1) {
        $name = mysqli_real_escape_string($conex, $_POST['name']);
        $email = mysqli_real_escape_string($conex, $_POST['email']);
        $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
        $contra = $_POST['contra'];

        $contra = password_hash($contra, PASSWORD_DEFAULT, array ('cost' => 10));

        $query = "SELECT * FROM datos WHERE nombre = '$name' OR email = '$email' OR telefono = '$telefono'";
        $result = mysqli_query($conex, $query);

        if (mysqli_num_rows($result) > 0) {
           ?>
            <h3 class="bad">¡Ups ha ocurrido un error, el nombre de usuario, email o teléfono ya existe!</h3>
            <?php
        } else {
            $consulta = "INSERT INTO datos(nombre, email, contra, telefono, fecha_reg) VALUES ('$name','$email', '$contra', '$telefono', NOW())";
            $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
               ?>
                <h3 class="ok">¡Te has inscripto correctamente!</h3>
                <?php
            } else {
               ?>
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                <?php
            }
        }
    } else {
       ?>
        <h3 class="bad">¡Por favor complete los campos!</h3>
        <?php
    }
}


?>