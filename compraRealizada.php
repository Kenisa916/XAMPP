<?php

include("scripts.php");
include("inises.php");

// Verificar si se está realizando una compra
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Iterar sobre los formularios recibidos
    foreach ($_POST as $key => $value) {
        // Filtrar solo los formularios de compras
        if (strpos($key, 'compra_') !== false) {
            $id_compra = substr($key, 7); // Obtener el índice único del formulario
            $producto = $_POST[$key]['productos'];
            $cantidad = $_POST[$key]['cantidad'];
            $precioUnitario = $_POST[$key]['precio'];

            // Escapar valores para prevenir inyección SQL
            $id_compra = mysqli_real_escape_string($conn, $id_compra);
            $correo = mysqli_real_escape_string($conn, $correo);
            $producto = mysqli_real_escape_string($conn, $producto);
            $cantidad = mysqli_real_escape_string($conn, $cantidad);
            $precioUnitario = mysqli_real_escape_string($conn, $precioUnitario);

            // Realizar la inserción en la tabla Compras
            $insertarCompra = "INSERT INTO Compras (id_compra, correo, producto, cantidad, precioTot)
                               VALUES ('$id_compra', '$correo', '$producto', '$cantidad', '$precioUnitario')";

            if (mysqli_query($conn, $insertarCompra)) {
                echo "Compra realizada con éxito";
            } else {
                echo "Error al realizar la compra: " . mysqli_error($conn);
            }

            // Cerrar la conexión
            mysqli_close($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="estilos.css">
        <title>MuscleBoost Palace</title>
        
    </head>
    <body>

        <div class="cabecera" id="myHeader">
            <div id="divlogo">
                <a href="index.php"><img src="MBP.png" alt="Logo Tienda"></a>
            </div>
            
            <div id="sesion">
                <button class="boton" onclick="location.href='index.php'" type="button">Volver</button>
            </div>

            <div id="borderBottom"></div>
        </div>

        <div class="contenido" id="contenido">
            <h1>Gracias por su compra, vuelva pronto</h1>
            <button class="boton" onclick="location.href='index.php'" type="button">Volver a la página principal</button>   
        </div>    

        <script>
            window.onscroll = function() {myFunction()};
            
            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;
            
            function myFunction() {
              if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
              } else {
                header.classList.remove("sticky");
              }
            }

        
        </script> 

    </body>
</html> 

