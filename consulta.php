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

                //Consulta el numero de filas de la tabla usuarios
                $consulUsu = "SELECT count(correo) as totalUsuarios FROM Usuarios";
                $resultUsu = mysqli_query($conn, $consulUsu);

                // Verifica si la consulta fue exitosa
                if ($resultUsu) {
                    $row = mysqli_fetch_assoc($resultUsu);
                    $totalUsuarios = $row['totalUsuarios'];
                    echo "<fieldset style='display: inline;'><legend><h3>Datos</h3></legend>Actualmente hay registrados " . $totalUsuarios . " usuario(s)!";
                } else {
                    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                }

                //Consulta el numero de filas de la tabla compras
                $consulComp = "SELECT count(id_compra) as totalCompras FROM Compras";
                $resultComp = mysqli_query($conn, $consulComp);

                // Verifica si la consulta fue exitosa
                if ($resultComp) {
                    $row = mysqli_fetch_assoc($resultComp);
                    $totalCompras = $row['totalCompras'];
                    echo "<br><br>Se han realizado " . $totalCompras . " compra(s)!</fieldset>";
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