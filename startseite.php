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
		<title> Quiz Startseite </title>
	</head>
	<body>
	<!- Passender Hintergrund
		Überschrift in die Mitte / Passende Frabe
		Passende FrabePassende Schriftfarbe
		Buttons gleich groß
		Buttons größer
		-> 
		<table>
			<tr>
				<td><h1>Quizlein</h1> </td>
				<td><button id=profil><a href="profil.php"><?php echo $user ?></a></button></td>
			</tr>
		</table>
		<div id=startLinks>
			<button><a href="startseite.php">Startseite</a></button>
			<button><a href="fragenset.php">Fragenset</a></button>
			<button><a href="eigene_fragen.php">Eigene Fragen</a></button>
			<button><a href="spielerliste.php">Spielerliste</a></button>
			<button><a href="hilfe.php">Hilfe</a></button>
			<button>Abmelden</button>
		</div>
		
	
	</body>

</html>