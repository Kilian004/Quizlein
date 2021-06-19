<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];
$connection = new mysqli("localhost", "root", "", "quiz");
?>

<!doctype html>
	<html lang="de">
	
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
		<title>Profil</title>
	</head>
	
	<body>
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
		<table>
			<tr>
				<td>Name: ...........................</td>
				<td><?php echo $user ?></td>
			</tr>	
			<tr>
				<td>Platzierung: ..................</td>
				<td>
					<?php
						$sql1="SELECT Count(Benutzername) FROM benutzer WHERE punkte>(SELECT Punkte from benutzer where Benutzername='$user')";
						$result1=$connection->query($sql1);
						echo $result1+1;
					?>
				</td>
			</tr>
			<tr>
				<td>Punkte: .........................</td>
				<td></td>
			</tr>
			<tr>
				<td>Beste Punkte: ...............</td>
				<td></td>
			</tr>
			<tr>
				<td>Rechte: .........................</td>
				<td></td>
			</tr>
			<tr>
				<td>Erstellte Fragen: ...........</td>
				<td></td>
			</tr>
			<tr>
				<td>Beliebteste Frage: .........</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
		</table>
	</body>
	
</html>