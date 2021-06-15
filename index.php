<?php 
$benutzername=$_POST["benutzername"];
$passwort=$_POST["passwort"];
$sql="SELECT benutzername FROM benutzer WHERE benutzername=$benutzername AND passwort=$passwort";
$connection = new mysqli('lokalhost', 'root', '', 'quiz');
$result=$connection->query($sql);

if($result!==null){
	echo "hiiiii";
//header('Location: startseite.php');
exit;
}
else{
	echo "manno";
header('Location: index.php');
exit;
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
		<form action="index.php" method="post">
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
