<?php 

session_start();
include_once("Connection.php");

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
		<a href="Index.php">Cadastrar</a>
	</div>
	<div class="formulario">
		<h1>PESQUISAR USUÁRIO</h1>

		<form method="POST" action="List.php">
			<input type="text" name="nome" placeholder="Informe o nome" required="nome"><br><br>
			<input type="submit" name="sendPesqUser" value="Pesquisar">
		</form><br><br>

		<?php 

		$sendPesqUser = filter_input(INPUT_POST, "nome", FILTER_SANITIZER_STRING);

		if ($sendPesqUser) {

			$name = filter_input(INPUT_POST, "nome", 	FILTER_SANITIZER_STRING);
			$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$name$'";
			$resultUser = mysqli_query($conn, $sql);

			while ($rowUser = mysqli_fetch_assoc($resultUser)) {

				echo "ID: " . $rowUser['id'] . "<br>";
				echo "Nome: " . $rowUser['nome'] . "<br>";
				echo "E-mail: " . $rowUser['email'] . "<br>";
				echo "Created: " . $rowUser['created'] . "<br>";
				echo "<a href='EditionUser.php?id" . $rowUser['id'] . "'>Editar</a><br>";
				echo "<a href='ProcessDeleteUser.php?id=" . $rowUser['id'] . "'>Apagar</a><br><hr>";
			}
		} 

		?>
		
	</div>
</body>

</html>