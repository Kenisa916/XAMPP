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
                <a href="index.html"><img src="MBP.png" alt="Logo Tienda"></a>
            </div>
            
            <div id="sesion">
                <button class="boton" onclick="document.getElementById('ini').style.display='block'">Iniciar Sesión</button>
                <div id="ini" class="modal">
                    <span onclick="document.getElementById('ini').style.display='none'"
                  class="close" title="Cerrar">&times;</span>
                  
                    <!-- Modal Content -->
                    <form class="modal-content animate" action="/action_page.php">
                  
                      <div class="container">
                        <h2>Iniciar Sesión</h2>
                        <label for="correo"><b>Correo</b></label>
                        <input type="email" placeholder="Correo" name="correo" required>
                        <br><br>
                        <label for="contra"><b>Contraseña</b></label>
                        <input type="password" placeholder="Contraseña" name="contra" required>
                        <br><br>
                        <button type="submit">Login</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember"> Recuérdame
                        </label>
                      </div>
                      <br>
                      <div class="container">
                        <button type="button" onclick="document.getElementById('ini').style.display='none'" class="cancelbtn">Cancel</button>
                      </div>
                    </form>
                </div>     
                <button class="boton" onclick="document.getElementById('regi').style.display='block'">Registrarse</button>
                <div id="regi" class="modal">
                    <span onclick="document.getElementById('regi').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content" action="/action_page.php">
                      <div class="container">
                        <h1>Registro</h1>
                        <p>Rellene los campos para crear una cuenta</p>
                        <hr>
                        <label for="nombre"><b>Nombre</b></label>
                        <input type="text" placeholder="Tu nombre" name="nombre" required>
                        <br><br>
                        <label for="ape"><b>Apellidos</b></label>
                        <input type="password" placeholder="Tus apellidos" name="psw" required>
                        <br><br>
                        <label for="psw-repeat"><b>Correo</b></label>
                        <input type="text" placeholder="Repeat Password" name="psw-repeat" required>
                        <br>    <br>          
                        <div class="clearfix">
                          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                          <button type="submit" class="signupbtn">Sign Up</button>
                        </div>
                      </div>
                    </form>
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
            var modal = document.getElementById('regi');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script> 




    </body>
  
    <?php
        include ("scripts.php");
    ?>

</html> 
