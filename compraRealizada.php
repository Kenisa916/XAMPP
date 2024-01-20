

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

        // Verificar si se está realizando una compra
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si se han enviado formularios múltiples
            if (isset($_POST['nombre_producto'])) {
                // Obtener datos de los formularios
                $nombreProductos = $_POST['nombre_producto'];
                $cantidades = $_POST['cantidad'];
                $precios = $_POST['precio'];
        
                // Iterar sobre los formularios y procesar los datos
                for ($i = 0; $i < count($nombreProductos); $i++) {
                    $nombreProducto = $nombreProductos[$i];
                    $cantidad = $cantidades[$i];
                    $precio = $precios[$i];
                    $precioTot = $precio * $cantidad;
        
                    //Insertamos los datos recibidos
                    $insertar = "INSERT INTO compras (producto, cantidad, precioTot)
                    VALUES('$nombreProducto', $cantidad, $precioTot)";

                    if (mysqli_query($conn, $insertar)) {
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }



                    
                }
        
                
            } else {
                // No se han enviado formularios
            }
        } else {
            // No es una solicitud POST
        }

        mysqli_close($conn);
    ?>
</html> 

