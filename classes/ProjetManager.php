<?php 
/*
 * ProjetManager.php
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
setlocale(LC_CTYPE, 'fr_FR');
/**
 * Cette classe gère les projets du site web de la HHH.
 * 
 * Elle contient également des fonctions permettant de
 * lister les projets en cours et ceux terminés en plus
 * de celles d'ajout, suppression et modification.
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
 * @var	PDO	$connect	contient la connexion à la bdd
 * */
 require 'toolz.php';
class ProjetManager
{
	protected $connect;
	
	/**
	 * Constructeur de la classe
	* */
	public function ProjetManager()
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
	/**
	 * Renvoie la note du projet demandé
	 * 
	 * @param	int	$idn	id du projet
	 **/
	public function afficherNote($idn)
	{
		$aff = $this->connect->prepare('SELECT * FROM notation WHERE id_projet = :idn');
		$aff->bindValue(':idn', $idn, PDO::PARAM_INT);
		$aff->execute();
		
		$arraynote= array();
		$note = 0;
		while($liste = $aff->fetch(PDO::FETCH_ASSOC))
		{
			$note = $liste['vote'];
			$nbnote = $liste['nombre_vote'];
			
			array_push($arraynote, $note);
			array_push($arraynote, $nbnote);
		}
		
		$aff->closeCursor();
		
		return $arraynote;	
	}
	/**
	 * Met à jour la note d'un projet
	 * 
	 * @param	int	$idp	id du projet
	 * @param	int	$vote	nombre de point à rajouter au projet
	 **/
	public function noterProjet($idp, $vote)
	{
		$idproj = intval($idp);
		$note = $this->afficherNote($idproj);
		$note = intval($note[0]) + intval($vote);
		
		//On cherche le nombre de vote dans la bdd
		$nombre = $this->connect->prepare('SELECT nombre_vote FROM notation WHERE id_projet = :id');
		$nombre->bindValue(':id', $idproj, PDO::PARAM_INT);
		$nombre->execute();
		
		while($plusun = $nombre->fetch(PDO::FETCH_ASSOC))
		{
			//On ajoute un vote
			$nbVo = intval($plusun['nombre_vote']) + 1;
		
			$aff = $this->connect->prepare('UPDATE notation SET vote = :note, nombre_vote = :nbVote WHERE id_projet = :idp');
			$aff->bindValue(':idp', $idproj, PDO::PARAM_INT);
			$aff->bindValue(':note', $note, PDO::PARAM_INT);
			$aff->bindValue(':nbVote', $nbVo, PDO::PARAM_INT);
			$aff->execute();
		
			$aff->closeCursor();
		}
		$nombre->closeCursor();
	}
	/**
	 * Permet de créer un nouveau projet.
	 * 
	 * @param	string	$cat		statut du projet (en cours, complet,...)
	 * @param	string	$titre		titre du projet
	 * @param	string	$titrej		titre japonais
	 * @param	string	$titrer		titre japonais en romanji
	 * @param	string	$couv		lien vers la couverture du projet
	 * @param	string	$ext		lien vers l'extrait
	 * @param	string	$aut		auteur
	 * @param	string	$vol		nombre de volume
	 * @param	string	$gen1		genre 1
	 * @param	string	$gen2		genre 2
	 * @param	string	$gen3		genre 3
	 * @param	string	$edj		éditeur japonais
	 * @param	string	$tradus		traducteur us
	 * @param	string	$nbchap		nombre de chapitre
	 * @param	string	$res		résumé du projet
	 * @param	string	$stat		indique si le projet est licencié en France (oui, non)
	 * */
	public function addProjet($cat, $titre, $titrej, $titrer, $couv, $ext, $aut, $vol, $gen1, $gen2, $gen3, $edj, $tradus, $nbchap, $res, $stat)
	{//vérifier si on enlève les paramètres annee et licence
		$newproj = $this->connect->prepare('INSERT INTO projets SET
		licencie = :licencie,
		titre = :titre,
		titre_jap = :titrej,
		titre_romanji = :titrer,
		couverture = :couv,
		extrait = :extrait,
		auteur = :auteur,
		volume = :volume,
		genre1 = :gen1,
		genre2 = :gen2,
		genre3 = :gen3,
		editeur_jap = :edjap,
		traduction_us = :tradus,
		nombre_chapitre = :nbchap,
		resume = :resume,
		statut = :statut');
		
		$newproj->bindValue(':licencie', $stat);
		$newproj->bindValue(':titre', $titre);
		$newproj->bindValue(':titrej', $titrej);
		$newproj->bindValue(':titrer', $titrer);
		$newproj->bindValue(':couv', $couv);
		$newproj->bindValue(':extrait', $ext);
		$newproj->bindValue(':auteur', $aut);
		$newproj->bindValue(':volume', $vol);
		//$newproj->bindValue(':annee', $ann);
		$newproj->bindValue(':gen1', $gen1);
		$newproj->bindValue(':gen2', $gen2);
		$newproj->bindValue(':gen3', $gen3);
		$newproj->bindValue(':edjap', $edj);
		$newproj->bindValue(':tradus', $tradus);
		//$newproj->bindValue(':tradfr', $tradfr);
		$newproj->bindValue(':nbchap', $nbchap);
		$newproj->bindValue(':resume', $res);
		$newproj->bindValue(':statut', $cat);
		//$newproj->bindValue(':licence', $lic);
		
		$newproj->execute();
		
		$newproj->closeCursor();
		
		//On ajoute une ligne dans la table notation pour que les utilisateurs puissent voter pour le projet
		$proj = $this->connect->query('SELECT * FROM projets ORDER BY id DESC LIMIT 0, 1');
		
		$infoPro = $proj->fetch();
		// on vote pour 1 afin d'éviter la division par zéro des stats
		$newNote = $this->connect->prepare('INSERT INTO notation SET id_projet = :idPro, vote = 1, nombre_vote = 1');
		$newNote->bindValue(':idPro', $infoPro['id'], PDO::PARAM_INT);
		$newNote->execute();
		
		$newNote->closeCursor();
		
		$proj->closeCursor();
	}
	/**
	 * Supprime un projet.
	 * */
	public function delProjet($idSuppr)
	{
		$del = $this->_db->connect('DELETE FROM projets WHERE id = '. $idSuppr);
	  
		$del->closeCursor();
	}
	/**
	 * Modifie un projet. Par exemple pour lui rajouter un chapitre.
	 * 
	 * @param	string	$cat		statut du projet (en cours, complet,...)
	 * @param	string	$titre		titre du projet
	 * @param	string	$titrej		titre japonais
	 * @param	string	$titrer		titre japonais en romanji
	 * @param	string	$couv		lien vers la couverture du projet
	 * @param	string	$ext		lien vers l'extrait
	 * @param	string	$aut		auteur
	 * @param	string	$vol		nombre de volume
	 * @param	string	$gen1		genre 1
	 * @param	string	$gen2		genre 2
	 * @param	string	$gen3		genre 3
	 * @param	string	$edj		éditeur japonais
	 * @param	string	$tradus		traducteur us
	 * @param	string	$nbchap		nombre de chapitre
	 * @param	string	$res		résumé du projet
	 * @param	string	$stat		indique si le projet est licencié en France (oui, non)
	 * @param	string	$idPro		identifiant du projet dans la bdd
	 **/
	public function modProjet($cat, $titre, $titrej, $titrer, $couv, $ext, $aut, $vol, $gen1, $gen2, $gen3, $edj, $tradus, $nbchap, $res, $stat, $idPro)
	{
		$idPro = intval($idPro);
		
		$modproj = $this->connect->prepare('UPDATE projets SET
		licencie = :licencie,
		titre = :titre,
		titre_jap = :titrej,
		titre_romanji = :titrer,
		couverture = :couv,
		extrait = :extrait,
		auteur = :auteur,
		volume = :volume,
		genre1 = :gen1,
		genre2 = :gen2,
		genre3 = :gen3,
		editeur_jap = :edjap,
		traduction_us = :tradus,
		nombre_chapitre = :nbchap,
		resume = :resume,
		statut = :statut
		WHERE id= :idPro');
		
		$modproj->bindValue(':licencie', $stat);
		$modproj->bindValue(':titre', $titre);
		$modproj->bindValue(':titrej', $titrej);
		$modproj->bindValue(':titrer', $titrer);
		$modproj->bindValue(':couv', $couv);
		$modproj->bindValue(':extrait', $ext);
		$modproj->bindValue(':auteur', $aut);
		$modproj->bindValue(':volume', $vol);
		//$modproj->bindValue(':annee', $ann);
		$modproj->bindValue(':gen1', $gen1);
		$modproj->bindValue(':gen2', $gen2);
		$modproj->bindValue(':gen3', $gen3);
		$modproj->bindValue(':edjap', $edj);
		$modproj->bindValue(':tradus', $tradus);
		//$modproj->bindValue(':tradfr', $tradfr);
		$modproj->bindValue(':nbchap', $nbchap);
		$modproj->bindValue(':resume', $res);
		$modproj->bindValue(':statut', $cat);
		$modproj->bindValue(':idPro', $idPro, PDO::PARAM_INT);
		//$modproj->bindValue(':licence', $lic);
		
		$modproj->execute();
		
		$modproj->closeCursor();
	}
	/**
	 * Ajoute un download
	 * 
	 * @param	string	$titre		titre du projet auquel est relié le download
	 * @param	string	$num		numéro du chapitre
	 * @param	string	$lien		nom du fichier composant le download (type : [HHH]titre.rar)
	 * @param	string	$trad		traducteur du chapitre
	 * @param	string	$check		checkeur du chapitre
	 * @param	string	$edit		éditeur du chapitre
	 * @param	string	$qcheck		qcheckeur du chapitre
	 */
	 public function addDownload($titre, $num, $lien, $trad, $check, $edit, $qcheck)
	 {
		 //Si c'est une intégrale on met le numéro de release sur N/A
		 if(strcmp($num, 'integrale') == 0)
		 {
			 /*
			 $newdow = $this->connect->prepare('INSERT INTO download2 SET 
				titre = :titre,
				numero_chapitre = :num, 
				dl = :lien,
				traducteur = :trad,
				check = :check,
				$editeur = :edit,
				qcheck = :qcheck,
				timestamp = :time,
				numero = :inte');
			*/
			$newdow = $this->connect->prepare('INSERT INTO download2 VALUES("", :titre, "", :trad, :check, :edit, :qcheck, :num, :lien, "", "", :time, :inte)');
				
			$newdow->bindValue(':titre', $titre);
			
			$newdow->bindValue(':trad', $trad);
			$newdow->bindValue(':check', $check);
			$newdow->bindValue(':edit', $edit);
			$newdow->bindValue(':qcheck', $qcheck);
			$newdow->bindValue(':num', $num);
			$newdow->bindValue(':lien', $lien);
			$newdow->bindValue(':time', time());
			$newdow->bindValue(':inte', 'N/A', PDO::PARAM_STR);
			
			$newdow->execute();
			$newdow->closeCursor();
		 }
		 else //Sinon on prend le dernier numéro de release et on ajoute 1
		 {
			 //on récupère le dernier numéro de release
			 //$real = $this->connect->prepare('SELECT * FROM download2 WHERE timestamp = MAX(timestamp) AND numero != :inte');
			 try
			 {
				 //On ajoute une ligne dans la table notation pour que les utilisateurs puissent voter pour le projet
				$real = $this->connect->prepare('SELECT * FROM download2 WHERE numero_chapitre != :inte ORDER BY id DESC LIMIT 0, 1');
					 
			 //$real = $this->connect->prepare('SELECT * FROM download2 WHERE id = (SELECT MAX(id) FROM download2) AND numero_chapitre != :inte');
			 $real->bindValue(':inte', 'integrale', PDO::PARAM_STR);
			 $real->execute();
			 }
			catch(Exception $e)
			 {
				exit('Erreur : ' . $e->getMessage());
			 }
			 $dateinsert = time();
			 $numreal = 0;
			 while( $affiche = $real->fetch(PDO::FETCH_ASSOC))
			 {
				 $numreal = intval($affiche['numero']) + 1;
			 }
			 $real->closeCursor();
			 /*
			 $newdow = $this->connect->prepare('INSERT INTO download2 SET 
					titre = :titre,
					numero_chapitre = :num, 
					dl = :lien,
					traducteur = :trad,
					check = :check,
					editeur = :edit,
					qcheck = :qcheck,
					numero = :real,
					timestamp = :time'
					);
			*/
			//$newdow = $this->connect->prepare('INSERT INTO download2 (titre, traducteur, check, editeur, qcheck, numero_chapitre, dl, timestamp, numero) VALUES (:titre, :trad, :check, :edit, :qcheck, :num, :lien, :time, :real)');
			$newdow = $this->connect->prepare('INSERT INTO download2 VALUES("", :titre, "", :trad, :check, :edit, :qcheck, :num, :lien, "", "", :time, :real)');
					
			$newdow->bindParam(':titre', $titre);
			
			$newdow->bindParam(':trad', $trad);
			$newdow->bindParam(':check', $check);
			$newdow->bindParam(':edit', $edit);
			$newdow->bindParam(':qcheck', $qcheck);
			$newdow->bindParam(':num', $num);
			$newdow->bindParam(':lien', $lien);
			
			$newdow->bindParam(':time', $dateinsert, PDO::PARAM_INT);
			$newdow->bindParam(':real', $numreal);
			
			//print_r($newdow->execute());
			$newdow->execute();
			$newdow->closeCursor();
		}
	 }
	 /**
	 * Modifie un download
	 * 
	 * @param	int		$id			id de la release
	 * @param	string	$titre		titre du projet auquel est relié le download
	 * @param	string	$num		numéro du chapitre
	 * @param	string	$lien		nom du fichier composant le download (type : [HHH]titre.rar)
	 * @param	string	$trad		traducteur du chapitre
	 * @param	string	$check		checkeur du chapitre
	 * @param	string	$edit		éditeur du chapitre
	 * @param	string	$qcheck		qcheckeur du chapitre
	 */
	 public function modDownload($id, $titre, $num, $lien, $trad, $check, $edit, $qcheck)
	 {
		 $idInt = intval($id);
		 
		 //*
			 //$newdow = $this->connect->prepare("UPDATE 'download2' SET 'titre'=:titre, 'traducteur'=:trad, 'checkeur'=:checkeur, 'editeur'=:edit, 'qcheck'=:qcheck, 'numero_chapitre'=:num, 'dl'=:lien WHERE 'id'=:id");
			
			$newdow = $this->connect->prepare('UPDATE download2 SET titre=:titre, traducteur=:trad, checkeur=:checkeur, editeur=:edit, qcheck=:qcheck, numero_chapitre=:num, dl=:lien WHERE id=:id');
			
			//$newdow = $this->connect->prepare('UPDATE download2 SET VALUES(:titre, "", :trad, :check, :edit, :qcheck, :num, :lien) WHERE id = :id');
			
			$newdow->bindValue(':id', $idInt, PDO::PARAM_INT);	
			$newdow->bindValue(':titre', $titre);
			$newdow->bindValue(':trad', $trad);
			$newdow->bindValue(':checkeur', $check);
			$newdow->bindValue(':edit', $edit);
			$newdow->bindValue(':qcheck', $qcheck);
			$newdow->bindValue(':num', $num);
			$newdow->bindValue(':lien', $lien);
			
			
			$newdow->execute();
			$newdow->closeCursor();
			//*/
			//$newdow = $this->connect->exec('UPDATE download2 SET titre='.$this->connect->quote($titre).', traducteur='.$this->connect->quote($trad).', check='.$this->connect->quote($check).', editeur='.$this->connect->quote($edit).', qcheck='.$this->connect->quote($qcheck).', numero_chapitre='.$this->connect->quote($num).', dl ='.$this->connect->quote($lien).' WHERE id='.$idInt);
	 }
	/**
	 *Liste tous les dowload
	 * 
	 *@return	array	$tabDown	tableau contenant la liste des download 
	 */
	 public function listDownload()
	 {
		 //*
		 $down = $this->connect->query('SELECT * FROM download2 ORDER BY timestamp DESC, numero DESC');
		 
		 $tabDown = array();
		 
		 while($liste = $down->fetch(PDO::FETCH_ASSOC))
		 {
			 $tabl['id'] = $liste['id'];
			 $tabl['numero'] = $liste['numero'];
			 $tabl['titre'] = $liste['titre'];
			 $tabl['numero_chapitre'] = $liste['numero_chapitre'];
			 $tabl['traducteur'] = $liste['traducteur'];
			 $tabl['checkeur'] = $liste['checkeur'];
			 $tabl['editeur'] = $liste['editeur'];
			 $tabl['qcheck'] = $liste['qcheck'];
			 $tabl['numero_chapitre'] = $liste['numero_chapitre'];
			 $tabl['dl'] = $liste['dl'];
			 $tabl['timestamp'] = $liste['timestamp'];
			 $tabl['pop'] = $liste['pop'];
			 
			 array_push($tabDown, $tabl);
		 }
		 $down->closeCursor();
		 
		 return $tabDown;
		 //*/
		 
	 }
	/**
	 * Liste tous les projets.
	 * 
	 * @return	array	$tabProjets		tableau contenant la liste des projets
	 * */
	public function listProjet()
	{
		$onGoing = $this->connect->query('SELECT * FROM projets ORDER BY titre ASC');
		
		$tabProj = array();
		
		while($enCours = $onGoing->fetch(PDO::FETCH_ASSOC))
		{
			//*
			$projets['id']= $enCours['id'];
			$projets['categorie']= $enCours['categorie'];
			$projets['titre'] = $enCours['titre'];
			$projets['titre_jap'] = $enCours['titre_jap'];
			$projets['titre_romanji'] = $enCours['titre_romanji'];
			$projets['couverture'] = $enCours['couverture'];
			$projets['extrait'] = $enCours['extrait'];
			$projets['auteur'] = $enCours['auteur'];
			$projets['volume'] = $enCours['volume'];
			$projets['annee'] = $enCours['annee'];
			$projets['genre1'] = $enCours['genre1'];
			$projets['genre2'] = $enCours['genre2'];
			$projets['genre3'] = $enCours['genre3'];
			$projets['editeur_jap']= $enCours['editeur_jap'];
			$projets['trad_us'] = $enCours['traduction_us'];
			$projets['trad_fr'] = $enCours['traduction_fr'];
			//$projets['check'] = $enCours['check'];
			$projets['edition'] = $enCours['edition'];
			//$projets['qcheck'] = $enCours['qcheck'];
			$projets['nbChap'] = $enCours['nombre_chapitre'];
			$projets['resume'] = $enCours['resume'];
			$projets['release'] = $enCours['release'];
			$projets['statut'] = $enCours['statut'];
			$projets['licencie'] = $enCours['licencie'];
			//*/
			
			array_push($tabProj, $projets);
		}
		
		$onGoing->closeCursor();
		
		return $tabProj;
	}
	/**
	 * Donne la liste de toutes les releases pour la partie publique du site
	 * 
	 * @return	array	$tabliste	tableau contenant la liste des releases
	 **/
	public function listDownPublic()
	{
		//On récupère d'abord la liste des downloads
		$telechar = $this->listDownload();
		
		$tabliste = array();
		foreach($telechar as $ele)
		{
			//Avec le titre du download on récupère les infos dont on a besoin dans la table projets
			$info = $this->connect->prepare('SELECT * FROM projets WHERE titre = :titre');
			$info->bindValue(':titre', $ele['titre']);
			$info->execute();
			
			while( $listed = $info->fetch(PDO::FETCH_ASSOC))
			{
				$data['id'] = $listed['id'];
				$data['titre'] = $ele['titre'];
				$data['numero_chapitre'] = $ele['numero_chapitre'];
				$data['genre1'] = $listed['genre1'];
				$data['genre2'] = $listed['genre2'];
				$data['genre3'] = $listed['genre3'];
				$data['categorie'] = $listed['categorie'];
				$data['auteur'] = $listed['auteur'];
				$data['genre1'] = $listed['genre1'];
				$data['timestamp'] = $ele['timestamp'];
				$data['pop'] = $ele['pop'];
				$data['dl'] = $ele['dl'];
				$data['numero'] = $ele['numero'];
				
				array_push($tabliste, $data);
			}
			
			$info->closeCursor();
		}
		
		return $tabliste; 
	}
	/**
	 * Liste les projets en cours.
	 * 
	 * @return	array	$tabProjets		tableau contenant la liste des projets en cours
	 * */
	public function goingProjet()
	{
		$onGoing = $this->connect->query('SELECT * FROM projets WHERE statut="en cours" ORDER BY titre ASC');
		
		$tabProj = array();
		
		while($enCours = $onGoing->fetch(PDO::FETCH_ASSOC))
		{
			//*
			$projets['id']= $enCours['id'];
			$projets['categorie']= $enCours['categorie'];
			$projets['titre'] = $enCours['titre'];
			$projets['titre_jap'] = $enCours['titre_jap'];
			$projets['titre_romanji'] = $enCours['titre_romanji'];
			$projets['couverture'] = $enCours['couverture'];
			$projets['extrait'] = $enCours['extrait'];
			$projets['auteur'] = $enCours['auteur'];
			$projets['volume'] = $enCours['volume'];
			$projets['annee'] = $enCours['annee'];
			$projets['genre1'] = $enCours['genre1'];
			$projets['genre2'] = $enCours['genre2'];
			$projets['genre3'] = $enCours['genre3'];
			$projets['editeur_jap']= $enCours['editeur_jap'];
			$projets['trad_us'] = $enCours['traduction_us'];
			$projets['trad_fr'] = $enCours['traduction_fr'];
			//$projets['check'] = $enCours['check'];
			$projets['edition'] = $enCours['edition'];
			//$projets['qcheck'] = $enCours['qcheck'];
			$projets['nbChap'] = $enCours['nombre_chapitre'];
			$projets['resume'] = $enCours['resume'];
			$projets['release'] = $enCours['release'];
			$projets['statut'] = $enCours['statut'];
			$projets['licencie'] = $enCours['licencie'];
			//*/
			
			array_push($tabProj, $projets);
		}
		
		$onGoing->closeCursor();
		
		return $tabProj;
	}
	/**
	 * Liste les projets terminés.
	 * 
	 * @return	array	$complete		tableau contenant la liste des projets terminés
	 * */
	public function completeProjet()
	{
		$termine = $this->connect->query('SELECT * FROM projets WHERE statut="complet" ORDER BY titre ASC');
		
		$tabComplet = array();
		
		while($fini = $termine->fetch(PDO::FETCH_ASSOC))
		{
			$complete['id'] = $fini['id'];
			$complete['categorie']= $fini['categorie'];
			$complete['titre'] = $fini['titre'];
			$complete['titre_jap'] = $fini['titre_jap'];
			$complete['titre_romanji'] = $fini['titre_romanji'];
			$complete['couverture'] = $fini['couverture'];
			$complete['extrait'] = $fini['extrait'];
			$complete['auteur'] = $fini['auteur'];
			$complete['volume'] = $fini['volume'];
			$complete['annee'] = $fini['annee'];
			$complete['genre1'] = $fini['genre1'];
			$complete['editeur_jap']= $fini['editeur_jap'];
			$complete['trad_us'] = $fini['traduction_us'];
			$complete['trad_fr'] = $fini['traduction_fr'];
			//$complete['check'] = $fini['check'];
			$complete['edition'] = $fini['edition'];
			//$complete['qcheck'] = $fini['qcheck'];
			$complete['nbChap'] = $fini['nombre_chapitre'];
			$complete['resume'] = $fini['resume'];
			$complete['release'] = $fini['release'];
			
			array_push($tabComplet, $complete);
		}
		
		$termine->closeCursor();
		
		return $tabComplet;
	}
	/**
	 * Liste les projets hors série.
	 * 
	 * @return	array	$tabHs		tableau contenant la liste des projets terminés
	 **/
	public function hsProjet()
	{
		$termine = $this->connect->query('SELECT * FROM projets WHERE statut="horsserie" ORDER BY titre ASC');
		
		$tabHs = array();
		
		while($fini = $termine->fetch(PDO::FETCH_ASSOC))
		{
			$complete['id'] = $fini['id'];
			$complete['categorie']= $fini['categorie'];
			$complete['titre'] = $fini['titre'];
			$complete['titre_jap'] = $fini['titre_jap'];
			$complete['titre_romanji'] = $fini['titre_romanji'];
			$complete['couverture'] = $fini['couverture'];
			$complete['extrait'] = $fini['extrait'];
			$complete['auteur'] = $fini['auteur'];
			$complete['volume'] = $fini['volume'];
			$complete['annee'] = $fini['annee'];
			$complete['genre1'] = $fini['genre1'];
			$complete['editeur_jap']= $fini['editeur_jap'];
			$complete['trad_us'] = $fini['traduction_us'];
			$complete['trad_fr'] = $fini['traduction_fr'];
			$complete['edition'] = $fini['edition'];
			$complete['nbChap'] = $fini['nombre_chapitre'];
			$complete['resume'] = $fini['resume'];
			$complete['release'] = $fini['release'];
			
			array_push($tabHs, $complete);
		}
		
		$termine->closeCursor();
		
		return $tabHs;
	}
	/**
	 * Liste les projets anime.
	 * 
	 * @return	array	$tabAn		tableau contenant la liste des projets anime
	 **/
	public function animeProjet()
	{
		$termine = $this->connect->query('SELECT * FROM projets WHERE statut="anime" ORDER BY titre ASC');
		
		$tabAn = array();
		
		while($fini = $termine->fetch(PDO::FETCH_ASSOC))
		{
			$complete['id'] = $fini['id'];
			$complete['categorie']= $fini['categorie'];
			$complete['titre'] = $fini['titre'];
			$complete['titre_jap'] = $fini['titre_jap'];
			$complete['titre_romanji'] = $fini['titre_romanji'];
			$complete['couverture'] = $fini['couverture'];
			$complete['extrait'] = $fini['extrait'];
			$complete['auteur'] = $fini['auteur'];
			$complete['volume'] = $fini['volume'];
			$complete['annee'] = $fini['annee'];
			$complete['genre1'] = $fini['genre1'];
			$complete['editeur_jap']= $fini['editeur_jap'];
			$complete['trad_us'] = $fini['traduction_us'];
			$complete['trad_fr'] = $fini['traduction_fr'];
			$complete['edition'] = $fini['edition'];
			$complete['nbChap'] = $fini['nombre_chapitre'];
			$complete['resume'] = $fini['resume'];
			$complete['release'] = $fini['release'];
			
			array_push($tabAn, $complete);
		}
		
		$termine->closeCursor();
		
		return $tabAn;
	}
	/**
	 * Affiche la fiche du projet demandé
	 * 
	 **/
	public function ficheProjet($idPr)
	{
		$fiche = $this->connect->prepare('SELECT * FROM projets WHERE id = :idProjet');
		$fiche->bindParam('idProjet', $idPr, PDO::PARAM_INT);
		$fiche->execute();
		
		echo '<section>
					<div id="wrapper">';
		
		while($infos = $fiche->fetch(PDO::FETCH_ASSOC))
		{
			//echo 'Passage dans le while de la requete d\'affcihage.<br/>';
			//On récupère les informations dont on a besoin pour le téléchargement dans la table dowload
			//$dowload = $this->connect->prepare('SELECT * FROM download2 WHERE titre = :titreProj ORDER BY numero_chapitre ASC');
			//Après que la colonne licencie de la table projets a été remplie, enlever la ligne du dessus et activer celle de dessous
			//*
			$dowload = $this->connect->prepare('SELECT * FROM download2, projets 
												WHERE download2.titre = projets.titre 
												AND projets.licencie = "non"
												AND download2.titre = :titreProj 
												ORDER BY timestamp ASC');
												//*/
			$dowload->bindParam(':titreProj', $infos['titre']);
			$dowload->execute();
			
			 //On récupère le nombre total de commentaire pour cette news
			 try
			 {
				 $ask = $this->connect->prepare('SELECT COUNT(*) as nbCom FROM commentaire_projets WHERE id_projet= :idp');
				 $ask->bindParam(':idp', $infos['id'], PDO::PARAM_INT);
				 $ask->execute();
			 }
			catch(Exception $e)
			{
				exit('Erreur : ' . $e->getMessage());
			}
			$comm = $ask->fetch();
			// moulinette du systeme de notation
			$note=$this->afficherNote($infos['id']);
			$lanote=intval($note[0]);
			$nbdenote=intval($note[1]);
			$moynote=round($lanote / $nbdenote,2);
			?>
			<div id="asideprojet">
				<div class="imgcontrol">
					<img src="<?php echo 'images/manga/couvertures/'.stripslashes($infos['couverture']); ?>" alt="<?php echo $infos['titre']; ?>">
				</div>
				<a class="projbutton" href="<?php echo 'https://lel.hhh-world.com/?r='.$infos['titre']; ?>" title="Lire le volume en ligne" target="_blank">Lire en ligne</a>
				<div id="projetextrait" class="projbutton"><a href="<?php echo 'images/manga/extraits/'.$infos['extrait']; ?>" title="voir un extrait du volume" >Voir un extrait</a></div>
				<div id="projetcommentaire" class="projbutton" data-idprojet="<?php echo $infos['id']; ?>">Commentaires (<?php echo $comm['nbCom'];?>)</div>
							
					<div id="projetdl">
						<div>Téléchargements</div>
						<?php
						$i = 1;
						while($dow = $dowload->fetch(PDO::FETCH_ASSOC))
						{
							if(strcmp('integrale', $dow['numero_chapitre']) == 0)
							{
								echo '<a href="download.php?release='.$dow['dl'].'">Intégrale</a><span class="dlnb">['. $dow['pop'] .']</span><br/>';
							}
							else
							{
								echo '<a href="download.php?release='.$dow['dl'].'">Chapitre '.$i.'</a><span class="dlnb"> ['. $dow['pop'] .']</span><br/>';
								$i++;
							}
						}
						?>
						</div>
							
						<div id="noteprojet">
							<div class="big">Note :</div>
							<div id="note"><?php  echo $lanote; ?></div>
							<div class="mini"><span class="fakelink"><?php  echo $nbdenote ?></span> notes <br/> <span class="fakelink"><?php echo $moynote ?></span> points par noteurs</div>
							<div id="givenote" class="projbutton">Notez le projet</div>
						</div>
						
						</div>
						
						<div id="ficheprojet">
							<div class="projetitem"><span>Titre original : </span><?php echo $infos['titre_jap']; ?></div>
							<div class="projetitem"><span>Titre romanji : </span><?php echo $infos['titre_romanji']; ?></div>
							<div class="projetitem"><span>Auteur : </span><?php echo $infos['auteur']; ?></div>
							<div class="projetitem"><span>Éditeur : </span><?php echo $infos['editeur_jap']; ?></div>
							<div class="projetitem"><span>Genre : </span>
																	<?php 
																		echo $infos['genre1'];
																		
																		if(strcmp('-', $infos['genre2']) != 0)
																		{
																			echo ', '. $infos['genre2'];
																		}
																		if(strcmp('-', $infos['genre3']) != 0)
																		{
																			echo ', '. $infos['genre3'];
																		}  
																	?>
								</div>
							<div class="projetitem"><span>Nombre de volume : </span><?php echo $infos['volume']; ?></div>
							<div class="projetitem"><span>Nombre de chapitres : </span><?php echo $infos['nombre_chapitre']; ?></div>
							<div class="projetitem"><span>Traduction US : </span><?php echo $infos['traduction_us']; ?></div>
							<div class="projetitem"><span>Traduction : </span><?php echo $infos['traduction_fr']; ?></div>
							<div class="projetitem"><span>Check : </span><?php //echo $infos['check']; ?></div>
							<div class="projetitem"><span>Édition : </span><?php echo $infos['edition']; ?></div>
							<div class="projetitem"><span>Qcheck : </span><?php //echo $infos['qcheck']; ?></div>
							<div class="projetitem"><span>Résumé : </span>
								<p>
									<?php echo stripslashes(nl2br($infos['resume'])); ?>
								</p>
							<br/>
							
							</div>
						</div>
			<?php
			$dowload->closeCursor();
			$ask->closeCursor();
		}
		echo '</div>
			</section>';
			
		$fiche->closeCursor();
	}
	/**
	 * Créer ou met à jour le cache pour la page des projets hors série
	 * 
	 * @return	string	$content	contenu de la page au format html
	 **/ 
	public function cacheHs()
	{
		//On indique dans quel fichier on va stocker le cache
		$cacheHs = 'cache/hors-serie.html';
		
		//DEBUT DE LA MISE EN CACHE
		//Ouverture du tampon
		ob_start();
		
		$tableau = $this->hsProjet();
		
		//On affiche les projets par catégorie
		echo '<section>
					<div id="wrapper">';
		
		foreach($tableau as $elem)
		{
			$paramTitre = str_replace(' ', '-', $elem['titre']);
			$paramTitre = rewriteURL($paramTitre);
		?>
			<div class="projetwrap">
					<div class="projetprez">
						<a href="" title="<?php echo $elem['titre']; ?>">
							<div class="imgcontrol">
								
								<img src="<?php echo 'images/manga/couvertures/'.stripslashes($elem['couverture']); ?>" alt="<?php echo $elem['titre']; ?>">
								
							</div>
							<h3>
								<?php echo $elem['titre']; ?>
							</h3>
						</a>
					</div>
					<div class="projetextend">
						
						<div class="dlink"><a href="ficheprojet.php?idProjet=<?php echo $elem['id']; ?>&amp;titre=<?php echo $paramTitre; ?>" title="Voir le projet" data-link="projet">Voir le projet</a></div>
						
						<div class="dlink" data-link="extrait"><a href="<?php echo 'images/manga/extraits/'.$elem['extrait']; ?>" title="voir un extrait du volume" >Voir un extrait</a></div>
						<div class="dlink">Fermer</div>
						<div class="genre">Genre : <span><?php echo $elem['genre1']; ?></span></div>
							<p>
					
								<?php echo nl2br($elem['resume']); ?>
							</p>
					</div>
			</div>
		<?php
		}
		echo '</div>
				</section>';
		
		
		//on récupère le contenu du tampon dans la variable $contents
		$content = ob_get_contents();
		//Fermeture du tampon
		ob_end_clean();
		
		//on écrit le contenu de notre page au format html dans un fichier
		//file_put_contents($cacheHs, $content);
		//FIN DE LA MISE EN CACHE
		
		return $content;
	}
	/**
	 * Créer ou met à jour le cache pour la page des projets anime
	 * 
	 * @return	string	$content	contenu de la page au format html
	 **/ 
	public function cacheAnime()
	{
		//On indique dans quel fichier on va stocker le cache
		$cacheAn = 'cache/animes.html';
		
		//DEBUT DE LA MISE EN CACHE
		//Ouverture du tampon
		ob_start();
		
		$tableau = $this->animeProjet();
		
		//On affiche les projets par catégorie
		echo '<section>
					<div id="wrapper">';
		
		foreach($tableau as $elem)
		{
			$paramTitre = str_replace(' ', '-', $elem['titre']);
			$paramTitre = rewriteURL($paramTitre);
		?>
			<div class="projetwrap">
					<div class="projetprez">
						<a href="" title="<?php echo $elem['titre']; ?>">
							<div class="imgcontrol">
								
								<img src="<?php echo 'images/manga/couvertures/'.stripslashes($elem['couverture']); ?>" alt="<?php echo $elem['titre']; ?>">
								
							</div>
							<h3>
								<?php echo $elem['titre']; ?>
							</h3>
						</a>
					</div>
					<div class="projetextend">
						
						<div class="dlink"><a href="ficheprojet.php?idProjet=<?php echo $elem['id']; ?>&amp;titre=<?php echo $paramTitre; ?>" title="Voir le projet" data-link="projet">Voir le projet</a></div>
						
						<div class="dlink" data-link="extrait"><a href="<?php echo 'images/manga/extraits/'.$elem['extrait']; ?>" title="voir un extrait du volume" >Voir un extrait</a></div>
						<div class="dlink">Fermer</div>
						<div class="genre">Genre : <span><?php echo $elem['genre1']; ?></span></div>
							<p>
					
								<?php echo nl2br($elem['resume']); ?>
							</p>
					</div>
			</div>
		<?php
		}
		echo '</div>
				</section>';
		
		
		//on récupère le contenu du tampon dans la variable $contents
		$content = ob_get_contents();
		//Fermeture du tampon
		ob_end_clean();
		
		//on écrit le contenu de notre page au format html dans un fichier
		//file_put_contents($cacheAn, $content);
		//FIN DE LA MISE EN CACHE
		
		return $content;
	}
	/**
	 * Créer ou met à jour le cache pour la page des projets en cours.
	 * 
	 * @return	string	$content	contenu de la page au format html
	 **/
	 public function cacheProjetGo()
	 {
		//On indique dans quel fichier on va stocker le cache
		$cachePec = 'cache/projets-en-cours.html';
		
		//DEBUT DE LA MISE EN CACHE
		//Ouverture du tampon
		ob_start();
		
		$tableau = $this->goingProjet();
		
		//On affiche les projets par catégorie
		echo '<section>
					<div id="wrapper">';
		
		foreach($tableau as $elem)
		{
			$paramTitre = str_replace(' ', '-', $elem['titre']);
			$paramTitre = rewriteURL($paramTitre);
		?>
			<div class="projetwrap">
					<div class="projetprez">
						<a href="" title="<?php echo $elem['titre']; ?>">
							<div class="imgcontrol">
								
								<img src="<?php echo 'images/manga/couvertures/'.stripslashes($elem['couverture']); ?>" alt="<?php echo $elem['titre']; ?>">
								
								<?php //echo stripslashes($elem['couverture']); ?>
							</div>
							<h3>
								<?php echo $elem['titre']; ?>
							</h3>
						</a>
					</div>
					<div class="projetextend">
						
						<div class="dlink"><a href="ficheprojet.php?idProjet=<?php echo $elem['id']; ?>&amp;titre=<?php echo $paramTitre; ?>" title="<?php echo $paramTitre; ?>" data-link="projet">Voir le projet</a></div>
						
						<!--
						<div class="dlink"><a href="ficheprojet.php?request=ajax&idProjet=<?php echo $elem['id']; ?>" title="Voir le projet" data-link="projet">Voir le projet</a></div>-->
						<div class="dlink" data-link="extrait"><a href="<?php echo 'images/manga/extraits/'.$elem['extrait']; ?>" title="voir un extrait du volume" >Voir un extrait</a></div>
						<div class="dlink">Fermer</div>
						<div class="genre">Genre : <span><?php echo $elem['genre1']; ?></span></div>
							<p>
					
								<?php echo nl2br($elem['resume']); ?>
							</p>
					</div>
			</div>
		<?php
		}
		echo '</div>
				</section>';
		
		
		//on récupère le contenu du tampon dans la variable $contents
		$content = ob_get_contents();
		//Fermeture du tampon
		ob_end_clean();
		
		//on écrit le contenu de notre page au format html dans un fichier
		//file_put_contents($cachePec, $content);
		//FIN DE LA MISE EN CACHE
		
		return $content;
	 }
	 /**
	 * Créer ou met à jour le cache pour la page des projets en finis.
	 * 
	 * @return	string	$content	contenu de la page au format html
	 **/
	 public function cacheProjetFini()
	 {
		 //On indique dans quel fichier on va stocker le cache
		$cachePf = 'cache/projets_termines.html';
		
		//DEBUT DE LA MISE EN CACHE
		//Ouverture du tampon
		ob_start();
		
		$tableau = $this->completeProjet();
			
		//On affiche les projets par catégorie
		echo '<section>
					<div id="wrapper">';
		
		foreach($tableau as $elem)
		{
			$paramTitre = str_replace(' ', '-', $elem['titre']);
			$paramTitre = rewriteURL($paramTitre);
		?>
			<div class="projetwrap">
					<div class="projetprez">
						<a href="" title="<?php echo $elem['titre']; ?>">
							<div class="imgcontrol">
								<img src="<?php echo 'images/manga/couvertures/'.stripslashes($elem['couverture']); ?>" alt="<?php echo $elem['titre']; ?>">
								
							</div>
							<h3>
								<?php echo $elem['titre']; ?>
							</h3>
						</a>
					</div>
					<div class="projetextend">
						
						<div class="dlink"><a href="ficheprojet.php?idProjet=<?php echo $elem['id']; ?>&amp;titre=<?php echo $paramTitre; ?>" title="<?php echo $paramTitre; ?>" data-link="projet">Voir le projet</a></div>
						<div class="dlink" data-link="extrait"><a href="<?php echo 'images/manga/extraits/'.$elem['extrait']; ?>" title="voir un extrait du volume" >Voir un extrait</a></div>
						<div class="dlink">Fermer</div>
						<div class="genre">Genre : <span><?php echo $elem['genre1']; ?></span></div>
							<p>
					
								<?php echo nl2br($elem['resume']); ?>
							</p>
					</div>
			</div>
		<?php
		}
		echo '</div>
				</section>';
		
		//on récupère le contenu du tampon dans la variable $contents
		$content = ob_get_contents();
		//Fermeture du tampon
		ob_end_clean();
		
		//on écrit le contenu de notre page au format html dans un fichier
		//file_put_contents($cachePf, $content);
		//FIN DE LA MISE EN CACHE
		
		return $content;
	 }
	 	 /**
	 * Liste les projets Jeux.
	 * 
	 * @return	array	$tabAn		tableau contenant la liste des projets anime
	 **/
	public function jeuxProjet()
	{
		$jeux = $this->connect->query('SELECT * FROM projets WHERE statut="jeux" ORDER BY titre ASC');
		
		$tabJe = array();
		
		while($game = $jeux->fetch(PDO::FETCH_ASSOC))
		{
			$joujou['id'] = $game['id'];
			$joujou['categorie']= $game['categorie'];
			$joujou['titre'] = $game['titre'];
			$joujou['titre_jap'] = $game['titre_jap'];
			$joujou['titre_romanji'] = $game['titre_romanji'];
			$joujou['couverture'] = $game['couverture'];
			$joujou['extrait'] = $game['extrait'];
			$joujou['auteur'] = $game['auteur'];
			$joujou['volume'] = $game['volume'];
			$joujou['annee'] = $game['annee'];
			$joujou['genre1'] = $game['genre1'];
			$joujou['editeur_jap']= $game['editeur_jap'];
			$joujou['trad_us'] = $game['traduction_us'];
			$joujou['trad_fr'] = $game['traduction_fr'];
			$joujou['edition'] = $game['edition'];
			$joujou['nbChap'] = $game['nombre_chapitre'];
			$joujou['resume'] = $game['resume'];
			$joujou['release'] = $game['release'];
			
			array_push($tabJe, $joujou);
		}
		
		$jeux->closeCursor();
		
		return $tabJe;
	}
	 /**
	 * Créer ou met à jour le cache pour la page des jeux.
	 * 
	 * @return	string	$content	contenu de la page au format html
	 **/
	 public function cacheJeux()
	 {
		 //On indique dans quel fichier on va stocker le cache
		$cachePf = 'cache/projets_jeux.html';
		
		//DEBUT DE LA MISE EN CACHE
		//Ouverture du tampon
		ob_start();
		
		$tableau = $this->jeuxProjet();
			
		//On affiche les projets par catégorie
		echo '<section>
					<div id="wrapper">';
		
		foreach($tableau as $elem)
		{
			$paramTitre = str_replace(' ', '-', $elem['titre']);
			$paramTitre = rewriteURL($paramTitre);
		?>
			<div class="projetwrap">
					<div class="projetprez">
						<a href="" title="<?php echo $elem['titre']; ?>">
							<div class="imgcontrol">
								<img src="<?php echo 'images/manga/couvertures/'.stripslashes($elem['couverture']); ?>" alt="<?php echo $elem['titre']; ?>">
								
							</div>
							<h3>
								<?php echo $elem['titre']; ?>
							</h3>
						</a>
					</div>
					<div class="projetextend">
						
						<div class="dlink"><a href="ficheprojet.php?idProjet=<?php echo $elem['id']; ?>&amp;titre=<?php echo $paramTitre; ?>" title="Voir le projet" data-link="projet">Voir le projet</a></div>
						<div class="dlink" data-link="extrait"><a href="<?php echo 'images/manga/extraits/'.$elem['extrait']; ?>" title="voir un extrait du volume" >Voir un extrait</a></div>
						<div class="dlink">Fermer</div>
						<div class="genre">Genre : <span><?php echo $elem['genre1']; ?></span></div>
							<p>
					
								<?php echo nl2br($elem['resume']); ?>
							</p>
					</div>
			</div>
		<?php
		}
		echo '</div>
				</section>';
		
		//on récupère le contenu du tampon dans la variable $contents
		$content = ob_get_contents();
		//Fermeture du tampon
		ob_end_clean();
		
		//on écrit le contenu de notre page au format html dans un fichier
		//file_put_contents($cachePf, $content);
		//FIN DE LA MISE EN CACHE
		
		return $content;
	 }
}
?>
