<meta http-equiv="refresh" content="0;url=../listedesmembres.php" />
<?php 

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
require dirname(__FILE__).'/../../classes/MembreManager.php';


echo $_POST['idmembre']."<br/>";
echo $_POST['pseudo']."<br/>";
echo $_POST['email']."<br/>";
echo $_POST['datenaissance']."<br/>";
echo $_POST['avatar']."<br/>";

if(isset($_POST['pole1'])){
	echo $_POST['pole1']."<br/>";
}else{
	echo "-<br/>";
}

if(isset($_POST['pole2'])){
	echo $_POST['pole2']."<br/>";
}else{
	echo "-<br/>";
}
if(isset($_POST['pole3'])){
	echo $_POST['pole3']."<br/>";
}else{
	echo "-<br/>";
}
if(isset($_POST['pole4'])){
	echo $_POST['pole4']."<br/>";
}else{
	echo "-<br/>";
}
echo $_POST['description']."<br/>";
echo $_POST['loisirs']."<br/>";
echo $_POST['statut']."<br/>";


	if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['datenaissance']) && isset($_POST['avatar']) && isset($_POST['description']) && isset($_POST['loisirs']) && isset($_POST['statut'])){
		
		$idmembre=$_POST['idmembre'];
		$pseudo=$_POST["pseudo"];
		$email=$_POST['email'];
		$ddn=$_POST['datenaissance'];
		$avatar=$_POST['avatar'];
		
		if(isset($_POST['pole1'])){
			$pole1=$_POST['pole1'];
		}else{
			$pole1="-";
		}

		if(isset($_POST['pole2'])){
			$pole2=$_POST['pole2'];
		}else{
			$pole2="-";
		}
		if(isset($_POST['pole3'])){
			$pole3=$_POST['pole3'];
		}else{
			$pole3="-";
		}

		if(isset($_POST['pole4'])){
			$pole4=$_POST['pole4'];
		}else{
			$pole4="-";
		}
		
		
		$description=$_POST['description'];
		$loisirs=$_POST['loisirs'];
		$contribution=$_POST['contribution'];
		$statut=$_POST['statut'];

		$modmembre= new MembreManager();
		$modmembre->modMembre($pseudo,$email,$ddn,$avatar,$pole1,$pole2,$pole3,$pole4,$description,$loisirs,$contribution,$statut,$idmembre);
		echo "<br/><br/><br/><br/>modif OK";
	}
	else {
		echo "manque un isset connard";

	}

?>

