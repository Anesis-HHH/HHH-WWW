<?php
/*
 * CommentProjet.php
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

require 'Commentaires.php';
/**
 * Cette classe hérite de la classe Commentaires.
 * 
 * Elle sert à gérer les commantaires des projets du site de la HHH.

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
 * */
 class CommentProjet extends Commentaires
 {
	 public function ajouterCom($pseudo, $commentaire, $idProjet)
	 {
		 //Protection des variables
		 $pseu = htmlspecialchars($pseudo);
		 $com = htmlspecialchars($commentaire);
		 
		 try
		 {
			 $ajout = $this->connect->prepare('INSERT INTO commentaire_projets SET pseudo = :pseu, commentaire = :comm, id_projet = :idPro, timestamp = :time');
			 
			 $ajout->bindValue(':pseu', $pseu);
			 $ajout->bindValue(':comm', $com);
			 $ajout->bindValue('idPro', $idProjet, PDO::PARAM_INT);
			 $ajout->bindValue(':time', time(), PDO::PARAM_INT);
			 
			 $ajout->execute();
			 
			 $ajout->closeCursor();
			 
			 echo 'Votre commentaire a bien été ajouté';
		 }
		catch(Exception $e)
		{
			exit('Erreur : ' . $e->getMessage());
		}
	 }
	 public function supprimerCom($idCom)
	 {
		$del = $this->connect->exec('DELETE FROM commentaire_projets WHERE id = '. $idCom);
	  
		$del->closeCursor();
		
		echo 'Le commentaire a été supprimé.';
	 }
	 public function lister($id)
	 {
		 $list = $this->connect->query('SELECT * FROM commentaire_projets WHERE id_projet = '. $id. ' ORDER BY timestamp DESC');
		 
		 echo'<div id="commclose">&times;</div>
			<div id="commentaire_entete">Commentaires</div><div id="commentaire_content">';
		 while($listeCom = $list->fetch(PDO::FETCH_ASSOC))
		 {
			 $comment = str_replace('&lt;/p&gt;&lt;div class=&quot;quote&quot;&gt;', '', $listeCom['commentaire']);
			 $comment = str_replace('&lt;br/&gt;', ' ', $comment);
			 $comment = str_replace('&lt;/div&gt;&lt;p&gt;', ' ', $comment);
			 $comment = str_replace('&amp;quot;', '', $comment);
			 
			echo '
						<div class="commentaire_auteur">Par '.$listeCom['pseudo'].', le '. date('d/m/Y - H', $listeCom['timestamp']) .'h'.date('i', $listeCom['timestamp']);
			echo '</div><p>'.stripcslashes(nl2br($comment)).
			'</p>';
		 }
		 echo '</div>';
		 
		 $list->closeCursor();
	 }
 }
?>
