<?php
session_start();

include("ConexionBDD.php");
$conexion = new ConexionBDD();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

// Intentar autenticar como administrador
$resultAdmin = $conexion->Consultar("SELECT c.prf_nombre, a.per_id, b.usp_clave FROM persona a INNER JOIN usuario_perfil b ON a.per_id = b.per_id INNER JOIN perfil c ON b.prf_id = c.prf_id WHERE b.usp_usuario = '".$username."'");

if ($resultAdmin->num_rows == 1) {
    $row = $resultAdmin->fetch_assoc();
    // Aquí deberías verificar la contraseña
    if ($password == $row['usp_clave']) { // Esta comparación es INSEGURA, usa password_verify con contraseñas hasheadas
        $_SESSION['user_id'] = $row['per_id'];   
        if ($row['prf_nombre'] == "Administrador") {
            header("Location: pagina_administracion.php");
            exit;
        }
    }
}

// Intentar autenticar como usuario no administrador
$resultUser = $conexion->Consultar("SELECT * FROM user_register WHERE username = '".$username."'");

if ($resultUser->num_rows == 1) {
    $row = $resultUser->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header("Location: pagina_cliente.php");
        exit();
    } else {
        $_SESSION['mensaje'] = "La contraseña no es correcta.";
        header("Location: forms.php"); // Redirigir de vuelta a la página de login
        exit();
    }
} else {
    $_SESSION['mensaje'] = "El nombre de usuario no existe.";
    header("Location: forms.php"); // Redirigir de vuelta a la página de login
    exit();
}


?>
