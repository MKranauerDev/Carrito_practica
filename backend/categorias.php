<?php
/* @Matias Kranauer */
//echo "<pre>";
//print_r($_POST);
//echo "</pre>"; die();

include '../class/autoload.php';

if(isset($_POST['accion']) && $_POST['accion'] == 'guardar'){    
    $miCategoria = new Categorias();
    $miCategoria->nombre = $_POST['categoria'];
    if ($miCategoria->guardar()){
        header("location: ".$_SERVER['SCRIPT_NAME']); // esto direcciona la url al script actual quitando el POST
    } else {
        die ("no se pudo realizar la accion. Vuelva a intentar más tarde");
    }
} else if(isset($_GET['add'])){
    include 'views/categorias.html';
    die();
}
$lista_ctg = Categorias::listar();
include 'views/lista_categorias.html';