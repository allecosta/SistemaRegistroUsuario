<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<div class="button">
	<a href="search.php">Pesquisar</a><br>
	</div>
	<div class="form">
		<h1>CADASTRAR USUÁRIO</h1>

		<?php 

			if (isset($_SESSION['msg'])) {

				echo $_SESSION['msg'];

				unset($_SESSION['msg']);
				
			}
		?>

		<form method="POST" action="processRegisterUser.php">
			<input type="text" name="nome" placeholder="Informe o nome completo" required="nome"><br><br>
			<input type="email" name="email" placeholder="Informe o seu e-mail" required="email"><br><br>
			<input type="submit" name="Cadastrar" value="Cadastrar">
		</form>
	</div>
</body>

</html>