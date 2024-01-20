function comprar() {
    // Obtenemos los formularios
    var formularios = document.getElementsByClassName("lista");
    
    // Iterar sobre cada formulario
    for (var i = 0; i < formularios.length; i++) {
        var formulario = formularios[i];

        // Obtener el precio del producto seleccionado en este formulario
        var select = formulario.querySelector('#productos');
        var selectedOption = select.selectedOptions[0];

        // Verificar si hay una opción seleccionada
        if (selectedOption) {
            // Obtener el precio del producto seleccionado en este formulario
            var precio = selectedOption.getAttribute('precio');

            // Buscar el elemento de precio en el formulario actual
            var precioInput = formulario.querySelector('[name^="compra"][name$="[precio]"]');

            // Verificar si el elemento existe antes de establecer su valor
            if (precioInput) {
                precioInput.value = precio;
                
                // Llamar al método submit() del formulario
                formulario.submit();
            }
        }
    }
}

