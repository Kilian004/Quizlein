<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];
?>

<!doctype html>
	<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
		<title>Eigene Fragen</title>
	</head>
	
	<body>
	<h1>Quizlein</h1>
	<circle-button><a type="button" class="circle-button" href="profil.php" style="color:white" >Profil</a></circle-button>
		<table>
			<tr>
				
				<td><button id=profil><a href="profil.php"><?php echo $user ?></a></button></td><!-- Benutzername wird ausgegeben --> 
			</tr>
		</table>
		<div id=startLinks>
			<button><a type="button" class="button" href="startseite.php">Startseite</a></button>
			<button><a type="button" class="button" href="fragenset.php">Fragen beantworten</a></button>
			<button><a type="button" class="button" href="eigene_fragen.php">Eigene Fragen</a></button>
			<button><a type="button" class="button" href="spielerliste.php">Spielerliste</a></button>
			<button><a type="button" class="button" href="verwaltung.php">Verwaltung</a></button>
			<button><a type="button" class="button" href="hilfe.php">Hilfe</a></button>
			<button><a type="button" class="button" href="index.php">Abmelden</a></button>
		</div>
	</body>
	
</html>