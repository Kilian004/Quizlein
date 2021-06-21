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
				<td><?php echo $user ?></td> <!-- Benutzername wird ausgegeben --> 
			</tr>	
			<tr>
				<td>Platzierung: ..................</td>
				<td>
					<?php //Platzierung wird ermittelt
						$sql="SELECT Count(Benutzername)+1 FROM benutzer WHERE punkte>(SELECT Punkte from benutzer where Benutzername='$user')";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Platzierung wird ausgegeben
							echo $row['Count(Benutzername)+1'];
						
					?>
				</td>
			</tr>
			<tr>
				<td>Punkte: .........................</td>
				<td>
					<?php //Punkte werden ermittelt
						$sql="SELECT Punkte FROM benutzer WHERE Benutzername='$user'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Punkte werden ausgegeben
							echo $row['Punkte'];
						
					?>
				</td>
			</tr>
			<tr>
				<td>Beste Punkte: ...............</td>
				<td>
					test 1
				<!--Hier kommt noch was-->
				</td>
			</tr>
			<tr>
				<td>Rechte: .........................</td>
				<td>
					<?php 
						$sql="SELECT Benutzername FROM admin WHERE Benutzername='$user'";
						$result=$connection->query($sql);
						$sql2="SELECT Benutzername FROM moderator WHERE Benutzername='$user'";
						$result2=$connection->query($sql2);
						if($result2 -> num_rows!==0){//Prüfen ob Benutzer Admin ist
							echo "Admin";
						}
						elseif($result -> num_rows!==0){//Prüfen ob Benutzer Moderator ist
							echo "Moderator";	
						}
						else{
							echo "Spieler";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Erstellte Fragen: ...........</td>
				<td>
					<?php //Fragenanzahl wird ermittelt
						$sql="SELECT Count(Inhalt) FROM frage WHERE Benutzername='$user'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Fragenanzahl wird ausgegeben
							echo $row['Count(Inhalt)'];
					?>
				</td>
			</tr>
			<tr>
				<td>Beliebteste Frage: .........</td>
				<td>
					test 2
				<!--Hier kommt noch was-->
				</td>
			</tr>
		</table>
	</body>
	
</html>