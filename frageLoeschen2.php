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
$IDFrage = $_GET("selected");
echo $IDFrage;
	if (isset($_GET["eingegeben"])){
	$connection = new mysqli("localhost", "root", "", "quiz");
	
		$sql="DELETE FROM `antwort` WHERE `IDFrage` = $IDFrage";
		$result=$connection->query($sql);
		$sql="DELETE FROM `frage` WHERE `IDFrage` = $IDFrage";
		$result=$connection->query($sql);
		echo  ' <dialog open>Frage wurde erfolgreich gelöscht </br> <a href="startseite.php">Zurück zur Startseite</a> </dialog> ';	
	}
	

	
	

	

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="quizsheet.css">
<title>Frage löschen</title>
</head>
<body>
<h1> Frage löschen </h1>

<h2> Bist du dir sicher, dass du diese Frage löschen willst? </h2>
<form action="?eingegeben=1" method="post">
	<?php 
	echo "<input type='submit' name='IDFrage' value="$IDFrage">";
	?>	
	</form>
</body>
</html>