<?php
$iniSes = false;

// if para que solo se ejecute al hacer submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['iniciar'])) {

    // Mediante el correo comprobamos que el usuario está en la tabla y obtenemos la contraseña asociada
    $correo = $_POST['correo'];
    $comprobarUsuario = "SELECT * FROM Usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conn, $comprobarUsuario);

    // Si el resultado es mayor que 0, el usuario está en la tabla
    if (mysqli_num_rows($resultado) > 0) {
        $filaUsuario = mysqli_fetch_assoc($resultado);
        $contraBD = $filaUsuario['contrasena'];

        // Comparamos la contraseña ingresada con la almacenada en la base de datos
        if (password_verify($_POST['contra'], $contraBD)) {
            $iniSes = true;

            echo "<script>
                    alert('Bienvenido de vuelta, {$filaUsuario['nombre']}');
                    window.location.href = 'index.php?iniSes=true';
                  </script>";
        } else {
            echo "<script>
                    document.getElementById('ini').style.display = 'block';
                    document.getElementById('iniError').innerHTML = 'Contraseña incorrecta';
                  </script>";
        }
    } else {
        echo "<script>
                    document.getElementById('ini').style.display = 'block';
                    document.getElementById('iniError').innerHTML = 'El correo no está registrado';
                  </script>";
    }
    unset($_POST['iniciar']);
}

echo "<script>var iniSes = " . json_encode($iniSes) . ";</script>";
?>
