<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Crear la base de datos
$sqlCrearBD = "CREATE DATABASE IF NOT EXISTS MuscleBoost";
if (mysqli_query($conn, $sqlCrearBD)) {
    echo "Base de datos creada exitosamente";
} else {
    echo "Error al crear la base de datos: " . mysqli_error($conn);
}

//Creacion tablas en la base de datos
//Seleccionamos la BD

mysqli_select_db($conn, "MuscleBoost");

//Creamos las tablas
$sqlCrearTablaUsuarios = "CREATE TABLE IF NOT EXISTS Usuarios (
    nombre varchar(15) not null,
    apellidos varchar(50) not null,
    correo varchar(100) primary key,
    contrasena varchar(20) not null
)";

if (mysqli_query($conn, $sqlCrearTablaUsuarios)) {
    echo "Tabla 'Usuarios' creada exitosamente";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}

$sqlCrearTablaCompras = "CREATE TABLE IF NOT EXISTS Compras (
    id_compra int primary key,
    correo varchar(100) not null,
    constraint fk_compra_usuarios foreign key (correo) references Usuarios(correo)
)";

if (mysqli_query($conn, $sqlCrearTablaCompras)) {
    echo "Tabla 'Compras' creada exitosamente";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}


// Cerrar la conexión
mysqli_close($conn);
?>