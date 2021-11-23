<?php
require './php/connectDataBase.php';
$sql = "SELECT idPais, Nombre FROM Paises";
$paises = $connection->query($sql)->fetch_all();

echo "<script>
            const countryList =";
echo json_encode($paises, JSON_HEX_TAG);

echo "; var dropPais = document.getElementById('dropPais'); for(i = 1; i <= countryList.length; i++) {dropPais.options[i] = new Option(countryList[i-1][1], countryList[i-1][0]);}</script>";
