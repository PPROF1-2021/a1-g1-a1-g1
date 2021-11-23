<?php

// include_once './connectDataBase.php';

// Descomentar para cargar paises a base de datos
// require './php/cargarPaises.php';
if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $nacimiento = $_POST['nacimiento'];
    $pais = $_POST['pais'];
    $provincia = $_POST['provincia'];
    $pass = $_POST['password'];
    $cod = $_POST['codigo-empresa'];

    $sql = "SELECT idEmpresa FROM Empresas WHERE Codigo = '$cod';";
    console_log($cod);
    
    $res = $connection -> query($sql);

    console_log("Res regUser");
    $preID = $res -> fetch_all();
    

    if ($res) {
        console_log("Empresa selecionada con exito");
        $idEmpresa = $preID[0][0];

        $sql = "INSERT INTO Usuarios (Correo, Nombre, Apellido, Fecha_Nacimiento, Contraseña, EsPropietario, Provincia, idPaises, idEmpresas)
                VALUES ('$correo', '$nombre', '$apellido', '$nacimiento', '$pass', '0', '$provincia', $pais, $idEmpresa);";
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
