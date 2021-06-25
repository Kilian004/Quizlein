<!doctype html>

<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quiz.css">
	<title> Quiz </title>
<?php
session_start();
if(isset($_GET['register'])) {
	$benutzername=$_POST["benutzername"];
	$passwort=$_POST["passwort"];
	$connection = new mysqli("localhost", "root", "", "quiz");
	$sql="SELECT Benutzername FROM benutzer where Benutzername= '$benutzername' and Passwort='$passwort'"; //prüfen ob benutzer
	$result=$connection->query($sql);

if($result -> num_rows!==0){ //-> Anmeldedaten ghören zu Benutzer
	$_SESSION['aktueller_benutzer'] = $benutzername; //in session speichern
	$_SESSION['rank']="schrott";

	if($connection->query("SELECT Benutzername FROM moderator where Benutzername= '$benutzername'") -> num_rows!==0){ //prüfen ob moderator
		$_SESSION['rank']="mod"; //rang in session speichern
	};
	if($connection->query("SELECT Benutzername FROM admin where Benutzername= '$benutzername'") -> num_rows!==0){ //prüfen ob admin
		$_SESSION['rank']="god"; //rang in session speichern
	};
	header('Location: startseite.php'); //weiterleiten auf startseite
exit;
}
else{
echo  ' <dialog open>Dieses Passwort ist leider falsch </br> <a href="index.php">erneut Versuchen</a> </dialog> ';
	//header('Location: index.php');
exit;
}
}
?>



	</head>
	<body>
		<h1> Quiz Anmeldung </h1>
		<form action="?register=1" method="post">
		<table>
			<tr>
				<td>Benutzername</td>
				<td><input class="list" name="benutzername"></td>
			</tr>
				<td>Passwort</td>
				<td><input class="list" name="passwort" type="passwort"></td>
			</tr>
			<tr>
				<td><a type="button" class="button" href="registrieren.php">Registrieren</a></td>
				<td><input type="submit" value="Bestätigen" type="button" class="button"></td>
				</form>
			</tr>
		</table>

	</body>
</html>
