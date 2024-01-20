<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MuscleBoost";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

// if para que solo se ejecute al hacer submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {

    // Añadir Usuario mediante registro comprobando si ya está en la tabla o no
    $nombre = $_POST['nombre'];
    $ape = $_POST['ape'];
    $correo = $_POST['correo'];
    $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT);

    $comprobarExiste = "SELECT correo FROM Usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conn, $comprobarExiste);

    //Si el resultado es mayor que 0, está en la tabla y aparece un error, si no, se inserta en la tabla y se muestra un mensaje de bienvenida
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>
                document.getElementById('regi').style.display = 'block';
                document.getElementById('regiError').innerHTML = 'El correo ya está registrado.';
              </script>";
    } else {
        $insertarUsu = "INSERT INTO Usuarios (nombre, apellidos, correo, contrasena)
                        VALUES ('$nombre', '$ape', '$correo', '$contra')";

        if (mysqli_query($conn, $insertarUsu)) {
            
            echo "<script>
                alert('Bienvenido, $nombre');
                window.location.href = 'index.php?registroCorrecto=true';
                </script>";

            exit();

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    unset($_POST['registro']);
}

mysqli_close($conn);
?>
