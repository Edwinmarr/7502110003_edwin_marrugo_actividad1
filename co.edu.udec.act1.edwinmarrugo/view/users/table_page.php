<?php
require_once "../../vendor/autoload.php";

session_start();
if (!isset($_SESSION['student'])) {
	header("Location: ../index.php");
}

$grades = $_SESSION['grades'];

	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles_grades.css">
	<link rel="stylesheet" type="text/css" href="../css/index-styles.css">
    <title>Document</title>
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
	<a href="addGrades.php">Agregar</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Fecha</th>
				<th>Estudiante</th>
				<th>Docente</th>
				<th>Asignatura</th>
				<th>Carrera</th>
				<th>Universidad</th>
				<th>Periodo</th>
				<th>Actividad evaluada</th>
				<th>Porcentaje</th>
				<th>Nota</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody id="tabla-body">
			<!-- Aquí irán los registros de la tabla -->
			<?php
			foreach ($grades as $grade) {
				echo "<tr>
						<td>$grade->id</td>
						<td>$grade->date</td>
						<td>$grade->name</td>
						<td>$grade->teacher</td>
						<td>$grade->subject</td>
						<td>$grade->carreer</td>
						<td>$grade->university</td>
						<td>$grade->period</td>
						<td>$grade->graded_activity</td>
						<td>$grade->percentage</td>
						<td>$grade->activity_grade</td>
						<td><a href='../../controller/StudentController.php?getEditForm=true&id=$grade->id'>Editar</a></td>
						<td><a href='../../controller/StudentController.php?delete=true&id=$grade->id'>Eliminar</a></td>
					</tr>";
			}
			?>
		</tbody>
	</table>
	<script src="scripts.js"></script>
</body>
</html>
