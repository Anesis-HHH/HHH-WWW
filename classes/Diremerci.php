<?php
/*
 * CommentNews.php
 * 
 * Copyright 2014 Unknown <marlene@freenx>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

/**
                         ___     ___
                ___   __|   |   |   |__   ___
               /  /  / /|   |   |   |\ \  \  \
              /  /  / / |   |___|   | \ \  \  \
             /  /__/ /  |           |  \ \__\  \
            /  __   /   |    ___    |   \   __  \
           /  / /  /    |   |   |   |    \  \ \  \
 _________/__/ /__/_____|___|   |___|_____\__\ \__\__________
|############################################################|
|       HARDCORE           HENTAI           HEADQUARTER      |
|############################################################|
|###########_____SITE V3 - POLE DEVELOPPEMENT_____###########|
 * */
 class Diremerci 
 {
 
 protected $connect;
	
	/**
	 * Constructeur de la classe
	* */
	public function Diremerci()
	{
		$this->setConnexion();
	}
	/**
    * Initialise la connexion à la bdd
    **/
	public function setConnexion()
	{
		include dirname(__FILE__).'/../include/connexionBdd.php';
		$this->connect = $bdd;
	}
	
	
	 public function ajouterMerci($id_news, $confirmation)
	 {
		 
	if(isset($id_news)&& isset($confirmation))
	{
		
		//On va chercher le nombre de merci dans la bdd
		$merci = $this->connect->prepare('SELECT * FROM news WHERE id = :idnews');
		
		$merci->bindValue(':idnews', $id_news);
		$merci->execute();
		
		while($plusun = $merci->fetch(PDO::FETCH_ASSOC))
		{ 
			//On incrémente le nombre de téléchargement de 1
			$nbmerci = intval($plusun['merci']) + 1;
			
			$ajoute = $this->connect->prepare('UPDATE news SET merci = :nbmerci WHERE id = :idnews');
			
			$ajoute->bindValue(':nbmerci', $nbmerci);
			$ajoute->bindValue(':idnews', $id_news);
			$ajoute->execute();
			
			$ajoute->closeCursor();
		}
		$merci->closeCursor();
		echo "merci ajouté";
	} 
		 
		 
		 
		 
		 
		 
		 
	 } //end fonction
	
 } // end class
?>
