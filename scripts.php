<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MuscleBoost";

// Crear conexión primero sin base de datos para crearla si no existe
$conn = mysqli_connect($servername, $username, $password);

// Verificar la conexión
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Crear la base de datos
$sqlCrearBD = "CREATE DATABASE IF NOT EXISTS MuscleBoost";
if (mysqli_query($conn, $sqlCrearBD)) {
    echo"";
} else {
    echo "Error al crear la base de datos: " . mysqli_error($conn);
}

mysqli_close($conn);

// Nueva conexion con la base de datos asegurada
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Verificamos de nuevo la conexion
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Creacion tablas en la base de datos, primero la seleccionamos
mysqli_select_db($conn, "MuscleBoost");

// Creamos las tablas
$sqlCrearTablaUsuarios = "CREATE TABLE IF NOT EXISTS Usuarios (
    nombre varchar(15) not null,
    apellidos varchar(50) not null,
    correo varchar(100) primary key,
    contrasena varchar(255) not null
)";

if (mysqli_query($conn, $sqlCrearTablaUsuarios)) {
    echo"";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}

$sqlCrearTablaCompras = "CREATE TABLE IF NOT EXISTS Compras (
    id_compra int(6) UNSIGNED AUTO_INCREMENT primary key,
    /*correo varchar(100) not null,*/
    producto varchar(50) not null,
    cantidad int not null,
    precioTot double not null
    /*constraint fk_compra_usuarios foreign key (correo) references Usuarios(correo)*/
)";

if (mysqli_query($conn, $sqlCrearTablaCompras)) {
    echo"";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
