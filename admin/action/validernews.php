<meta http-equiv="refresh" content="2;url=../listedesnews.php" />
<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../../classes/NewsManager.php';

if(isset($_GET['idVal']))
{
	//On repasse la variable en int par sécurité
	$id = intval($_GET['idVal']);
	
	$valNews = new NewsManager();
	//appel de la fonction de validation de news
	$valNews->validateNews($id);
	//appel de la fonction pour bazarder la news sur twitter
	$valNews->newsTwitter($id);
}
?>
<br>OK