
<meta http-equiv="refresh" content="0;url=../listedesnews.php" />

<?php 
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
require dirname(__FILE__).'/../../classes/NewsManager.php';

echo $_POST['titre'];
echo $_POST['avatar'];
echo $_POST['contenu'];
echo $_POST['pseudo'];
//echo $_POST['validation'];

if(isset($_POST['titre']) AND isset($_POST['avatar']) AND isset($_POST['contenu']) AND isset($_POST['pseudo']))
{
	$ajoutNews = new NewsManager();
	
	$titre = strip_tags($_POST['titre']);//On supprime les évantuelles balises html
	//Idem, servira surtout si Midam fait la news et oublie qu'on ne met plus les balises dans la V3
	$avatar = strip_tags($_POST['avatar']);
	$contenu = $_POST['contenu'];//On ne touche pas au contenu pour pouvoir avoir les images dans les news
	$pseudo = strip_tags($_POST['pseudo']);
	
	//appel de la fonction d'enregistrement de news
	$ajoutNews->createNews($pseudo, $titre, $avatar, $contenu);
}

?>

