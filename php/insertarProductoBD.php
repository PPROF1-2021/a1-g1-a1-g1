<?php
session_start();
require './connectDataBase.php';
if (!empty($_POST) && isset($_SESSION['user'])) {

    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $unidadMedida = $_POST['unidadMedida'];
    $codigo = $_POST['codigo'];
    $idEmpresa = $_SESSION['user']['idEmpresas'];
    echo json_encode($_SESSION['user']);
    echo "IdEmpresa: $idEmpresa";
    $sql = "INSERT INTO Stock (Descripcion, Precio, Codigo, idUnidadMedida, idEmpresa, Cantidad) VALUES ('$descripcion', $precio, '$codigo', $unidadMedida, $idEmpresa, $cantidad)";

    if ($connection->query($sql)) {
        console_log("Producto: $descripcion, ingresado con exito");
    } else {
        console_log("Error: " . $sql . "<br>" . mysqli_error($connection));
    }
}
