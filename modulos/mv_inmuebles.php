<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sql = "SELECT * FROM inmuebles";
$stmt = $conn->prepare($sql); 
$stmt->execute();

$inmuebles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($inmuebles as $inmueble) {
    echo "Nombre: " . $inmueble['nombre'] . "<br>";
    echo "Descripción: " . $inmueble['descripcion'] . "<br>";
    echo "<img src='" . $inmueble['foto'] . "' alt='Imagen del inmueble' style='width:200px; height:auto;'><br><br>";
}

?>
