<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];

$connection = new mysqli("localhost", "root", "", "quiz"); //Daten ranholen (als seltsames Object)
$result1=$connection->query("SELECT Inhalt,Bezeichnung,Bewertung FROM frage natural join kategorie where Benutzername= '$user' ");
 while ($datensatz =$result1->fetch_object()) {
        $daten[] = $datensatz;
    }
?>

<!doctype html>
	<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quizsheet.css">
		<title>Eigene Fragen</title>
	</head>

	<body>
	<h1>Quizlein</h1>
	<circle-button><a type="button" class="circle-button" href="profil.php" style="color:white;" ><?php echo $user ?></a></circle-button>
		<div id=startLinks>
			<button><a type="button" class="button" href="startseite.php">Startseite</a></button>
			<button><a type="button" class="button" href="fragenset.php">Fragen beantworten</a></button>
			<button><a type="button" class="button" href="eigene_fragen.php">Eigene Fragen</a></button>
			<button><a type="button" class="button" href="spielerliste.php">Spielerliste</a></button>
			<button><a type="button" class="button" href="verwaltung.php">Verwaltung</a></button>
			<button><a type="button" class="button" href="hilfe.php">Hilfe</a></button>
			<button><a type="button" class="button" href="index.php">Abmelden</a></button>
		</div>
  </br>
  <h3>Meine Fragen</h3>

 </br>

    <table style="margin-left:auto; margin-right:auto;">
      <tr>
        <td><button><a href="neueFrage.php">neue Frage erstellen</a></button> </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
          <td>&nbsp</td> <!--leere Zeile-->
      </tr>
      <tr>
        <th>Frage</td>
        <th>Kategorie</td>
        <th>Beliebtheit</td>
      </tr>
      <?php
      if($result1->num_rows!==0){
      foreach ($daten as $akt) {
      $inhalt = $akt->Inhalt;
      $kategorie = $akt->Bezeichnung;
      $score = $akt->Bewertung;
      echo '<tr>
              <td>' .$inhalt. '</td>
              <td>' .$kategorie. '</td>
              <td>' .$score. '</td>
            </tr>'
            ;
      }
    }else {
      echo "noch keine erstellten Fragen";
    }
      ?>

    </table>



	</body>

</html>
