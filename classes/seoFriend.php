<?php 
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
|############################################################|
|###########_____SITE V3 - POLE DEVELOPPEMENT_____###########|

*/
class SeoFriend
{

	private $_db;//Variable contenant la connexion à la bdd
	
	/**
	 * Constructeur de la classe
	* */
	public function SeoFriend()
	{
		$this->setDb();
	}

  public function titreNews($idLire)
  {
	  //On sélectionne la news voulue dans la bdd
	  $lire = $this->_db->prepare('SELECT * FROM news WHERE id = :idRead');
	  $lire->bindParam('idRead', $idLire, PDO::PARAM_INT);
	  $lire->execute();
	  
	  //On affiche la news
	  while( $maNews = $lire->fetch(PDO::FETCH_ASSOC))
	  {
         
        $titreNews = $maNews['titre'];

              
              
	  }
	  $lire->closeCursor();
	  return $titreNews;
  }
  public function setDb()
  {
	  include dirname(__FILE__).'/../include/connexionBdd.php';
    $this->_db = $bdd;

  }

}








?>