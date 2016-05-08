<meta http-equiv="refresh" content="0;url=../bestofnews.php" />
<?php 
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../../classes/NewsManager.php';

echo $_POST['id']."<br/>";
echo $_POST['contexte']."<br/>";

if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['contexte']) && !empty($_POST['contexte'])){
	
	
	$id = $_POST['id'];
	$contexte = $_POST['contexte'];
	
	
	
	$modifNews = new NewsManager();
	//appel de la fonction de modification de news
	$modifNews->updateBestof($id, $contexte);
}



?>

