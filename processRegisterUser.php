<?php 

session_start();
include_once("connection.php");

$name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$sql = "INSERT INTO usuarios (nome, email, created) VALUES ('$name', '$email', NOW())";
$resultUser = mysqli_query($conn, $sql);

	if (mysqli_insert_id($conn)) {

		$_SESSION['msg'] = "<p style='color: green;'>Usuário Cadastrado com sucesso</p>";

		header("Location: index.php");

	} else {

		$_SESSION['msg'] = "<p style='color: red;'>Erro! Usuário não cadastrado.</p>";

		header("Location: index.php");

	}