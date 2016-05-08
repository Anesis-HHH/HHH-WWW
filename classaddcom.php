<?php
require 'classes/CommentNews.php';

	if(isset($_POST["fd_idnews"]) && !empty($_POST["fd_idnews"]) && isset($_POST["fd_name"]) && !empty($_POST["fd_name"]) && isset($_POST["fd_content"]) && !empty($_POST["fd_content"]) && empty($_POST["fd_dumbot"])){

		$idnews=$_POST["fd_idnews"];
		$nom=$_POST["fd_name"];
		$contenu=$_POST["fd_content"];
		echo "idnews : ".$idnews."<br/>";
		echo "nom : ".$nom."<br/>";
		echo "contenu : ".$contenu;
		
		//Création d'un objet CommentNews
		$postCom = new CommentNews();
		//On appelle la méthode qui va enregistrer le commmentaire dans la bdd
		$postCom->ajouterCom($nom, $contenu, $idnews);
	}

?>
