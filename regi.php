<?php
$registroCorrecto = false;

// if para que solo se ejecute al hacer submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {

    // Añadir Usuario mediante registro comprobando si ya está en la tabla o no

    $nombre = $_POST['nombre'];
    $ape = $_POST['ape'];
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    $comprobarExiste = "SELECT correo FROM Usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conn, $comprobarExiste);

    //Si el resultado es mayor que 0, está en la tabla y aparece un error, si no, se inserta en la tabla
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>
                document.getElementById('regi').style.display = 'block';
                document.getElementById('regiError').innerHTML = 'El correo ya está registrado.';
              </script>";
    } else {
        $insertarUsu = "INSERT INTO Usuarios (nombre, apellidos, correo, contrasena)
                        VALUES ('$nombre', '$ape', '$correo', '$contra')";

        
        
        if (mysqli_query($conn, $insertarUsu)) {
            
            $registroCorrecto = true;

            echo "<script>
                    document.getElementById('regi').style.display = 'none';
                    alert('Bienvenido, $nombre');
                  </script>";

            // Borra los valores de las variables
            $nombre = null;
            $ape = null;
            $correo = null;
            $contra = null;
        


        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

echo "<script>var registroCorrecto = " . json_encode($registroCorrecto) . ";</script>";

?>
