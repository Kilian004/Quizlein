
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
	$benutzernameBefoerderter=$_POST["benutzernameBefoerderter"];
	$telefonnummer=$_POST["telefonnummer"];

	if($benutzername==null || $passwort==null || $benutzernameBefoerderter==null || $telefonnummer==null){
		echo '<dialog open>Bitte gib vollständige Daten an</br> <a href="befoerdern1.php">ja</a> </dialog>';
	}
	else{
	$connection = new mysqli("localhost", "root", "", "quiz");
	
		$sql="INSERT INTO `moderator` (`Benutzername`, `Telefonnummer`) VALUES ('$benutzernameBefoerderter', '$telefonnummer');";
		$result=$connection->query($sql);
		//Sessiondaten speichern und weiterleiten
		header('Location: befoerdern.php');
	}
	

	$sql="SELECT Benutzername FROM benutzer where Benutzername= '$benutzername' and Passwort='$passwort' and benutzernameBefoerderter='$benutzernameBefoerderter'"; //prüfen ob benutzer
	
	
	
}




?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="quiz.css">
<title>Benutzer befördern</title>
</head>
<body>
<center>
<h1> Benutzer befördern </h1>

<h2> Bitte trage die Daten ein: </h2>
<form action="?eingegeben=1" method="post">
	<table>
	  <tr><td>Benutzername: </td>
			<td> <input class="list" name="benutzername"></td></tr>
			
	  <tr><td>Passwort: </td>
			<td> <input class="list" name="passwort"></td></tr>
			
	  <tr><td>Zu befördernder Nutzer: </td>
			<td> <input class="list" name="benutzernameBefoerderter"></td></tr>
			
	  <tr><td>Telefonnummer des Nutzers: </td>
			<td> <input class="list" name="telefonnummer"></td></tr>
			
		<tr><td></td>
		  <tr><td><input class="button" type="submit"></td></tr>
		     
	</table>
	</form>
</center>
</body>
</html>