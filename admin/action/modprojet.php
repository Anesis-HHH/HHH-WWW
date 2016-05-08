<meta http-equiv="refresh" content="0;url=../listedesprojets.php" />
<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../../classes/ProjetManager.php';

echo $_POST['titre_hhh']."<br/>";
echo $_POST['titre_jap']."<br/>";
echo $_POST['titre_roman']."<br/>";
echo $_POST['auteur']."<br/>";
echo $_POST['editeur_jap']."<br/>";
echo $_POST['genre1']."<br/>";
echo $_POST['genre2']."<br/>";
echo $_POST['genre3']."<br/>";
echo $_POST['volume']."<br/>";
echo $_POST['nombre_chapitre']."<br/>";
echo $_POST['traduction_us']."<br/>";
echo $_POST['categorie']."<br/>";
echo $_POST['statut']."<br/>";
echo $_POST['resume']."<br/>";
echo $_POST['couverture']."<br/>";
echo $_POST['extrait']."<br/>";
echo $_POST['idProj']."<br/>";

//Vérification de l'existance des variables
if(isset($_POST['titre_hhh']) and isset($_POST['titre_jap']) and isset($_POST['titre_roman']) and isset($_POST['auteur']) 
 and isset($_POST['editeur_jap']) and isset($_POST['genre1']) and isset($_POST['genre2']) and isset($_POST['genre3']) and isset($_POST['volume']) 
 and isset($_POST['nombre_chapitre']) and isset($_POST['traduction_us']) and isset($_POST['categorie']) and isset($_POST['statut'])
  and isset($_POST['resume']) and isset($_POST['couverture']) and isset($_POST['extrait']))
  {
	  $moproj = new ProjetManager();
	  //On apelle la méthode d'ajout de projet
	  $moproj->modProjet($_POST['categorie'], $_POST['titre_hhh'], $_POST['titre_jap'], $_POST['titre_roman'], $_POST['couverture'],
	  $_POST['extrait'], $_POST['auteur'], $_POST['volume'], $_POST['genre1'], $_POST['genre2'], $_POST['genre3'], $_POST['editeur_jap'],
	  $_POST['traduction_us'], $_POST['nombre_chapitre'], $_POST['resume'], $_POST['statut'], $_POST['idProj']);
  }


?>
