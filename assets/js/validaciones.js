// alert("se cargó el archivo");

$("#form_categorias").submit (function () {
    var nombre = $("#categorias").val();

    if($.trim(nombre) ===''){
        alert("Debe ingresar la categoría");
        return false;
    }
    return true;
});

$("#form_productos").submit(function(){
    var producto = $("#pNombre").val();
    var descripcion = $("#pDescripciones").val();
    var precio = $("#pPrecio").val();
    var categoria = $("#pCategorias").val();

    var errores = [];

    if($.trim(producto) === ''){    
        if($.trim(descripcion) === '')
            errores.push("Debe ingresar el descripción");

        //if($.trim(precio) === '')
        //    errores.push("Debe ingresar el precio");

        if($.trim(categoria) === '')
            errores.push("Debe ingresar el categoria");

        if(errores.length > 0)
            errores.push("Matias Kranauer");
            alert(errores.join("\n"));
            return false;    
    }
        return true;
});