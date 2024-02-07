<?php
/* @Matias Kranauer */

include '../class/autoload.php';

// Manejo de solicitudes POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    manejarSolicitudPOST();
} elseif (isset($_GET['add'])) {
    // Muestra el formulario para agregar un producto
    $categorias = Categorias::listar();
    include 'views/productos.html';
} else {
    // Manejo de otras solicitudes GET (listado de productos)
    $lista_pro = Productos::listar();
    echo json_encode($lista_pro);
}

function manejarSolicitudPOST() {
    if (empty($_POST["pNombre"]) || empty($_POST["pDescripcion"]) || empty($_POST["pPrecio"]) || empty($_POST["pCategoria"])) {
        // Si faltan campos obligatorios, devuelve una respuesta de error
        $response = array('success' => false, 'message' => 'Campos incompletos');
        echo json_encode($response);
        die();
    }

    // Lógica de carga de archivos
    $folder = __DIR__ . "/../assets/img/productos/";
    $nombre_archivo = md5($_FILES['pImagen']['tmp_name'] . date("Y-m-d H:i:s")) . "." . pathinfo($_FILES['pImagen']['name'], PATHINFO_EXTENSION);

    if (!move_uploaded_file($_FILES['pImagen']['tmp_name'], $folder . $nombre_archivo)) {
        die("No se pudo subir el archivo. Intente más tarde");
    }

    // Guardar el producto en la base de datos
    $miproducto = new Productos();
    $miproducto->nombre = $_POST['pNombre'];
    $miproducto->descripcion = $_POST['pDescripcion'];
    $miproducto->precio = $_POST['pPrecio'];
    $miproducto->categoria = $_POST['pCategoria'];
    $miproducto->imagen = $nombre_archivo;
    $miproducto->guardar();

    // Devolver una respuesta de éxito
    $response = array('success' => true, 'message' => 'Producto agregado correctamente', 'redirect' => 'home.html');
    echo json_encode($response);
    die();
}
