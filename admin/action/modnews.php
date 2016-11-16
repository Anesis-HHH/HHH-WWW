<meta http-equiv="refresh" content="0;url=../listedesnews.php" />
<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../../classes/NewsManager.php';

echo $_POST['titre']."<br/>";
echo $_POST['avatar']."<br/>";
echo $_POST['contenu']."<br/>";
echo $_POST['pseudo']."<br/>";
echo $_POST['idMod']."<br/>";
if(isset($_POST['best'])) {echo $_POST['best']."<br/>";}

if(isset($_POST['titre']) AND isset($_POST['avatar']) AND isset($_POST['contenu']) AND isset($_POST['pseudo']) AND isset($_POST['idMod']))
{
	$best = 'non';
	if(isset($_POST['best']))
	{
		$best = 'oui';
	}
	//On supprime les évantuelles balises html
	$titre = strip_tags($_POST['titre']);
	//Idem, servira surtout si Midam fait la news et oublie qu'on ne met plus les balises dans la V3
	//$avatar = strip_tags($_POST['avatar']);
	$avatar = $_POST['avatar'];
	//On ne touche pas au contenu pour pouvoir avoir les images dans les news
	$contenu = $_POST['contenu'];
	$pseudo = strip_tags($_POST['pseudo']);
	//L'id n'a normalement pas besoin de protection car il est dans un champs caché
	$id = $_POST['idMod'];
	
	$modifNews = new NewsManager();
	//appel de la fonction de modification de news
	$modifNews->updateNews($id, $pseudo, $titre, $avatar, $contenu, $best);
}
?>
