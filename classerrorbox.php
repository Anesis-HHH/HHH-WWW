<?php


	if(isset($_POST["fd_errortype"]) && !empty($_POST["fd_errortype"]) && isset($_POST["fd_errortitre"]) && !empty($_POST["fd_errortitre"]) && isset($_POST["fd_content"]) && !empty($_POST["fd_content"]) && empty($_POST["fd_dumbot"])){

		
		$errortype=$_POST["fd_errortype"];
		$errortitre=$_POST["fd_errortitre"]; 
		$contenu=$_POST["fd_content"];
		echo "erreur : ".$errortype."<br/>";
		echo "titre : ".$errortitre."<br/>";
		echo "contenu : ".$contenu;
		include("classes/errormailer.php");
	}

?>
