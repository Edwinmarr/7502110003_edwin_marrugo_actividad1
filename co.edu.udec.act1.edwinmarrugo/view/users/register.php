<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link rel="stylesheet" type="text/css" href="../css/index-styles.css">
    <link rel="stylesheet" type="text/css" href="../css/register_styles.css">
</head>
<body>
  <header>
		<nav class="navbar">
			<a href="../index.php">Calificaciones</a>
			<ul>
        <li class="login"><a href="login.php">Inicio de sesión</a></li>
				<li><a href="register.php">Registro</a></li>
			</ul>
		</nav>
	</header>
  <div class="container">
    <form class="form" action="../../controller/StudentController.php" method="post">
      <h2>Registro</h2>
      <label for="nombres">Nombres:</label>
      <input type="text" id="nombres" name="name" required>
      
      <label for="apellidos">Apellidos:</label>
      <input type="text" id="apellidos" name="lastName" required>

      <label for="apellidos">Tipo de identificación:</label>
      <select id="tipo_identificacion" name="typeId" required>
        <option value="">Seleccione una opción</option>
        <option value="CC">Cédula de ciudadanía</option>
        <option value="TI">Tarjeta de identidad</option>
        <option value="CE">Cédula de extranjería</option>
      </select>

      <label for="identificacion">Número de identificación:</label>
      <input type="text" id="identificacion" name="idNumber" required>
      
      <label for="sexo">Sexo:</label>
      <select id="sexo" name="sex" required>
        <option value="">Seleccione una opción</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="O">Otro</option>
      </select>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>
      
      <label for="confirm-password">Confirmar contraseña:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      
      <input type="submit" value="register" name="action">
    </form>
  </div>
</body>
</html>