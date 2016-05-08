<meta http-equiv="refresh" content="0;url=../listedesnews.php" />
<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../../classes/NewsManager.php';

if(isset($_GET['idSup']))
{
	//On repasse la variable en int par sécurité
	$id = intval($_GET['idSup']);
	
	$supNews = new NewsManager();
	//appel de la fonction de validation de news
	$supNews->deleteNews($id);
}
?>
