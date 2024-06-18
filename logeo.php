<?php
$conex = mysqli_connect("localhost", "root", "", "registro"); 

$usuario = $_POST['name'];
$password = $_POST['contra'];

$sql = "SELECT * FROM datos WHERE nombre = '$usuario'";
$result = mysqli_query($conex, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['contra'];

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION["nombre"] = $usuario;
        header("Location: pag1.php");
    } else {
        echo "Contraseña incorrecta.";
    }
} 

mysqli_close($conex);
?>