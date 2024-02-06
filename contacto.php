<?php

// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root", "", "4leonesdb") or die("Problemas en la conexión");

// Verificar conexión
if(!$conn){
    die("Error de conexión: " . mysqli_connect_error());
}

// Recuperar los datos del formulario
$nombre = $_POST['name'];
$apellido = $_POST['surname'];
$email = $_POST['email'];
$asunto = $_POST['subject'];
$mensaje = $_POST['message'];

// Sanitizar entradas para evitar inyección SQL
$nombre = mysqli_real_escape_string($conn, $nombre);
$apellido = mysqli_real_escape_string($conn, $apellido);
$email = mysqli_real_escape_string($conn, $email);
$asunto = mysqli_real_escape_string($conn, $asunto);
$mensaje = mysqli_real_escape_string($conn, $mensaje);

// Insertar datos en la tabla contacto
$sql = "INSERT INTO contacto (nombre, apellido, email, asunto, mensaje) 
        VALUES ('$nombre', '$apellido', '$email', '$asunto', '$mensaje')";
        
if(mysqli_query($conn, $sql)){
    header("Location: contact.php?success=1"); // Redirecciona con parámetro
} else {
    echo "Error: " . mysqli_error($conn);
    }

// Cerrar conexión
mysqli_close($conn);
?>
