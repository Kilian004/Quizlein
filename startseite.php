<?php
session_start();
//überprüfen ob schon angemeldet
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];//Name des angemeldeten Benutzers wird gespeichert
?>

<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
		<title> Quiz Startseite </title>
	</head>
	<body>
	<h1>Quizlein</h1> 
	<!- Passender Hintergrund
		Überschrift in die Mitte / Passende Frabe
		Passende FrabePassende Schriftfarbe
		Buttons gleich groß
		Buttons größer
		-> 
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
			<button><a type="button" class="button">Abmelden</a></button>
		</div>
		
	
	</body>

</html>