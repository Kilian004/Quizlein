<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];

$connection = new mysqli("localhost", "root", "", "quiz"); //Daten ranholen (als seltsames Object)
$result1=$connection->query("SELECT Benutzername,Punkte FROM benutzer order by Punkte desc");
 while ($datensatz =$result1->fetch_object()) {
        $daten[] = $datensatz;
    }

?>

<!doctype html>
	<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
		<title>Spielerliste</title>
	</head>

	<body>
	<h1>Quizlein</h1>
  <circle-button><a type="button" class="circle-button" href="profil.php" style="color:white" ><?php echo $user ?></a></circle-button>
  
		<div id=startLinks>
			<button><a type="button" class="button" href="startseite.php">Startseite</a></button>
			<button><a type="button" class="button" href="fragenset.php">Fragen beantworten</a></button>
			<button><a type="button" class="button" href="eigene_fragen.php">Eigene Fragen</a></button>
			<button><a type="button" class="button" href="spielerliste.php">Spielerliste</a></button>
			<button><a type="button" class="button" href="verwaltung.php">Verwaltung</a></button>
			<button><a type="button" class="button" href="hilfe.php">Hilfe</a></button>
			<button><a type="button" class="button" href="index.php">Abmelden<a/></button>
		</div>

		<form action="profil.php" method="GET" >

			<select name="selected" size="5">
				<?php

				foreach ($daten as $akt) {
				$name= $akt->Benutzername;
				$punkte= $akt->Punkte;
				echo '<option value=' .$name. '>' .  $name . "             " . $punkte . '</option>';
				}
				?>
			</select>
			<th><input type="submit" value="Bestätigen" ></th>
		</form>



	</body>

</html>
