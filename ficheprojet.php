<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
	$titredelapage = str_replace('-', ' ', $_GET['titre']);
//$titredelapage="titre du volume";
include 'include/head.php';

}

require 'classes/ProjetManager.php';

//Vérification de l'existance de la variable GET
if(isset($_GET['idProjet']))
{
	$idPro = (int)$_GET['idProjet'];
	//On crée un objet ProjetManager
	$ficheP = new ProjetManager();
	//On appelle la méthode qui affiche la fiche du projet
	$ficheP->ficheProjet($idPro);
}


if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
}
 ?> 
