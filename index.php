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
                <button class="boton" onclick="document.getElementById('ini').style.display='block'">Iniciar Sesión</button>
                <div id="ini" class="modal">
                    <span onclick="document.getElementById('ini').style.display='none'" class="close" title="Cancelar">&times;</span>
                  
                    <!-- Modal Content -->
                    <form class="modal-content animate" action="index.php" style="padding-right: 0px;">
                  
                      <div class="container">
                        <h2>Iniciar Sesión</h2>
                        <label for="correo"><b>Correo</b></label><br>
                        <input type="email" placeholder="Correo" name="correo" required>
                        <br><br>
                        <label for="contra"><b>Contraseña</b></label><br>
                        <input type="password" placeholder="Contraseña" name="contra" id="contra" required>
                        <br><br>
                        <input type="checkbox" onclick="myFunction()">Ver contraseña
                        <br><br>
                        <button type="submit">Confirmar</button>
                      
                        <button type="button" onclick="document.getElementById('ini').style.display='none'" class="cancelbtn">Cancelar</button>
                      </div>
                    </form>
                </div>    

                <div id="bienve" style="display: none;">
                    <p>Bienvenido <?php echo $_POST["nombre"]; ?></p>
                    <button type="submit">Close</button>
                </div>
                
                <button class="boton" onclick="document.getElementById('regi').style.display='block'">Registrarse</button>
                <div id="regi" class="modal">
                    <span onclick="document.getElementById('regi').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content" action="index.php" method="post">
                        <div class="container">
                            <h1>Registro</h1>
                            <p>Rellene los campos para crear una cuenta</p>
                            <hr>
                            <label><b>Nombre</b></label><br>
                            <input type="text" placeholder="Tu nombre" name="nombre" required>
                            <br><br>
                            <label><b>Apellidos</b></label><br>
                            <input type="text" placeholder="Tus apellidos" name="ape" required>
                            <br><br>
                            <label><b>Correo</b></label><br>
                            <input type="text" placeholder="Tu correo" name="correo" required>
                            <br><br>      
                            <label><b>Contraseña</b></label>
                            <br>
                            <input type="password" placeholder="Contraseña" name="contra" id="contra" required>
                            <br><br>
                            <input type="checkbox" onclick="myFunction()">Ver contraseña

                            <br><br>      
                            <div class="clearfix">
                                <button type="submit" class="signupbtn">Confirmar</button> 
                                <button type="button" onclick="document.getElementById('regi').style.display='none'" class="cancelbtn">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="bienve" style="display: none;">
                    <p>Bienvenido <?php echo $_POST["nombre"]; ?></p>
                    <button type="submit">Close</button>
                </div>
                  
            </div>

            <div class="carro">
                <a href="carrito.html"><img src="carrito.png" alt="Carrito"></a>
            </div>

            <div id="borderBottom"></div>
        </div>

        

        <div class="contenido">
            <div id="contCat">
                <h3 class="titCat">Categorias</h2>
                <button class="botCat active" onclick="filterSelection('todo')">Mostrar todo</button>
                <button class="botCat" onclick="filterSelection('nutri')">Nutrición Deportiva</button>
                <button class="botCat" onclick="filterSelection('alim')">Alimentación</button>
                <button class="botCat" onclick="filterSelection('acce')">Accesorios</button>
            </div>


            <div class="contArt">
                <div class="articulo nutri">
                    <img src="Articulos/Prote.jpeg" alt="">
                    <h2>Proteína - 1Kg</h2>
                    <p>59,99€</p>
                </div>
                <div class="articulo nutri">
                    <img src="Articulos/Prote.jpeg" alt="">
                    <h2>Proteína - 500g</h2>
                    <p>29,99€</p>
                </div>
                <div class="articulo acce">
                    <img src="Articulos/shaker.jpeg" alt="">
                    <h2>Shaker - 500ml</h2>
                    <p>3,99€</p>
                </div>
                <div class="articulo acce">
                    <img src="Articulos/shaker.jpeg" alt="">
                    <h2>Shaker - 700ml</h2>
                    <p>5,99€</p>
                </div>
                <div class="articulo alim">
                    <img src="Articulos/barri.jpeg" alt="">
                    <h2>Barrita Energética 1</h2>
                    <p>9,99€</p>
                </div>
                <div class="articulo alim">
                    <img src="Articulos/barri.jpeg" alt="">
                    <h2>Barrita Energética 2</h2>
                    <p>8,99€</p>
                </div>
            </div>
 

        </div>

        <script>
            //Header fijo

            window.onscroll = function() {pegarHeader()};
            
            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;
            
            function pegarHeader() {
              if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
              } else {
                header.classList.remove("sticky");
              }
            }
            
            //Filtro de productos

            filterSelection("todo")
            function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("articulo");
                if (c == "todo") c = "";
                // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
                for (i = 0; i < x.length; i++) {
                    w3RemoveClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                }
            }

            // Show filtered elements
            function w3AddClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                    }
                }
            }

            // Hide elements that are not selected
            function w3RemoveClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arr1.join(" ");
            }

            // Add active class to the current control button (highlight it)
            var btnContainer = document.getElementById("contCat");
            var btns = btnContainer.getElementsByClassName("botCat");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }

            //Inicio de sesion y registro

            // Get the modal para inicio
            var modal = document.getElementById('ini');

            //Modal para registro
            var modal2 = document.getElementById('regi');


            // When the user clicks anywhere outside of the modal, close it
            

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
                else if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }

            //funcion para alternar visibilidad de la contraseña
            function verContra() {
                var x = document.getElementById("contra");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            //mensaje de bienvenida
            var nextStep = document.querySelector('#nextStep');

            nextStep.addEventListener('click', function (e) {
                e.preventDefault();
                // Hide first view
                document.getElementById('my_form').style.display = 'none';

                // Show thank you message element
                document.getElementById('thank_you').style.display = 'block';
            });

           
        </script>




    </body>
  
    <?php
        include ("scripts.php");
        
    ?>

</html> 

