<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Jeux";
include 'include/head.php';

}
require 'classes/ProjetManager.php';
?>
<?php
				
				$cacheJe = 'cache/projets_jeux.html';
				$expire = time() - 86400;//Le cache est valable 24h soit 86400 secondes
				
				//Si le fichier existe et qu'il n'a pas expiré on le lit
				if(file_exists($cacheJe) && filemtime($cacheJe) > $expire)
				{
					readfile($cacheJe);
				}
				else //Sinon on le crée
				{
					//*/
					//On créer un objet ProjetManager
					$listeProj = new ProjetManager();
					//On appelle la méthode qui donne la liste des projets finis
					$tablProj = $listeProj->cacheJeux();
					echo $tablProj;
					//*/
				 }
?>

<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
