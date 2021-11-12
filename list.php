<?php 

session_start();
include_once("connection.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Listar</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<div class="button">
		<a href="index.php">Cadastrar</a><br>
	</div>
	<div class="button">
		<a href="search.php">Pesquisar</a><br>
	</div>

	<h1>LISTAR USUÁRIOS</h1>

	<?php

		if (isset($_SESSION['msg'])) {

			echo $_SESSION['msg'];

			unset($_SESSION['msg']);

		}

		$currentPage = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
		$page = (!empty($currentPage)) ? $currentPage : 1;

		$qtdeResultPage = 3;

		$initial = ($qtdeResultPage * $page) - $qtdeResultPage;

		$sql = "SELECT * FROM usuarios LIMIT $initial, $qtdeResultPage";
		$resultUser = mysqli_query($conn, $sql);

		while ($rowUser = mysqli_fetch_assoc($resultUser)) {

			echo "ID: " . $rowUser['id'] . "<br>";
			echo "Nome: " . $rowUser['nome'] . "<br>";
			echo "E-mail " . $rowUser['email'] . "<br>";
			echo "Created: " . $rowUser['created'] . "<br><br>";
			echo "<a href='processEditionUser.php?id=" . $rowUser['id'] . "'>Editar</a><br>";
			echo "<a href='processDeleteUser.php?id=" . $rowUser['id'] . "'>Apagar</a><br><hr>";

		}

		$sql = "SELECT COUNT(id) AS numResult FROM usuarios";
		$resultPage = mysqli_query($conn, $sql);
		$rowPage = mysqli_fetch_assoc($resultPage);
		$quantityPage = ceil($rowPage['numResult'] / $qtdeResultPage);

		$maxLinks = 5;

		echo "<a href='list.php?page=1'>Primeira</a> ";

		for ($pageAnt = $page - $maxLinks; $pageAnt <= $page - 1; $pageAnt++) {

			if ($pageAnt >= 1) {

				echo "<a href='list.php?page=$pageAnt' $pageAnt></a> ";
			}
		} 

		echo "$page ";

		for ($pageDep = $page + 1; $pageDep <= $page + $maxLinks; $pageDep++) {

			if ($pageDep <= $quantityPage) {

				echo "<a href='list.php?page=$pageDep'>$pageDep</a> ";
			}
		}

		echo "<a href='list.php?page=$quantityPage'>Ultima</a> ";

	?>

</body>

</html>