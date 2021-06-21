<!DOCTYPE html>
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
?>
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
		<tr><td></td>
		  <td><input type="submit">
		      <input type="reset">
	</table>
	</form>
<?php
	
	$benutzername=$_POST["benutzername"];
	$passwort=$_POST["passwort"];
	$benutzernameBefoerderter=$_POST["benutzernameBefoerderter"];
	$connection = new mysqli("localhost", "root", "", "quiz");
	$sql="SELECT Benutzername FROM benutzer where Benutzername= '$benutzername' and Passwort='$passwort' and benutzernameBefoerderter='$benutzernameBefoerderter'"; //prüfen ob benutzer
	$result=$connection->query($sql);
	
	
		
	
	  
	  

	
	
?>

</body>
</html>