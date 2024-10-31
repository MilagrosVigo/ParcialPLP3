<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sql = "SELECT * FROM agentes"; 
$stmt = $conn->prepare($sql); 
$stmt->execute(); 

$agentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($agentes as $agente) { 
    echo "Agente: " . $agente['nombre'] . "<br>"; 
    echo "Descripción: " . $agente['descripcion'] . "<br>"; 
    echo "Foto: " . $agente['foto'] . "<br>"; 
    echo "<img src='" . $agente['foto'] . "' alt='Imagen del agente' style='width:200px; height:auto;'><br><br>";
}
