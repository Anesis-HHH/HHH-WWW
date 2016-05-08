<?php


	if(isset($_POST["fd_name"]) && !empty($_POST["fd_name"]) && isset($_POST["fd_content"]) && !empty($_POST["fd_content"]) && empty($_POST["fd_dumbot"])){

		
		$nom=$_POST["fd_name"];
		$email=$_POST["fd_mail"]; // PAS OBLIGATOIRE
		$contenu=$_POST["fd_content"];
		// echo "nom : ".$nom."<br/>";
		// echo "mail : ".$email."<br/>";
		// echo "contenu : ".$contenu;
		include("classes/mailer.php");
	}

?>
