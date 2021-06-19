<!doctype html>
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
echo ' <dialog open>Dieses Passwort ist leider falsch </br> <a href="index.php">erneut Versuchen</a> </dialog> ';
	//header('Location: index.php');
exit;
}
}
?>

<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
	<title> Quiz </title>


	</head>
	<body>
		<h1> Quiz Anmeldung </h1>
		<form action="?register=1" method="post">
		<table>
			<tr>
				<th>Benutzername</th>
				<th><input name="benutzername"></th>
			</tr>
				<th>Passwort</th>
				<th><input name="passwort"></th>
			</tr>
			<tr>
				<th><input type="reset"></th>
				<th><input type="submit" value="Bestätigen" ></th>
				</form>
			</tr>
			<tr>
				<th>Registrieren</th>
				<th>www.luo-darmstadt.de</th>
			</tr>
		</table>

	</body>
</html>
