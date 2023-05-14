<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../css/index-styles.css">
  <title>Index</title>
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
      <h2>Iniciar sesión</h2>
      <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Iniciar sesión" name = "action">
      </div>
    </form>
  </div>
</body>
</html>