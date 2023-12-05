<?php

include("Conexión.php");


// Create database
$sql = "CREATE DATABASE Prueba";
if (mysqli_query($conn, $sql)) {
  echo "\nDatabase created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>