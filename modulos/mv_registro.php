<?php

if(isset($_POST['nombre']) && isset($_POST['clave'])) {
    
    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->execute();

    if($stmt->rowCount() != 0) {
        echo "<script>alert('Error: el usuario ya existe en la BD.');</script>";
    } else {
        
        $sql = "INSERT INTO usuarios (nombre, clave) VALUES (:nombre, :clave)";
        $stmt = $conn->prepare($sql);
        $hashedPassword = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':clave', $hashedPassword);

        if($stmt->execute()) {
            echo "<script>alert('Registro insertado con éxito');</script>";
        } else {
            echo "<script>alert('Error: no se pudo insertar el registro');</script>";
        }
    }

    
    echo "<script>window.location='index.php?modulo=mv_registro';</script>";
}
?>

<section id="registro" class="section">
    <h2>Registro</h2>
    <form action="index.php?modulo=mv_registro" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>
        
        <button type="submit">Registrarse</button>
    </form>
</section>
