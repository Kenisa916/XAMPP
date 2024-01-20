

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
            echo "hola";
            // Iterar sobre los elementos de la compra
            foreach ($_POST['compra'] as $compra) {
        
                // Verificar si las claves 'productos' y 'cantidad' existen en cada elemento de compra
                if (isset($compra['productos'], $compra['cantidad'])) {
        
                    $producto = $compra['productos'];
                    $cantidad = $compra['cantidad'];
        
                    // Obtener el precio del producto de tu base de datos o directamente de la opción del formulario
                    // Aquí estoy utilizando la opción directa del formulario, pero en la práctica deberías obtenerlo de tu base de datos
                    $precio = $compra['precio'];
        
                    $precioTot = $precio * $cantidad;
        
                    $nuevaCompra = "INSERT INTO Compras (producto, cantidad, precioTot)
                        VALUES('$producto', $cantidad, $precioTot)";
        
                    if (mysqli_query($conn, $nuevaCompra)) {
                        echo "vadebo";
                    } else {
                        echo "novadebo";
                    }
                } else {
                    echo "Error: Datos de compra incompletos.";
                }
            }
        }

        mysqli_close($conn);
    ?>
</html> 

