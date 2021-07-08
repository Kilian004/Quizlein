<?php
session_start();
if(isset($_GET['abgegeben'])) {
	$benutzername=$_POST["benutzername"];
	$passwort=$_POST["passwort"];
	$passwort2=$_POST["passwort2"];
	if($benutzername==null || $passwort==null || $passwort2==null){
		echo '<dialog open>Bitte gib vollständige Daten an</br> <a href="registrieren.php">ja</a> </dialog>';
	}else{
	$connection = new mysqli("localhost", "root", "", "quiz");
	$sql="SELECT Benutzername FROM benutzer where Benutzername= '$benutzername'"; //prüfen ob benutzer
	$result=$connection->query($sql);
	if($result -> num_rows!==0){
		die('<dialog open>Sorry, aber der Benutzername ist bereits belegt</br> <a href="registrieren.php">bitte einen neuen aussuchen</a> </dialog>');
	}
	if($passwort==$passwort2){
		$sql="INSERT INTO `benutzer` (`Benutzername`, `Passwort`, `Punkte`) VALUES('$benutzername', '$passwort', 0);"; //in Datenbank einfügen
		$result=$connection->query($sql);
		//Sessiondaten speichern und weiterleiten
		$_SESSION['aktueller_benutzer'] = $benutzername;
		$_SESSION['rank']="schrott";
		header('Location: startseite.php');
	}else{
		echo '<dialog open>bist du ernsthaft nicht in der Lage, </br> dein Passwort zu wiederholen? </br> <a href="registrieren.php">erneut Versuchen</a> </dialog>';
	}
	}
}
?>

<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quiz.css">
	<title> Quiz </title>


	</head>
	<body>
		<h1> Registrieren </h1>
		<form action="?abgegeben=1" method="post">
		<table>
			<tr>
				<th>Benutzername</th>
				<th><input name="benutzername"></th>
			</tr>
			<tr>
				<th>Passwort</th>
				<th><input name="passwort"></th>
			</tr>
			<tr>
				<th>Passwort wiederholen</th>
				<th><input name="passwort2"></th>
			</tr>
			<tr>
				<th><input type="reset"></th>
				<th><input type="submit" class="button" value="Bestätigen" ></th>
				</form>
			</tr>
		</table>

	</body>
</html>
