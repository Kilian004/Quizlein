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
		<link rel="stylesheet" href="quiz.css">
		<title> Quiz Startseite </title>
	</head>
	<body>
	<h1>Quizlein</h1>
	<circle-button><a type="button" class="circle-button" href="profil.php" style="color:white" ><?php echo $user ?></a></circle-button>
		<div id=startLinks>
			<button><a type="button" class="button" href="startseite.php">Startseite</a></button>
			<button><a type="button" class="button" href="fragenset.php">Fragen beantworten</a></button>
			<button><a type="button" class="button" href="eigene_fragen.php">Eigene Fragen</a></button>
			<button><a type="button" class="button" href="spielerliste.php">Spielerliste</a></button>
			<button><a type="button" class="button" href="verwaltung.php">Verwaltung</a></button>
			<button><a type="button" class="button" href="hilfe.php">Hilfe</a></button>
			<button><a type="button" class="button" href="index.php">Abmelden</a></button>
		</div>
        <center>
		<div> </br></br></br></br>
		Wilkommen auf der Quizwebsite Quizlein. Diese Quiseite ist im Rahmen unseres Informatikprojekts enstanden. Die Hauptfunktionen dieser</br>
		Seite sind es, Fragen zu beantworten, selber neue Fragen zu erstellen und sich Statistiken anderer Spieler anzuschauen. Alle Daten</br>
		werden in einer von uns modellierten Datenbank gespeichert. Hauptaufgabenstellung war es, eine Seite, die mySQL verwendet, zu erstellen.</br>
		</br>
		Wir hoffen dir gefällt unsere Seite</br>
		- Kilian - Lukas - Jonas - Mathis - </br>
		</center>
	</body>

</html>
