<?php
/*
 * Commentaires.php
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
 * Cette classe abstraite est parentes des classes CommentNews et CommentProjet.
 * 
 * Elle sert a lister les fonctions que les classes filles doivent définir. Elle
 * comporte également leurs fonctions communes afin de ne pas les écrire en double.
 
 
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

 * @author Yumemi <yumemi.kamachi@gmail.com>
 * @version 1.0
 * 
 * @var	PDO	$connect	contient la connexion à la base de données
 * */
abstract class Commentaires
{
	protected $connect;
	
	/**
	 * Constructeur de la classe
	 * */
	 public function __construct()
	 {
		 $this->setConnexion();
	 }
	 public function Commentaires()
	 {
		 self::__construct();
	 }
	 /**
	  * Initialise la connexion à la base de données
	  * */
	 public function setConnexion()
	 {
		include dirname(__FILE__).'/../include/connexionBdd.php';
		$this->connect = $bdd;
	 }
	 /**
	  * Ajoute un commentaire
	  * 
	  * @param	string	$pseudo			pseudo de la personen postant le commentaire
	  * @param	string	$commentaire	contenu du commentaire
	  * */
	 abstract protected function ajouterCom($pseudo, $commentaire, $id);
	 /**
	  * Supprime un commentaire. Accessible uniquement aux membres de la team autorisés
	  * dans la partie administrative.
	  * 
	  * @param	int	$idCom		identifiant du commentaire
	  * */
	 abstract protected function supprimerCom($idCom);
	 /**
	  * Liste tout les commentaires associés à une news ou un projet
	  * 
	  * @param	int		$id			identifiant de la news ou du projet
	  * */
	  abstract protected function lister($id);
	 
}
?>
