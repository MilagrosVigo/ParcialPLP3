<?php
// Verifica si se ha solicitado salir
if(isset($_GET['salir'])) {
    session_destroy();
    echo "<script>window.location='index.php';</script>";
}

// Verifica si se han enviado los datos del formulario
if(isset($_POST['nombre']) && isset($_POST['clave'])) {
    // Prepara la consulta SQL para evitar inyecciones SQL
    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    
    // Ejecuta la consulta
    $stmt->execute();
    
    // Verifica si se encontró algún usuario
    if($stmt->rowCount() != 0) {
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verifica la contraseña
        if(password_verify($_POST['clave'], $r['clave'])) {
            $_SESSION['id'] = $r['id'];
            $_SESSION['nombre_usuario'] = $r['nombre'];
            echo "<script>alert('Bienvenido: ".$_SESSION['nombre_usuario']."');</script>";
        } else {
            echo "<script>alert('Clave incorrecta.');</script>";
        }
    } else {
        echo "<script>alert('Verifique los datos.');</script>";
    }
    
    // Redirige al usuario a la página principal
    echo "<script>window.location='index.php';</script>";
}
?>
<section id="login" class="section">
    <h2>Iniciar Sesión</h2>
    <form action="index.php?modulo=mv_login" method="POST">
        <label for="login-username">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="login-password">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
</section>
