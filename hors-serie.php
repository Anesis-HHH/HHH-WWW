<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Hors série";
include 'include/head.php';

}
require 'classes/ProjetManager.php';
?>
<?php
				
				$cacheHs = 'cache/hors-serie.html';
				$expire = time() - 86400;//Le cache est valable 24h soit 86400 secondes
				
				//Si le fichier existe et qu'il n'a pas expiré on le lit
				if(file_exists($cacheHs) && filemtime($cacheHs) > $expire)
				{
					readfile($cacheHs);
				}
				else //Sinon on le crée
				{
					//*/
					//On créer un objet ProjetManager
					$listeProj = new ProjetManager();
					//On appelle la méthode qui donne la liste des projets finis
					$tablProj = $listeProj->cacheHs();
					echo $tablProj;
					//*/
				 }
?>

<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
