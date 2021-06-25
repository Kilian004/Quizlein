<!doctype html>
<?php
session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];

$connection = new mysqli("localhost", "root", "", "quiz");

if(isset($_GET['aktion'])) {
  $frage=$_POST["frage"];
  $kategorien=$_POST["kategorien"];
	$sql="INSERT INTO `frage` (`IDFrage`, `Inhalt`, `Benutzername`, `IDKategorie`, `Bewertung`) VALUES ('','".$frage."','".$user."','".$kategorien."','0' )"; //frage eintragen
  $connection->query($sql);
  $idFrage=$connection->query("select IDFrage as yx from frage where Inhalt='".$frage."'")->fetch_object()->yx;


  if(isset($_POST["anA"])){  //antwortfeld auslesen
    $ant=$_POST["anA"];
    if(isset($_POST["rA"])){ //checkbox auslesen
      $richtig=1;
    }else{
      $richtig=0;
    }
    $connection->query("INSERT INTO `antwort` (`Buchstabe`, `IDFrage`, `InhaltAntwort`, `Richtig`) VALUES ('A', '".$idFrage."', '".$ant."', '".$richtig."')");
  }

  if(isset($_POST["anB"])){  //antwortfeld auslesen
    $ant=$_POST["anB"];
    if(isset($_POST["rB"])){ //checkbox auslesen
      $richtig=1;
    }else{
      $richtig=0;
    }
    $connection->query("INSERT INTO `antwort` (`Buchstabe`, `IDFrage`, `InhaltAntwort`, `Richtig`) VALUES ('B', '".$idFrage."', '".$ant."', '".$richtig."')");
  }

  if(isset($_POST["anC"])){  //antwortfeld auslesen
    $ant=$_POST["anC"];
    if(isset($_POST["rC"])){ //checkbox auslesen
      $richtig=1;
    }else{
      $richtig=0;
    }
    $connection->query("INSERT INTO `antwort` (`Buchstabe`, `IDFrage`, `InhaltAntwort`, `Richtig`) VALUES ('C', '".$idFrage."', '".$ant."', '".$richtig."')");
  }

  if(isset($_POST["anD"])){  //antwortfeld auslesen
    $ant=$_POST["anD"];
    if(isset($_POST["rD"])){ //checkbox auslesen
      $richtig=1;
    }else{
      $richtig=0;
    }
    $connection->query("INSERT INTO `antwort` (`Buchstabe`, `IDFrage`, `InhaltAntwort`, `Richtig`) VALUES ('D', '".$idFrage."', '".$ant."', '".$richtig."')");
  }
}
?>

<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quiz.css">
	<title> Quiz </title>

	</head>
	<body>
		<h1> Frage erstellen </h1>
		<form action="?aktion=1" method="post" id="xy">
		<table>
			<tr>
				<th>Frage</th>
				<td><input name="frage" class="list"></td>
			</tr>
      <tr>
				<th>Kategorie</th>
				<td>
				<div id="katlist">
          <select  id="kat" name="kategorien" form="xy" class="list"> <!--wird in post mitgeschickt-->
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
			  </div>
          </td>
			</tr>
      <tr>
        <td>
          <th>&nbsp</th>
        </td>
      </tr>
      <tr>
        <td>
          <th>Antwort</th>
          <th>Inhalt</th>
          <th>Richtig?</th>
        </td>
      </tr>
      <tr>
        <td>
          <th>A:</th>
  				<td><input class="list" name="anA"></td>
          <td><input type="checkbox" value="rA"></td>
        </td>
      </tr>
      <tr>
        <td>
          <th>B:</th>
          <td><input class="list" name="anB"></td>
          <td><input type="checkbox" value="rB"></td>
        </td>
      </tr>
      <tr>
        <td>
          <th>C:</th>
          <td><input class="list" name="anC"></td>
          <td><input type="checkbox" value="rC"></td>
        </td>
      </tr>
      <tr>
        <td>
          <th>D:</th>
          <td><input class="list" name="anD"></td>
          <td><input type="checkbox" value="rD"></td>
        </td>
      </tr>
	  
  		<tr></br>
				<th><input type="reset" class="button" value="reset"></th>
				<th><input type="submit" class="button" value="Frage hinzufügen" ></th>
        <th><a type="button" class="button" href="eigene_fragen.php">Zurück</a></th>
				</form>
			</tr>



      </select>

		</table>
	</body>
</html>
