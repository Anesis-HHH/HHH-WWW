<?php
require 'include/connexionBdd.php';

$visiteur = ' ';

if(isset($_SERVER['HTTP_REFERER']))
{
	$visiteur = $_SERVER['HTTP_REFERER'];
}

//On vérifie que le visiteur vient bien du site de la HHH
if((preg_match('#hhh-world.com#', $visiteur)) OR (preg_match('# #', $visiteur)))
{
	//Vérification de l'existance de la variable GET
	if(isset($_GET['release']))
	{
		
		//On va chercher le nombre de download du chapitre dans la bdd
		$tele = $bdd->prepare('SELECT * FROM download2 WHERE dl = :release');
		
		$tele->bindValue(':release', $_GET['release']);
		$tele->execute();
		
		while($plusun = $tele->fetch(PDO::FETCH_ASSOC))
		{
			//On incrémente le nombre de téléchargement de 1
			$nbtele = intval($plusun['pop']) + 1;
			
			$ajoute = $bdd->prepare('UPDATE download2 SET pop = :nbtele WHERE dl = :dl');
			
			$ajoute->bindValue(':nbtele', $nbtele);
			$ajoute->bindValue(':dl', $_GET['release']);
			$ajoute->execute();
			
			$ajoute->closeCursor();
		}
		$tele->closeCursor();
		
		header('Location: http://fichiers.hhh-world.com/'.$_GET['release']);
	}
}
else//S'il ne vient pas du site web il ne peut pas télécharger et on le renvoie sur la page d'accueil
{
	header('Location: http:/hhh-world.com');
}
?>
