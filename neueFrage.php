<!doctype html>
<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];

$connection = new mysqli("localhost", "root", "", "quiz");

if(isset($_GET['register'])) {
  $frage=$_POST["frage"];
  $kategorien=$_POST["kategorien"];
  $x=$connection->query("select count(*)+1 as yx from frage")->fetch_object()->yx;
	$sql="INSERT INTO `frage` (`IDFrage`, `Inhalt`, `Benutzername`, `IDKategorie`, `Bewertung`) VALUES ('".$x."','".$frage."','".$user."','".$kategorien."','0' )"; //frage eintragen
  echo $sql;
  $connection->query($sql);
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
		<h1> Frage erstellen </h1>
		<form action="?register=1" method="post" id="xy">
		<table>
			<tr>
				<th>Frage</th>
				<th><input name="frage"></th>
			</tr>
				<th>Kategorie</th>
				<th>
          <select id="kat" name="kategorien" form="xy"> <!--wird in post mitgeschickt-->
            <?php
            $result=$connection->query("SELECT * FROM kategorie");
             while ($datensatz =$result->fetch_object()) {
                    $daten[] = $datensatz;
                }
                foreach($daten as $akt){
                  $id=$akt->IDKategorie;
                  $name=$akt->Bezeichnung;
                  echo '<option value='.$id.'>'.$name.'</option>'; //dropdownliste "befüllen"
                }
              ?>
          </th>
			</tr>
			<tr>
				<th><input type="reset" value="löschen"></th>
				<th><input type="submit" class="button" value="Bestätigen" ></th>
				</form>
			</tr>



      </select>

		</table>
	</body>
</html>
