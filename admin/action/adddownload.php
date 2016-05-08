<meta http-equiv="refresh" content="0;url=../listedesdownload.php" />

<?php 
require dirname(__FILE__).'/../../classes/ProjetManager.php';

echo $_POST['titre']."<br/>"; // récupère l'id du projet
echo $_POST['lienDL']."<br/>";

echo $_POST['chapitre']."<br/>";
echo $_POST['traduction_fr']."<br/>";
echo $_POST['check']."<br/>";
echo $_POST['edition']."<br/>";
echo $_POST['qcheck']."<br/>";

$proj = new ProjetManager();

$proj->addDownload($_POST['titre'], $_POST['chapitre'], $_POST['lienDL'], $_POST['traduction_fr'], $_POST['check'], $_POST['edition'], $_POST['qcheck']);
?>

