<?php 

session_start();
include_once("connection.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Pesquisar</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<div class="button">
		<a href="index.php">Cadastrar</a>
	</div>
	<div class="form">
		<h1>PESQUISAR USUÁRIO</h1>

		<form method="POST" action="list.php">
			<input type="text" name="nome" placeholder="Informe o nome" required="nome"><br><br>
			<input type="submit" name="sendSearchUser" value="Pesquisar">
		</form><br><br>

		<?php 

		$sendSearchUser = filter_input(INPUT_POST, 'nome', FILTER_SANITIZER_STRING);

		if ($sendSearchUser) {

			$name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZER_STRING);
			$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$name%'";
			$resultUser = mysqli_query($conn, $sql);

			while ($rowUser = mysqli_fetch_assoc($resultUser)) {

				echo "ID: " . $rowUser['id'] . "<br>";
				echo "Nome: " . $rowUser['nome'] . "<br>";
				echo "E-mail: " . $rowUser['email'] . "<br>";
				echo "Created: " . $rowUser['created'] . "<br><br>";
				echo "<a href='editionUser.php?id" . $rowUser['id'] . "'>Editar</a><br>";
				echo "<a href='processDeleteUser.php?id=" . $rowUser['id'] . "'>Apagar</a><br><hr>";
			}
		} 

		?>
	
	</div>
</body>

</html>