<!DOCTYPE html>
<?php
include 'class/autoload.php';



$lp = Productos::listar();
//var_dump($lp);
//
//echo "<pre>";
//print_r($lp);
//echo "</pre>";


include './views/home.html';
