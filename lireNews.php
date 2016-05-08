<?php
/*
 * lireNews.php
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
require 'classes/NewsManager.php';
require 'classes/seoFriend.php';

// $titreN = str_replace('-', ' ', $_GET['titre']);

if(!isset($_GET['request'])) $_GET['request'] = "normal";
// si on ne passe pas par l'ajax
if($_GET['request'] != 'ajax'){

	if(isset($_GET['idnews']) && !empty($_GET['idnews'])){
		$idInt = intval($_GET['idnews']);
		$titredelanews = new SeoFriend();
		$titreNews=$titredelanews->titreNews($idInt);
	}
	
	$titredelapage=$titreNews;
	include 'include/head.php';
}

	
	//Vérification de l'existance de la variable d'identification de la news à lire
	if(isset($_GET['idnews']))
	{
		//On vérifie que la variable id ne soit pas vide
		if(!empty($_GET['idnews']))
		{
			//Par sécurité on repasse la variable en int
			$idInt = intval($_GET['idnews']);
			
			//On crée un nouvel objet NewsManager
			$newsAlire = new NewsManager();
			
			//echo '<section id="couloir">';
			//On utilise la fonction pour lire la news
			$newsAlire->lireNews($idInt);
			//echo '</section>';
		}
	}
	
if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
}
	?>
