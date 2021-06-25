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
if(isset($_GET['selected'])){
echo $_GET['selected'];
$idf = $_GET['selected'];
}else{
}

	if (isset($_GET["eingegeben"])){
    $IDFrage= $_GET["eingegeben"];
	  $connection = new mysqli("localhost", "root", "", "quiz");

		$sql="DELETE FROM `antwort` WHERE `IDFrage` = $IDFrage";
		$result=$connection->query($sql);
		$sql="DELETE FROM `frage` WHERE `IDFrage` = $IDFrage";
		$result=$connection->query($sql);
		die('Frage wurde erfolgreich gelöscht </br> <a href="startseite.php">Zurück zur Startseite</a>');
	}
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="quiz.css">
<title>Frage löschen</title>
</head>
<body>
<center>
<h1> Frage löschen </h1>

<h2> Bist du dir sicher, dass du diese Frage löschen willst? </h2>
<form action="?eingegeben=<?php echo $idf ?>" method="post">
	<input class="button" type="submit" value="ja!">
	</form>
	</center>
</body>
</html>