<?php

session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];
$rang = $_SESSION['rank'];
if ($rang!=="god"){
	header('Location: keineRechte.php');
}	
	if(isset($_GET['eingegeben'])) { 
	 
	$benutzername=$_POST["benutzername"];
	$passwort=$_POST["passwort"];
	$benutzernameDegradierter=$_POST["benutzernameDegradierter"];

	if($benutzername==null || $passwort==null || $benutzernameDegradierter==null){
		echo '<dialog open>Bitte gib vollständige Daten an</br> <a href="degradiert.php">ja</a> </dialog>';
	}
	else{
	$connection = new mysqli("localhost", "root", "", "quiz");
	
		$sql="DELETE FROM `moderator` WHERE `benutzername` = '$benutzernameDegradierter'";
		$result=$connection->query($sql);
		//Sessiondaten speichern und weiterleiten
		header('Location: degradiert.php');
	}
	}

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="quiz.css">
<title>Benutzer degradieren</title>
</head>
<body>
<center>
<h1> Benutzer degradieren </h1>

<h2> Bitte trage die Daten ein: </h2>
<form action="?eingegeben=1" method="post">
	<table>
	  <tr><td>Benutzername: </td>
			<td> <input class="list" name="benutzername"></td></tr>
			
	  <tr><td>Passwort: </td>
			<td> <input class="list" name="passwort"></td></tr>
			
	  <tr><td>Zu degradierender Nutzer: </td>
			<td> <input class="list" name="benutzernameDegradierter"></td></tr>
			
		<tr><td></td>
		  <tr><td><input class="button" type="submit"></td></tr>     
	</table>
	</form>
	</center>
</body>
</html>