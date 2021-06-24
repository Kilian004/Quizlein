<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];
$connection = new mysqli("localhost", "root", "", "quiz");
if(isset($_GET['selected'])){
echo $_GET['selected'];
	$profil=$_GET['selected'];
}else{
	$profil=$user;
}


?>

<!doctype html>
	<html lang="de">
	
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quiz.css">
		<title>Profil</title>
	</head>
	
	<body>
		<table>
			<tr>
				<td><h1>Quizlein</h1> </td>
				<circle-button><a type="button" class="circle-button" href="profil.php" style="color:white" ><?php echo $user ?></a></circle-button>
				
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
		</br>
		</br>
		</br>
		<table>
			<tr>
				<td>Name: ...........................</td>
				<td><?php echo $profil ?></td> <!-- Benutzername wird ausgegeben --> 
			</tr>	
			<tr>
				<td>Platzierung: ..................</td>
				<td>
					<?php //Platzierung wird ermittelt
						$sql="SELECT Count(Benutzername)+1 FROM benutzer WHERE punkte>(SELECT Punkte from benutzer where Benutzername='$profil')";
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
						$sql="SELECT Punkte FROM benutzer WHERE Benutzername='$profil'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Punkte werden ausgegeben
							echo $row['Punkte'];
						
					?>
				</td>
			</tr>
			<tr>
				<td>Beste Punkte: ...............</td>
				<td>
					<?php //Punkte werden ermittelt
						$sql="SELECT Rekord FROM benutzer WHERE Benutzername='".$profil."'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Punkte werden ausgegeben
							echo $row['Rekord'];
						
					?>
				</td>
			</tr>
			<tr>
				<td>Rechte: .........................</td>
				<td>
					<?php 
						$sql="SELECT Benutzername FROM admin WHERE Benutzername='".$profil."'";
						$result=$connection->query($sql);
						$sql2="SELECT Benutzername FROM moderator WHERE Benutzername='".$profil."'";
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
						$sql="SELECT Count(Inhalt) FROM frage WHERE Benutzername='".$profil."'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Fragenanzahl wird ausgegeben
							echo $row['Count(Inhalt)'];
					?>
				</td>
			</tr>
			<tr>
				<td>Beliebteste Frage: .........</td>
				<td>
					<?php //Punkte werden ermittelt
						$sql="SELECT Inhalt FROM frage WHERE Benutzername='".$profil."' AND Bewertung=(SELECT max(Bewertung) FROM frage WHERE Benutzername='".$profil."' )";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Punkte werden ausgegeben
							echo $row['Inhalt'];
						
					?>
				</td>
			</tr>
		</table>
	</body>
	
</html>
