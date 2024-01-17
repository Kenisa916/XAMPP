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
            <h1>Estadisticas de nuestra página web:</h1>
            <?php
                include("scripts.php");

                $consulUsu = "SELECT count(correo) as totalUsuarios FROM Usuarios";
                $result = mysqli_query($conn, $consulUsu);

                // Verifica si la consulta fue exitosa
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $totalUsuarios = $row['totalUsuarios'];
                    echo "Actualmente hay registrados " . $totalUsuarios . " usuarios!";
                } else {
                    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                }
            ?>
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