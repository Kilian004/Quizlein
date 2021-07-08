<?php

session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];
$rang = $_SESSION['rank'];
if ($rang!=="mod"){
	header('Location: keineRechte.php');
}	
	if(isset($_GET['eingegeben'])) { 
	 
	$benutzername=$_POST["benutzername"];
	$passwort=$_POST["passwort"];
	$benutzernamegeloeschter=$_POST["benutzernamegeloeschter"];

	if($benutzername==null || $passwort==null || $benutzernamegeloeschter==null){
		echo '<dialog open>Bitte gib vollständige Daten an</br> <a href="loeschen.php">ja</a> </dialog>';
	}
	else{
	$connection = new mysqli("localhost", "root", "", "quiz");
	$result1=$connection->query("SELECT Benutzername from moderator WHERE Benutzername='".$benutzername."'");
	
		if(($_SESSION["rank"]!=="god")&&($result1->num_rows!==0)){
			echo  ' <dialog open>Keine Rechte um diesen Benutzer zu löschen!</dialog> ';
		}
		else{
	
		$sql="DELETE FROM `antwort` WHERE `IDFrage` = (SELECT `IDFrage` FROM `frage` WHERE `frage`.`benutzername` = '$benutzernamegeloeschter')";
		$result=$connection->query($sql);
		$sql="DELETE FROM `frage` WHERE `frage`.`benutzername` = '$benutzernamegeloeschter'";
		$result=$connection->query($sql);
		$sql= "DELETE FROM `benutzer` WHERE `benutzer`.`Benutzername` = '$benutzernamegeloeschter'";
		$result=$connection->query($sql);
		//Sessiondaten speichern und weiterleiten
		header('Location: geloescht.php');
		}
	}
	}

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="quiz.css">
<title>Benutzer löschen</title>
</head>
<body>
<center>
<h1> Benutzer löschen </h1>

<h2> Bitte trage die Daten ein: </h2>
<form action="?eingegeben=1" method="post">
	<table>
	  <tr><td>Benutzername: </td>
			<td> <input class="list" name="benutzername"></td></tr>
			
	  <tr><td>Passwort: </td>
			<td> <input class="list" name="passwort"></td></tr>
			
	  <tr><td>Zu löschender Nutzer: </td>
			<td> <input class="list" name="benutzernamegeloeschter"></td></tr>
			
		<tr><td></td>
		  <td><input class="button" type="submit"></td></tr>
		
	</table>
	</form>
	</center>
</body>
</html>