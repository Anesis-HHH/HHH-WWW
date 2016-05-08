<?php  
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
/*
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

*/
class MembreManager
{

protected $connect;
	
	/**
	 * Constructeur de la classe
	* */
	public function MembreManager()
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
	
	// fonction de création d'un nouveau membre
	public function newMembre($pseudo,$email,$ddn,$avatar,$pole1,$pole2,$pole3,$pole4,$description,$loisirs,$statut)
	{
		$newMember = $this->connect->prepare('INSERT INTO membre SET
		pseudo = :pseudo,
		email = :mail,
		birthday = :datenaissance,
		avatar = :avatar,
		pole1 = :poletrad,
		pole2 = :polecorrec,
		pole3 = :poleedit,
		pole4 = :poledev,
		description = :desc,
		loisirs = :loisirs,
		statut = :statut');
		
		$newMember->bindValue(':pseudo', $pseudo);
		$newMember->bindValue(':mail', $email);
		$newMember->bindValue(':datenaissance', $ddn);
		$newMember->bindValue(':avatar', $avatar);
		$newMember->bindValue(':poletrad', $pole1);
		$newMember->bindValue(':polecorrec', $pole2);
		$newMember->bindValue(':poleedit', $pole3);
		$newMember->bindValue(':poledev', $pole4);
		$newMember->bindValue(':desc', $description);
		$newMember->bindValue(':loisirs', $loisirs);
		$newMember->bindValue(':statut', $statut);
	
		
		$newMember->execute();
		
		$newMember->closeCursor();
	}

	
	 //Supprime un membre.
	
	public function delProjet($idSuppr)
	{
		$del = $this->_db->connect('DELETE FROM projets WHERE id = '. $idSuppr);
	  
		$del->closeCursor();
	}
	
	// modifie un membre
	public function modMembre($pseudo,$email,$ddn,$avatar,$pole1,$pole2,$pole3,$pole4,$description,$loisirs,$contribution,$statut,$idmembre)
	{
		// $idmembre = intval($idmembre);
		
		$modMember = $this->connect->prepare('UPDATE membre SET
		pseudo = :pseudo,
		email = :mail,
		birthday = :datenaissance,
		avatar = :avatar,
		pole1 = :poletrad,
		pole2 = :polecorrec,
		pole3 = :poleedit,
		pole4 = :poledev,
		description = :desc,
		loisirs = :loisirs,
		contribution = :contribution,
		statut = :statut 
		WHERE id = :idmembre');
		
		$modMember->bindValue(':pseudo', $pseudo);
		$modMember->bindValue(':mail', $email);
		$modMember->bindValue(':datenaissance', $ddn);
		$modMember->bindValue(':avatar', $avatar);
		$modMember->bindValue(':poletrad', $pole1);
		$modMember->bindValue(':polecorrec', $pole2);
		$modMember->bindValue(':poleedit', $pole3);
		$modMember->bindValue(':poledev', $pole4);
		$modMember->bindValue(':desc', $description);
		$modMember->bindValue(':loisirs', $loisirs);
		$modMember->bindValue(':contribution', $contribution);
		$modMember->bindValue(':statut', $statut);
		$modMember->bindValue(':idmembre', $idmembre);
	
		
		$modMember->execute();
		
		$modMember->closeCursor();
	}	
	

	
	
} // end class MembreManager







?>
		