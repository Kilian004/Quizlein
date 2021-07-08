<!doctype html>
	<html lang="de">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="quiz.css">
		<title>Fragenset</title>

<?php
function randFrage(){ //gibt die Id einer zufälligen Frage zurück
	$connection = new mysqli("localhost", "root", "", "quiz");
	$result1=$connection->query("SELECT IDFrage FROM frage order by IDFrage");
	$ids = array();
	while($row = $result1->fetch_array()){
		 $ids[] = $row['IDFrage'];
	}
	return $ids[array_rand($ids)];
}

session_start();
if(!isset($_SESSION['aktueller_benutzer'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
$user = $_SESSION['aktueller_benutzer'];
$connection = new mysqli("localhost", "root", "", "quiz");


if(!isset($_SESSION['rand'])){
	$_SESSION['rand']=randFrage();
//	$_SESSION['rand'] =;//Zufällige Frage wird gewählt
}
if(isset($_GET['kontrolle'])){
	if(!isset($_POST['a'])&&!isset($_POST['b'])&&!isset($_POST['c'])&&!isset($_POST['d'])){
		echo  ' <dialog open>Keine Antwort ausgewählt </dialog> ';
	}
	else{

		if(isset($_POST['ja']) && !isset($_POST['nein'])){
			$connection->query("UPDATE frage set Bewertung=(select Bewertung from frage where IDFrage='".$_SESSION['rand']."')+1 where IDFrage='".$_SESSION['rand']."'");
		}
		if(isset($_POST['nein']) && !isset($_POST['ja'])){
			$connection->query("UPDATE frage set Bewertung=(select Bewertung from frage where IDFrage='".$_SESSION['rand']."')-1 where IDFrage='".$_SESSION['rand']."'");
		}

		$sql="SELECT Richtig FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='A'";
		$result=$connection->query($sql);
		$row = mysqli_fetch_array($result);
		if(1==$row['Richtig']){//Antwort von Datenbak gespeichert
			$richtig="R";
		}
		else{
			$richtig="F";
		}

		$sql="SELECT Richtig FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='B'";
		$result=$connection->query($sql);
		$row = mysqli_fetch_array($result);
		if(1==$row['Richtig']){//Antwort von Datenbak gespeichert
			$richtig=$richtig."R";
		}
		else{
			$richtig=$richtig."F";
		}

		$sql="SELECT Richtig FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='C'";
		$result=$connection->query($sql);
		$row = mysqli_fetch_array($result);
		if(1==$row['Richtig']){//Antwort von Datenbak gespeichert
			$richtig=$richtig."R";
		}
		else{
			$richtig=$richtig."F";
		}

		$sql="SELECT Richtig FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='D'";
		$result=$connection->query($sql);
		$row = mysqli_fetch_array($result);
		if(1==$row['Richtig']){//Antwort von Datenbak gespeichert
			$richtig=$richtig."R";
		}
		else{
			$richtig=$richtig."F";
		}
		if(isset($_POST['a'])){
			$richtig2="R";//Antwort von User gespeichert
		}
		else{
			$richtig2="F";
		}

		if(isset($_POST['b'])){
			$richtig2=$richtig2."R";//Antwort von User gespeichert
		}
		else{
			$richtig2=$richtig2."F";
		}

		if(isset($_POST['c'])){
			$richtig2=$richtig2."R";//Antwort von User gespeichert
		}
		else{
			$richtig2=$richtig2."F";
		}

		if(isset($_POST['d'])){
			$richtig2=$richtig2."R";//Antwort von User gespeichert
		}
		else{
			$richtig2=$richtig2."F";
		}
		$sql1="SELECT Punkte FROM benutzer WHERE Benutzername='".$user."'"; //Punkte von Benutzer
		$result1=$connection->query($sql1);
		$punkte=$result1->fetch_object()->Punkte+1;

		if($richtig==$richtig2){
			$sql="UPDATE benutzer SET Punkte='".$punkte."' WHERE Benutzername='".$user."'";//Mehr Punkte weil richtig
			$connection->query($sql);
			$sql2="SELECT Rekord FROM benutzer WHERE Benutzername='".$user."'"; //Rekord von benutzer
			$result2=$connection->query($sql2);

			if($punkte>$result2->fetch_object()->Rekord){
				$sql="UPDATE benutzer SET Rekord='".$punkte."' WHERE Benutzername='".$user."'";	//Neuer Rekord
				$connection->query($sql);
			}
			$_SESSION['rand']=randFrage();//Zufällige Frage wird gewählt
			echo  ' <dialog open>RICHTIG!</dialog> ';
		}
		else{
			$punkte=$punkte-4; //Punktabzug weil falsch
			$sql="UPDATE benutzer SET Punkte='".$punkte."' WHERE Benutzername='".$user."'";
			$connection->query($sql);
			$_SESSION['rand']=randFrage();//Zufällige Frage wird gewählt
			echo  ' <dialog open>FALSCH! </dialog> ';
		}
	}

}



?>


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
			<button><a type="button" class="button" href="index.php">Abmelden</a></button>
		</div>
		</br>
		</br>
		</br>


		<table>
		<form action="?kontrolle=1" method="post">
			<tr>
				<td>
					<?php
						$sql="SELECT Inhalt FROM frage WHERE IDFrage='".$_SESSION['rand']."'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Frage wird ausgegeben
							echo $row['Inhalt'];

					?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>

					<?php
					//Antwort wird ermittelt
						$sql="SELECT InhaltAntwort FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='A'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Antwort wird ausgegeben
							echo $row['InhaltAntwort'];
					?>

				</td>
				<td><input type="checkbox" name="a" value="R"></td>
			</tr>
			<tr>
				<td>
					<?php
					//Antwort wird ermittelt
						$sql="SELECT InhaltAntwort FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='B'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Antwort wird ausgegeben
							echo $row['InhaltAntwort'];
					?>
				</td>
				<td><input type="checkbox" name="b" value="R"></td>
			</tr>
			<tr>
				<td>
					<?php
					//Antwort wird ermittelt
						$sql="SELECT InhaltAntwort FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='C'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Antwort wird ausgegeben
							echo $row['InhaltAntwort'];
					?>
				</td>
				<td><input type="checkbox" name="c" value="R"></td>
			</tr>
			<tr>
				<td>
					<?php
					//Antwort wird ermittelt
						$sql="SELECT InhaltAntwort FROM antwort WHERE IDFrage='".$_SESSION['rand']."' AND Buchstabe='D'";
						$result=$connection->query($sql);
						$row = mysqli_fetch_array($result);//Antwort wird ausgegeben
							echo $row['InhaltAntwort'];
					?>
				</td>
				<td><input type="checkbox" name="d" value="R"></td>
			</tr>
			<tr>
				<td><input type="reset" class="button" value="Reset"></td>
				<td><input type="submit" class="button" value="Bestätigen"></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td>Gefällt dir diese Frage?</td>
				<td>ja<input type="checkbox" name="ja"></td>
				<td>nö<input type="checkbox" name="nein"></td>
			</tr>
			</form>
		</table>

	</body>

</html>
