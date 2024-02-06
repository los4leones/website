<?php

session_start();
include("ConexionBDD.php");

$conexion = new ConexionBDD();

// Datos de formulario  
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$phone = $_POST['phone_number'];

// Verificar que no exista el usuario
$sql = "SELECT COUNT(*) AS cnt 
        FROM user_register
        WHERE username = '$username' OR email = '$email'";

$res = $conexion->ejecutarConsulta($sql);
$row = $res->fetch_assoc();

if($row['cnt'] > 0){
    $_SESSION['mensaje'] = 'Error: El usuario o correo ya existe';
    header("Location: register.php");
    exit; 
}

// Cifrar contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);   

// Guardar usuario en BD 
$sql = "INSERT INTO user_register(first_name, last_name, address, phone_number, email, username, password)
        VALUES ('$first_name','$last_name','$address','$phone','$email','$username', '$hashed_password')";

$res = $conexion->insertar($sql);

if($res){
   $_SESSION['mensaje'] = 'Usuario registrado correctamente!';
   header("Location: forms.php");    
}else {
   $_SESSION['mensaje'] = 'Error al registrar usuario';
}

?>
