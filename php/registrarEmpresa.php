<?php

// include_once './connectDataBase.php';

// Descomentar para cargar paises a base de datos


if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $nacimiento = $_POST['nacimiento'];
    $pais = $_POST['pais'];
    $provincia = $_POST['provincia'];
    $empresaNombre = $_POST['empresa-nombre'];
    $empresaDescripcion = $_POST['empresa-descripcion'];
    $pass = $_POST['password'];
    $codigoEmpresa = "";
    $sql = "INSERT INTO Empresas (Nombre, Descripcion, Codigo) VALUES ('$empresaNombre', '$empresaDescripcion', null);";
    
    if (mysqli_query($connection, $sql)) {
        console_log("Empresa registrada con exito");
        $lastId = $connection -> insert_id;
        $sql = "SELECT Codigo FROM Empresas WHERE idEmpresa = $lastId";
        $codigoEmpresa = $connection -> query($sql) -> fetch_assoc();

        $sql = "INSERT INTO Usuarios (Correo, Nombre, Apellido, Fecha_Nacimiento, Contraseña, EsPropietario, Provincia, idPaises, idEmpresas)
                VALUES ('$correo', '$nombre', '$apellido', '$nacimiento', '$pass', '1', '$provincia', $pais, $lastId);";
        if($connection -> query($sql)){
            console_log("Usuario registrado con exito");
        }
        else{
            console_log("Error: " . $sql . "<br>" . mysqli_error($connection));
        }
    
        $sql = "INSERT INTO Usuarios ";
    } else {
        console_log("Error: " . $sql . "<br>" . mysqli_error($connection));
    }

}
