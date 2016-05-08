<?php
require 'classes/CommentProjet.php';

	if(isset($_POST["fd_idprojet"]) && !empty($_POST["fd_idprojet"]) && isset($_POST["fd_name"]) && !empty($_POST["fd_name"]) && isset($_POST["fd_content"]) && !empty($_POST["fd_content"]) && empty($_POST["fd_dumbot"])){

		$idprojet=$_POST["fd_idprojet"];
		$nom=$_POST["fd_name"];
		$contenu=$_POST["fd_content"];
		echo "idprojet : ".$idprojet."<br/>";
		echo "nom : ".$nom."<br/>";
		echo "contenu : ".$contenu;
		
		//Création d'un objet CommentProjet
		$postCom = new CommentProjet();
		//On appelle la méthode qui va enregistrer le commmentaire dans la bdd
		$postCom->ajouterCom($nom, $contenu, $idprojet);
	}

?>
