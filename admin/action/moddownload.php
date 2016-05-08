<meta http-equiv="refresh" content="0;url=../listedesdownload.php" />
<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../../classes/ProjetManager.php';

echo $_POST['titre'].'<br/>';
echo $_POST['chapitre'].'<br/>';
echo $_POST['lienDL'].'<br/>';
echo $_POST['traduc'].'<br/>';
echo $_POST['check'].'<br/>';
echo $_POST['edition'].'<br/>';
echo $_POST['qcheck'].'<br/>';
echo $_POST['idDow'].'<br/>';

//vérification de l'existance des variables
if(isset($_POST['titre']) and isset($_POST['chapitre']) and isset($_POST['lienDL']) and isset($_POST['traduc']) and 
isset($_POST['check']) and isset($_POST['edition']) and isset($_POST['qcheck']) and isset($_POST['idDow']))
{
	echo 'Passage dans la boucle if.<br/>';
	
	//création d'un objet ProjetManager
	$modDow = new ProjetManager();
	//appel de la fonction de modification de release
	$modDow->modDownload($_POST['idDow'], $_POST['titre'], $_POST['chapitre'], $_POST['lienDL'], $_POST['traduc'], 
	$_POST['check'], $_POST['edition'], $_POST['qcheck']);
	
	echo 'Mise a jour terminee.';
}
?>
