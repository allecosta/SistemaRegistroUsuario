<?php

session_start();
include_once("connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$resultUser = mysqli_query($conn, $sql);
$rowUser = mysqli_fetch_assoc($resultUser); 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<div class="button">
		<a href="index.php">Cadastrar</a>
	</div>
	<div class="button">
		<a href="list.php">Listar</a><br>
	</div>
	<div class="form">
		<h1>Editar Usuário</h1>

		<?php 

		if (isset($_SESSION['msg'])) {

			echo $_SESSION['msg'];

			unset($_SESSION['msg']);
		}

		?>

		<form method="POST" action="processEditionUser.php">
			<input type="hidden" name="id" value="<?php echo $rowUser['id']; ?>">
			<input type="text" name="nome" placeholder="Informe o seu nome" value="<?php echo $rowUser['nome']; ?>"><br><br>
			<input type="email" name="email" placeholder="Informe o seu email" value="<?php echo $rowUser['email']; ?>"><br><br>
			<input type="submit" value="Editar">
		</form>
	</div>
</body>

</html>