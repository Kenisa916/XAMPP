<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Crear la base de datos
$sqlCrearBD = "CREATE DATABASE IF NOT EXISTS MuscleBoost";
if ($conn->query($sqlCrearBD) === TRUE) {
    echo "";
} else {
    echo "";
}

//Creacion tablas en la base de datos
//Seleccionamos la BD

$conn->select_db($dbname);

//Creamos las tablas
$sqlCrearTablaUsuarios = "CREATE TABLE IF NOT EXISTS Usuarios (
    nombre varchar(15) not null,
    apellidos varchar(50) not null,
    correo varchar(100) primary key,
    contrasena varchar(20) not null

)";

// Cerrar la conexión
$conn->close();
?>