<?php
require_once "../../vendor/autoload.php";

session_start();
if (!isset($_SESSION['student'])) {
	header("Location: ../index.php");
}
?>
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
			<a href="index.php">Calificaciones</a>
			<ul>
            <?php
                if (isset($_SESSION['studentName'])) {
            ?>
                <li class="login"><?php echo "".$_SESSION['studentName'];?></a></li>
				<li><a href="logout.php">Cerrar sesión</a></li>
            <?php
                }else{
            ?>
                <li class="login"><a href="users/login.php">Inicio de sesión</a></li>
				<li><a href="users/register.php">Registro</a></li>
            <?php
                }
            ?>
			</ul>
		</nav>
	</header>
  <div class="container">
    <form class="form" action="../../controller/StudentController.php" method="post">
      <h2>Agregar nota</h2>

      <label for="date">Fecha</label>
      <input type="date" id="date" name="date" required>

      <label for="docente">Docente</label>
      <input type="text" id="docente" name="teacher" required>
      
      <label for="asignatura">Asignatura</label>
      <input type="text" id="asignatura" name="subject" required>

      <label for="carreer">Carrera</label>
      <select id="carreer" name="carreer" required>
        <option value="">Seleccione una opción</option>
        <option value="Ing.Software">Ing.Software</option>
        <option value="Ing.Sistemas">Ing.Sistemas</option>
      </select>

      <label for="university">Universidad</label>
      <input type="text" id="university" name="university" required>
      
      <label for="period">Periodo</label>
      <select id="period" name="period" required>
        <option value="">Seleccione una opción</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>

      <label for="activityGraded">Actividad evaluada</label>
      <input type="text" id="activityGraded" name="graded_activity" required>
      
      <label for="percentage">Porcentaje:</label>
      <input type="text" id="percentage" name="percentage" required>
      
      <label for="grade">Nota</label>
      <input type="Text" id="grade" name="grade" required>
      
      <input type="submit" value="save" name="action">
    </form>
  </div>
</body>
</html>
