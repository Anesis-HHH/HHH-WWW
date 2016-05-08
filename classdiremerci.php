<?php
require 'classes/Diremerci.php';

	if(isset($_POST["confim"]) && !empty($_POST["confim"]) && isset($_POST["fd_idnews"]) && !empty($_POST["fd_idnews"])){

		$id_news=$_POST["fd_idnews"];// !!!!! attention, valeur de type string pas int
		$confirmation=$_POST["confim"];
		echo "id_news : ".$id_news."<br/>"; // !!!!! attention, valeur de type string pas int
		echo "confirmation : ".$confirmation."<br/>";
		//Création d'un dire merci
		$postCom = new Diremerci();
		//On appelle la méthode qui va enregistrer le merci dans la bdd
		$postCom->ajouterMerci($id_news, $confirmation);
	}

?>
