
<?php

session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');

$user = $_SESSION['aktueller_benutzer'];
$rang = $_SESSION['rank'];
if ($rang!=="god"){
	header('Location: keineRechte.php');
	
	$benutzername=$_POST["benutzername"];
	$passwort=$_POST["passwort"];
	$benutzernameBefoerderter=$_POST["benutzernameBefoerderter"];
	$telefonnummer=$_POST["telefonnummer"];

	if($benutzername==null || $passwort==null || $benutzern4ameBefoerderter==null || $telefonnummer==null){
		echo '<dialog open>Bitte gib vollständige Daten an</br> <a href="befoerdern1.php">ja</a> </dialog>';}
	else{
	$connection = new mysqli("localhost", "root", "", "quiz");
	
		$sql="INSERT INTO `moderator` (`Benutzername`, `Telefonnummer`) VALUES ('$benutzernameBefoerderter', '$telefonnummer');";
		$result=$connection->query($sql);
		//Sessiondaten speichern und weiterleiten
		header('Location: befoerdern.php');
	}
	

	$sql="SELECT Benutzername FROM benutzer where Benutzername= '$benutzername' and Passwort='$passwort' and benutzernameBefoerderter='$benutzernameBefoerderter'"; //prüfen ob benutzer
	$result=$connection->query($sql);
	

}
}


?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8"/>
<title>Benutzer befördern</title>
</head>
<body>
<h1> Benutzer befördern </h1>
<p> Bitte trage die Daten ein: </p>
<form action="befoerdern.php" method="post">
	<table>
	  <tr><td>Benutzername: </td>
			<td> <input name="benutzername"></td></tr>
			
	  <tr><td>Passwort: </td>
			<td> <input password="passwort"></td></tr>
			
	  <tr><td>Zu befördernder Nutzer: </td>
			<td> <input name="benutzernameBefoerderter"></td></tr>
			
	  <tr><td>Telefonnummer des Nutzers: </td>
			<td> <input type="telefonnummer"></td></tr>
			
		<tr><td></td>
		  <td><input type="submit">
		      <input type="reset">
	</table>
	</form>
<?php
	

	
	
	
		
	
	  
	  

	
	
?>

</body>
</html>