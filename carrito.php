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
            <div>
                <h2>Este es su carrito de la compra</h2>
                <p>Escoja los productos que desee comprar</p>
                <button onclick="anyadir()" class="boton">Pulse para añadir más productos<br></button>
                <br><br>
                <div class="ocultar">
                    <form action="compraRealizada.php" method="post" id="compra_<?php echo time(); ?>">
                        <button onclick="eliminar(this)" class="boton">Eliminar</button>
                        <label for="productos">Elija un producto</label>
                        <select id="productos" name="productos" onchange="calcular()">
                            <option value="" disabled selected></option>
                            <option value="proteina500g" precio="29.99">Proteina - 500g</option>
                            <option value="proteina1kg" precio="59.99">Proteina - 1Kg</option>
                            <option value="shaker500" precio="3.99">Shaker - 500ml</option>
                            <option value="shaker700" precio="5.99">Shaker - 700ml</option>
                            <option value="bar1" precio="1.99">Barrita Energética 1</option>
                            <option value="bar2" precio="2.99">Barrita Energética 2</option>
                        </select>
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" min="1" oninput="calcular()">
                        <p style="display: inline-block;">Precio: <span id="precio"></span>&euro;</p>
                        <br><br>
                    </form>    
                </div>             
            </div>       
            
            <div class="precio">
                
                <p>Total <span id="total">0.00</span>&euro;</p>
                <input type="submit" form="compra_<?php echo time(); ?>" value="Comprar" class="boton"/>
            </div>
        </div>    

        <script>
            // Añade un producto a la compra
            function anyadir() {
                const node = document.getElementById("compra_<?php echo time(); ?>");
                const clone = node.cloneNode(true);
                clone.id = "compra_" + new Date().getTime();
                document.getElementById("contenido").appendChild(clone);
            }
        
            // Elimina un producto de la compra
            function eliminar(button) {
                var form = button.closest("form");
                form.parentNode.removeChild(form);
                calcular(); // Vuelve a calcular cuando elimino un producto
            }
        
            // Calcula el precio de los productos y el precio total de la compra
            function calcular() {
                var productos = document.querySelectorAll('form');
                var total = 0;
        
                productos.forEach(function (producto) {
                    var cantidad = producto.querySelector('#cantidad').value;
                    var select = producto.querySelector('#productos');
                    var precio = select.options[select.selectedIndex].getAttribute('precio');
                    var precioTotal = cantidad * precio;
                    total += precioTotal;
                    producto.querySelector('#precio').innerText = precioTotal.toFixed(2);
                });
        
                document.getElementById('total').innerText = total.toFixed(2);
            }
        
            // Enviar datos al servidor al realizar la compra
            function comprar() {
                var productos = document.querySelectorAll('form');
                productos.forEach(function (producto) {
                    producto.submit();
                });
            }
        </script>

    </body>
</html> 
