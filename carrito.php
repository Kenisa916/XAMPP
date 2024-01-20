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
                <h2>Este es su carrito de la compra</h2>
                <p>Escoja los productos que desee comprar</p>
                <button onclick="anyadir()" class="boton">Pulse para añadir más productos<br></button>
                <br><br>
                <div class="ocultar">
                    <form id="compra" action="compraRealizada.php" method="post">
                        

                            <button onclick="eliminar(this)" class="boton">Eliminar</button>
                            <label for="productos[]">Elija un producto</label>
                            <select id="productos" name="compra[0][productos]" onchange="calcular()">
                                <option value="" disabled selected></option>
                                <option value="proteina500g" precio="29.99">Proteina - 500g</option>
                                <option value="proteina1kg" precio="59.99">Proteina - 1Kg</option>
                                <option value="shaker500" precio="3.99">Shaker - 500ml</option>
                                <option value="shaker700" precio="5.99">Shaker - 700ml</option>
                                <option value="bar1" precio="1.99">Barrita Energética 1</option>
                                <option value="bar2" precio="2.99">Barrita Energética 2</option>
                            </select>
                            <label for="cantidad[]">Cantidad:</label>
                            <input type="number" id="cantidad" name="compra[0][cantidad]" min="1" oninput="calcular()">
                            <p style="display: inline-block;">Precio: <span id="precio"></span>&euro;</p>
                            <br><br>

                            <input type="hidden" name="nombre_producto[]" id="nombreProducto" value="">
                            <input type="hidden" name="cantidad[]" id="cantidadProducto" value="">
                            <input type="hidden" name="precio[]" id="precioProducto" value="">
                    </form>    
            
                </div>
                <div id="carrito">

                </div>       
            
            <div class="precio">
                
                <p>Total <span id="total">0.00</span>&euro;</p>
                <input type="submit" value="Comprar" class="boton" name="botonComprar" onclick="comprar()">
            </div>
        </div>    

        <script>
            // Añade un producto a la compra
            function anyadir() {
                const node = document.getElementById("compra");
                const clone = node.cloneNode(true);
                //Cambio de id y de nombre de clase para agurpar solo los forms visibles
                clone.className = "lista";
                clone.id = "";
                //Añadimos el formulario al div con clase carrito
                document.getElementById("carrito").appendChild(clone);
                // Limpia los valores clonados
                clone.querySelector('#cantidad').value = 1;
                clone.querySelector('#productos').selectedIndex = 0;
                clone.querySelector('#precio').innerText = '';

                // Recalcula después de añadir
                calcular();
            }
        
            // Elimina un producto de la compra
            function eliminar(button) {
                var form = button.closest("form.lista");
                form.parentNode.removeChild(form);
                calcular(); // Vuelve a calcular cuando elimino un producto
            }
        
            // Calcula el precio de los productos y el precio total de la compra
            function calcular() {
                var forms = document.querySelectorAll('.lista');
                var total = 0;

                // Dentro de la función calcular()
                forms.forEach(function (form, index) {
                    var cantidad = form.querySelector('#cantidad').value;
                    var select = form.querySelector('#productos');
                    var nombreProducto = select.options[select.selectedIndex].text; // Obtener el nombre del producto
                    var precio = select.options[select.selectedIndex].getAttribute('precio');
                    var precioTotal = cantidad * precio;
                    total += precioTotal;

                    // Actualizar campos ocultos en el formulario actual
                    form.querySelector('#precio').innerText = precioTotal.toFixed(2);
                    form.querySelector('#nombreProducto').value = nombreProducto; // Guardar el nombre del producto
                    form.querySelector('#cantidadProducto').value = cantidad; // Guardar la cantidad
                    form.querySelector('#precioProducto').value = precio; // Guardar el precio
                });

                document.getElementById('total').innerText = total.toFixed(2);

            }
        
            // Enviar datos al servidor al realizar la compra
            // Dentro de la función comprar()
            function comprar() {
                var formularios = document.querySelectorAll('.lista');

                // Crear un nuevo formulario oculto
                var formularioOculto = document.createElement('form');
                formularioOculto.style.display = 'none';
                formularioOculto.action = 'compraRealizada.php';
                formularioOculto.method = 'post';

                formularios.forEach(function(form, index) {
                    var nombreProducto = form.querySelector('#nombreProducto').value;
                    var cantidad = form.querySelector('#cantidadProducto').value;
                    var precio = form.querySelector('#precioProducto').value;

                    // Crear campos ocultos para cada conjunto de datos
                    var inputNombreProducto = document.createElement('input');
                    inputNombreProducto.type = 'hidden';
                    inputNombreProducto.name = 'nombre_producto[]';
                    inputNombreProducto.value = nombreProducto;

                    var inputCantidad = document.createElement('input');
                    inputCantidad.type = 'hidden';
                    inputCantidad.name = 'cantidad[]';
                    inputCantidad.value = cantidad;

                    var inputPrecio = document.createElement('input');
                    inputPrecio.type = 'hidden';
                    inputPrecio.name = 'precio[]';
                    inputPrecio.value = precio;

                    // Agregar los campos ocultos al formulario oculto
                    formularioOculto.appendChild(inputNombreProducto);
                    formularioOculto.appendChild(inputCantidad);
                    formularioOculto.appendChild(inputPrecio);
                });

                // Agregar el formulario oculto al cuerpo del documento
                document.body.appendChild(formularioOculto);

                // Enviar el formulario oculto
                formularioOculto.submit();
            }
           
        </script>

    </body>
</html> 