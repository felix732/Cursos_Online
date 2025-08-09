<?php 
session_start();

// Verifica si el facilitador está autenticado y obtén su ID
if (isset($_SESSION['id'])) {
    $facilitador_id = $_SESSION['id'];

    include './conexion_faci.php';

    // Verifica si la conexión fue exitosa
    if ($connection->connect_error) {
        die("Error de conexión a la base de datos: " . $connection->connect_error);
    }

    $consulta = "UPDATE facilitador SET sesion_activa = 0 WHERE id = ?";
    $stmt = $connection->prepare($consulta);
    $stmt->bind_param("i", $facilitador_id);
    $stmt->execute();
    $stmt->close();

    
    session_destroy();

    
    $connection->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sesión Terminada</title>
    <style>
        body {
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.alert-container {
    text-align: center;
}

.custom-alert {
    background-color: #007bff;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

button {
    background-color: #fff;
    color: #007bff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
    border-radius: 5px;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div class="alert-container">
        <div class="custom-alert">
            <h2>Sesión Terminada</h2>
            <p>Tu sesión se ha cerrado con éxito Profesor.</p>
            <button onclick="redirigir()">Ir a la página de inicio</button>
        </div>
    </div>
    <script>
        function redirigir() {
            window.location.href = "../index.php"; 
        }
    </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
