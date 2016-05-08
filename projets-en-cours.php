﻿<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Projets en cours";
include 'include/head.php';

}
require 'classes/ProjetManager.php';
?>
<?php
				
				$cachePc = 'cache/projets-en-cours.html';
				$expire = time() - 86400;//Le cache est valable 24h soit 86400 secondes
				
				//Si le fichier existe et qu'il n'a pas expiré on le lit
				if(file_exists($cachePc) && filemtime($cachePc) > $expire)
				{
					readfile($cachePc);
				}
				else //Sinon on le crée
				{
					//*/
					//On créer un objet ProjetManager
					$listeProj = new ProjetManager();
					//On appelle la méthode qui donne la liste des projets en cours
					$tablProj = $listeProj->cacheProjetGo();
					echo $tablProj;
					//*/
				 }
?>

<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
