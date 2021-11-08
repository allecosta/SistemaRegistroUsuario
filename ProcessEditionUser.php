<?php 

session_start();
include_once("Connection.php");

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

$sql = "UPDATE usuarios SET nome='$name', email='$email', modified=NOW() WHERE id=$id";
$resultUser = mysql_query($conn, $sql);

	if (mysqli_affected_rows($conn)) {

		$_SESSION['msg'] = "<p style='color: green'>Usuário editado com sucesso</p>";

		header("Location: List.php");

	} else {

		$_SESSION['msg'] = "<p style='color: red'>Erro! Usuário não editado</p>";

		header("Location: List.php?id=$id");
	}