<?php 

session_start();
include_once("connection.php");

$id = filter_input(INPUT_GET, "id" FILTER_SANITIZE_NUMBER_INT);

	if (!empyt) {
		
		$sql = "DELETE FROM usuarios WHERE id=$id";
		$resultUser = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn)) {

			$_SESSION['msg'] = "<p style='color: green;'>Usuário excluído com sucesso</p>";

			header("Location: List.php");

		} else {

			$_SESSION['msg'] = "<p style='color: red;'>Erro! Usuário não excluído</p>";

			header("Location: List.php");
		}
	}