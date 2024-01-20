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

// Verificar si el formulario de inicio de sesión fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['iniciar'])) {

    // Obtener el correo y la contraseña del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contra'];

    // Consultar la base de datos para verificar si el correo está registrado
    $comprobarUsuario = "SELECT * FROM Usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conn, $comprobarUsuario);

    // Si el resultado es mayor que 0, el usuario está en la tabla
    if (mysqli_num_rows($resultado) > 0) {
        $filaUsuario = mysqli_fetch_assoc($resultado);
        $contraBD = $filaUsuario['contrasena'];

        // Comparamos la contraseña ingresada con la almacenada en la base de datos
        if (password_verify($contrasena, $contraBD)) {
            //Si coinciden

            // Mostrar mensaje de bienvenida
            echo "<script>
                    alert('Bienvenido de vuelta, {$filaUsuario['nombre']}');
                    window.location.href = 'index.php?iniSes=true';
                  </script>";
        } else {
            // Mostrar mensaje de contraseña incorrecta en el modal de inicio de sesión
            echo "<script>
                    document.getElementById('ini').style.display = 'block';
                    document.getElementById('iniError').innerHTML = 'Contraseña incorrecta';
                  </script>";
        }
    } else {
        // Mostrar mensaje de correo no registrado en el modal de inicio de sesión
        echo "<script>
                    document.getElementById('ini').style.display = 'block';
                    document.getElementById('iniError').innerHTML = 'El correo no está registrado';
                  </script>";
    }
    unset($_POST['iniciar']);
}

mysqli_close($conn);
?>
