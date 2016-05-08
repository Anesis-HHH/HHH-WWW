<?php
require 'classes/ProjetManager.php';

	if(isset($_POST["fd_note"]) && !empty($_POST["fd_note"]) && isset($_POST["fd_projet"]) && !empty($_POST["fd_projet"])){

		$note=$_POST["fd_note"];// !!!!! attention, valeur de type string pas int, de -1 à 2
		$idprojet=$_POST["fd_projet"];// !!!!! attention, valeur de type string
		echo "note : ".$note."<br/>"; // !!!!! attention, valeur de type string pas int
		echo "projet : ".$idprojet."<br/>"; // !!!!! attention, valeur de type string pas int
		
		//Création d'un objet ProjetManager
		$voter = new ProjetManager();
		//appel de la fonction qui met à jour la note du projet
		$voter->noterProjet($idprojet, $note);
		echo "projetnoté";
	}
	else {
		echo "il manque un POST";
	}

?>
