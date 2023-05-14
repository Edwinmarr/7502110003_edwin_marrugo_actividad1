<?php
session_start();
if (isset($_SESSION['student'])) {
	header("Location: users/table_page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <link rel="stylesheet" type="text/css" href="css/index-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
				<li><a href="users/logout.php">Cerrar sesión</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>