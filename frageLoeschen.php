<?php

session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}



$user = $_SESSION['aktueller_benutzer'];
$rang = $_SESSION['rank'];

$connection = new mysqli("localhost", "root", "", "quiz"); //Daten ranholen (als seltsames Object)
$result1=$connection->query("SELECT Inhalt,IDFrage FROM frage");
 while ($datensatz =$result1->fetch_object()) {
        $daten[] = $datensatz;
    }
if ($rang!=="god"){
	header('Location: keineRechte.php');
}	

?>

<!DOCTYPE html>

<html lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="quiz.css">
<form action="frageLoeschen2.php" method="GET" >

			<select name="selected" size="5" class="list">
				<?php

				foreach ($daten as $akt) {
				$inhalt= $akt->Inhalt;
				$IDFrage= $akt->IDFrage;
				echo '<option value=' .$IDFrage. '>' .$inhalt ."             "  . '</option>';
				}
				?>
			</select>
			</br>
			<th><input type="submit" class="button" value="Bestätigen" ></th>
		</form>
</body>
</html>