<?php

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
include 'connexionBdd.php';


//pour les projets en cours
$catconnec= $bdd->query('SELECT COUNT(id) as idProjet  FROM projets WHERE statut = "en cours"');	
$catEC =$catconnec->fetch(PDO::FETCH_ASSOC);
 $catencours=$catEC['idProjet'];
// echo $catencours."<br/>";
$catconnec->closeCursor();

// pour les projet terminés
$catconnec= $bdd->query('SELECT COUNT(id) as idProjet FROM projets WHERE statut = "complet"');	
$catOK =$catconnec->fetch(PDO::FETCH_ASSOC);
 $catfini=$catOK['idProjet'];
// echo $catfini."<br/>";
$catconnec->closeCursor();

// pour les hors serie
$catconnec= $bdd->query('SELECT COUNT(id) as idProjet FROM projets WHERE statut = "horsserie"');	
$catHS =$catconnec->fetch(PDO::FETCH_ASSOC);
 $cathorsserie=$catHS['idProjet'];
// echo $cathorsserie."<br/>";
$catconnec->closeCursor();

// pour les animes
$catconnec= $bdd->query('SELECT COUNT(id) as idProjet FROM projets WHERE statut = "anime"');	
$catAN =$catconnec->fetch(PDO::FETCH_ASSOC);
 $catanime=$catAN['idProjet'];
// echo $catanime."<br/>";
$catconnec->closeCursor();

// pour les jeux
$catconnec= $bdd->query('SELECT COUNT(id) as idProjet FROM projets WHERE statut = "jeux"');	
$catG =$catconnec->fetch(PDO::FETCH_ASSOC);
 $catjeux=$catG['idProjet'];
// echo $catjeux."<br/>";
$catconnec->closeCursor();

?>
