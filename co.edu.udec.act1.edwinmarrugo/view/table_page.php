<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles_grades.css">
    <title>Document</title>
</head>
<body>
	<button id="agregar-btn">Agregar</button>
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
            <tr>
		        <td>1</td>
		        <td>01/01/2023</td>
		        <td>John Doe</td>
		        <td>Jane Smith</td>
		        <td>Math</td>
		        <td>Computer Science</td>
		        <td>University of California, Los Angeles</td>
		        <td>Fall 2022</td>
		        <td>Homework 1</td>
		        <td>10%</td>
		        <td>9.5</td>
		        <td><button class="editar-btn">Editar</button></td>
		        <td><button class="eliminar-btn">Eliminar</button></td>
	        </tr>
		</tbody>
	</table>
	<script src="scripts.js"></script>
</body>
</html>
