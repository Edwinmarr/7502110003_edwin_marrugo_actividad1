<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
  <link rel="stylesheet" type="text/css" href="../css/register_styles.css">
</head>
<body>
  <div class="container">
    <form class="form">
      <h2>Registro</h2>
      <label for="nombres">Nombres:</label>
      <input type="text" id="nombres" name="nombres" required>
      
      <label for="apellidos">Apellidos:</label>
      <input type="text" id="apellidos" name="apellidos" required>

      <label for="identificacion">Número de identificación:</label>
      <input type="text" id="identificacion" name="identificacion" required>
      
      <label for="sexo">Sexo:</label>
      <select id="sexo" name="sexo" required>
        <option value="">Seleccione una opción</option>
        <option value="hombre">Hombre</option>
        <option value="mujer">Mujer</option>
        <option value="otro">Otro</option>
      </select>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>
      
      <label for="confirm-password">Confirmar contraseña:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      
      <input type="submit" value="Registrarse">
    </form>
  </div>
</body>
</html>