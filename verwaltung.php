<?php
session_start();
//überprüfen ob schon angemeldet
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];//Name des angemeldeten Benutzers wird gespeichert
if($_SESSION['rank']=="schrott"){//prüfen ob Mod Rechte
header('Location: keineRechte.php'); //weiterleiten auf KeineRechte
}
	
?>

<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
		<title> Verwaltung </title>
	</head>
	<body>
	</body
 </html>