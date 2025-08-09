<?php
session_start();
include './conexion_faci.php';
$sql = "SELECT id_curso, nombre_curso FROM curso";
$resultado = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Postulación de Facilitador | Felix DEV</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3a0ca3;
      --accent-color: #4cc9f0;
      --light-color: #f8f9fa;
      --dark-color: #2b2d42;
      --success-color: #38b000;
      --danger-color: #ef233c;
      --gradient-bg: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: var(--gradient-bg);
      color: var(--dark-color);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
    
    .form-container {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 500px;
      padding: 40px;
      animation: fadeInUp 0.5s ease;
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }
    
    .form-header h2 {
      font-family: 'Montserrat', sans-serif;
      color: var(--secondary-color);
      font-size: 1.8rem;
      margin-bottom: 10px;
      position: relative;
      display: inline-block;
    }
    
    .form-header h2::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: var(--accent-color);
      border-radius: 2px;
    }
    
    .form-header p {
      color: var(--text-light);
      font-size: 0.95rem;
    }
    
    .form-group {
      margin-bottom: 25px;
      position: relative;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark-color);
    }
    
    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      font-family: 'Poppins', sans-serif;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }
    
    select.form-control {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%232b2d42' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 15px center;
      background-size: 12px;
    }
    
    .file-input-container {
      position: relative;
      margin-top: 10px;
    }
    
    .file-input-label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #f8f9fa;
      border: 2px dashed #dee2e6;
      border-radius: 8px;
      padding: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .file-input-label:hover {
      border-color: var(--primary-color);
      background-color: rgba(67, 97, 238, 0.05);
    }
    
    .file-input-text {
      display: flex;
      flex-direction: column;
    }
    
    .file-input-main {
      font-weight: 500;
      color: var(--dark-color);
    }
    
    .file-input-sub {
      font-size: 0.8rem;
      color: var(--text-light);
      margin-top: 5px;
    }
    
    .file-input-icon {
      color: var(--danger-color);
      font-size: 1.5rem;
    }
    
    .file-input {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      border: 0;
    }
    
    .pdf-badge {
      display: inline-flex;
      align-items: center;
      background-color: var(--danger-color);
      color: white;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
      margin-left: 8px;
    }
    
    .pdf-badge i {
      margin-right: 5px;
      font-size: 0.7rem;
    }
    
    .btn-submit {
      width: 100%;
      padding: 14px;
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      font-family: 'Montserrat', sans-serif;
    }
    
    .btn-submit:hover {
      background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
    }
    
    .file-name {
      margin-top: 10px;
      font-size: 0.85rem;
      color: var(--primary-color);
      font-weight: 500;
      display: none;
    }
    
    @media (max-width: 576px) {
      .form-container {
        padding: 30px;
      }
      
      .form-header h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

<div class="form-container">
  <div class="form-header">
    <h2>Postulación de Facilitador</h2>
    <p>Completa el formulario para postularte como facilitador</p>
  </div>
  
  <form action="envio_curriculum.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" name="estado" value="PENDIENTE">
    
    <div class="form-group">
      <label for="id_curso">Curso a postular</label>
      <select name="id_curso" id="id_curso" class="form-control" required>
        <option value="" disabled selected>Selecciona un curso...</option>
        <?php
          while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $fila['id_curso'] . "'>" . $fila['nombre_curso'] . "</option>";
          }
        ?>
      </select>
    </div>
    
    <div class="form-group">
      <label>Curriculum Vitae <span class="pdf-badge"><i class="fas fa-file-pdf"></i> PDF</span></label>
      <div class="file-input-container">
        <label for="archivo" class="file-input-label">
          <div class="file-input-text">
            <span class="file-input-main">Seleccionar archivo</span>
            <span class="file-input-sub">Tamaño máximo: 5MB</span>
          </div>
          <i class="fas fa-cloud-upload-alt file-input-icon"></i>
        </label>
        <input type="file" name="archivo" id="archivo" class="file-input" accept=".pdf" required>
        <div id="file-name" class="file-name"></div>
      </div>
    </div>
    
    <button type="submit" class="btn-submit">
      <i class="fas fa-paper-plane"></i> Enviar Postulación
    </button>
  </form>
</div>

<script>
  // Mostrar nombre del archivo seleccionado
  document.getElementById('archivo').addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name || 'Ningún archivo seleccionado';
    const fileNameElement = document.getElementById('file-name');
    
    fileNameElement.textContent = fileName;
    fileNameElement.style.display = 'block';
    
    // Cambiar color del borde cuando se selecciona un archivo
    const fileInputLabel = document.querySelector('.file-input-label');
    if(e.target.files.length > 0) {
      fileInputLabel.style.borderColor = '#4361ee';
      fileInputLabel.style.backgroundColor = 'rgba(67, 97, 238, 0.1)';
    } else {
      fileInputLabel.style.borderColor = '#dee2e6';
      fileInputLabel.style.backgroundColor = '#f8f9fa';
    }
  });
</script>

</body>
</html>