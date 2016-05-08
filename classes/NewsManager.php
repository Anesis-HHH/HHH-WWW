<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
setlocale (LC_ALL, 'fr_FR.utf8');
date_default_timezone_set('Europe/Paris');
/**
 * Cette classe gère les news du site web de la HHH.
 * 
 * Elle contient également une fonction permettant de 
 * mettre en cache l'index du site. Cette fonction est placée
 * dans ici par souci de pertinance car l'index du site
 * est surtout une page d'affichage des dernières news.

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
 * @version 1.2
 * 
 * @var	PDO	$db	contient la connexion à la bdd
 * */
class NewsManager
{
	private $_db;//Variable contenant la connexion à la bdd
	
	/**
	 * Constructeur de la classe
	* */
	public function NewsManager()
	{
		$this->setDb();
	}
  /**
   * créer ou met à jour le cache de la page d'index
   * 
   * @param		int		$page		indique le numéro de la page à mettre en cache
   * @return	string	$contents	contenu de l'index au format html 
   * */
  public function cacheIndex($page)
  {
	  //echo '<br/>Passage dans le début de la fonction de mise en cache.<br/>';
	  
	//DEBUT DE LA MISE EN CACHE
    $cache = 'cache/index'.$page.'.html';//On met le chemin d'acces au fichier cache dans une variable
    //echo '<br/>Passage après la déclaration de la variabel cache.<br/>';
    
    //Cette variable va nous servir à sélectionner les bonnes news à afficher sur chaque page
    $nbNewsPage = 5;
    $limit = ($page - 1)*$nbNewsPage;
    //echo '<br/>Passage après le calcul de la limite : '.$limit. '<br/>';
    
    //Ouverture du tampon
    ob_start();
    
    //echo '<br/>Passage après le ob_start() juste avant la requête.<br/>';
    //Récupération des infos dans la bdd
    try
    {
		$news = $this->_db->prepare('SELECT * FROM news WHERE validation=1 ORDER BY id DESC LIMIT :limit, 5');
		$news->bindParam(':limit', $limit, PDO::PARAM_INT);
		$news->execute();
	}
	catch(Exception $e)
	{
		exit('Erreur : ' . $e->getMessage());
	}
    
    //echo '<br/>Passage après la requête sql avant affichage des news.<br/>';
    
     while( $affiche = $news->fetch(PDO::FETCH_ASSOC))
     {
         //echo '<br/>Passage dans le while du refresh.<br/>';
         //On récupère le nombre total de commentaire pour cette news
         try
         {
			 $ask = $this->_db->prepare('SELECT COUNT(*) as nbCom FROM commentaire_news WHERE id_news= :idn');
			 $ask->bindParam(':idn', $affiche['id'], PDO::PARAM_INT);
			 $ask->execute();
         }
		catch(Exception $e)
		{
			exit('Erreur : ' . $e->getMessage());
		}
         $comm = $ask->fetch();
         
         $datelim = strtotime('09-05-2014');
         
         $contenu = $affiche['contenu'];
         $avatar = $affiche['avatar'];
         //On compare la date de la news avec la date limite du 9 mai 2014
         if($affiche['timestamp'] < $datelim)
         {   
            //On remplace les liens images de la V2 par les bons METTRE UNE CONDITION SUR LA DATE ICI APRES LA MISE EN PROD
            $contenu = str_replace('images/news/', 'images/news/V2/', $affiche['contenu']);
            $contenu = str_replace('<p>', '', $contenu);
            $contenu = str_replace('</p>', '', $contenu);
            $contenu = str_replace('<a href="presentation_projet.php?afficher_projet=', '<a id="', $contenu);
            
            //On n'oublie pas de remplacer l'avatar de l'auteur aussi
			$avatar = str_replace('images/design_site/avatar/', 'images/avatars/', $affiche['avatar']);
         }
         else
         {
			 $avatar = '<img src="images/avatars/'. $affiche['avatar'].'" alt="avatar">';
		 }        
			echo '<article class="news" data-newsid="'.$affiche['id'].'">
				<h3>'. $affiche['titre'].'</h3>
					<time datetime="'.strftime('%Y-%m-%d', $affiche['timestamp']).'"> '.strftime('%d %B %Y', $affiche['timestamp']).'</time>
					<div class="newsaside">'.$avatar.'
							<div class="author">Par <a href="les-membres.php?member='.$affiche['pseudo'].'" data-link="seemembre">'. $affiche['pseudo'].'</a></div>
							<div class="commentaires">Commentaires ('.$comm['nbCom'].')</div>
							<div class="thanks">Dire merci (<span>'.$affiche['merci'].'</span>)</div>
					</div>
					<p>'
					.nl2br($contenu).
					'</p>';
					
					//On remplace les espaces du titre par des tirets pour le bot de référencement
					$paramTitre = str_replace(' ', '-', $affiche['titre']);
					//TECHNIQUE DU CASTOR D'ALBIREW POUR ENELVER LES ACCENTS, cherche pas, tu peux pas test. En fait il convertit la string en iso américain...
					$paramTitre = iconv('UTF-8', 'US-ASCII//TRANSLIT', $paramTitre);
					//echo '<div class="newspermalien"><a href="http://hhh-world.com/V3/lireNews.php?idnews='.$affiche['id'].'&amp;titre='.$paramTitre.'" data-link="news">Permalien</a></div>
					//</article>';
					echo '</article><div class="newspermalien"><a href="lireNews.php?idnews='.$affiche['id'].'&amp;titre='.$paramTitre.'" data-link="news" data-newsid="'.$affiche['id'].'">Permalien</a></div><div class="deploynews" data-newsid="'.$affiche['id'].'">Deployer la news  &#8595;</div>
					';
                 $ask->closeCursor();
     }
     
     $news->closeCursor();
     
     //on récupère le contenu du tampon dans la variable $contents
    $contents = ob_get_contents();
    //Fermeture du tampon
    ob_end_clean();
    
    //on écrit le contenu de notre page au format html dans un fichier
    //file_put_contents($cache, $contents);
    //FIN DE LA MISE EN CACHE
    
    return $contents;
  }
  /**
   * Affiche la news demandée.
   * 
   * @param	int	$idLire		identifiant de la news dans la bdd
   * */
  public function lireNews($idLire)
  {
	  //On sélectionne la news voulue dans la bdd
	  $lire = $this->_db->prepare('SELECT * FROM news WHERE id = :idRead');
	  $lire->bindParam('idRead', $idLire, PDO::PARAM_INT);
	  $lire->execute();
	  
	  //On affiche la news
	  while( $maNews = $lire->fetch(PDO::FETCH_ASSOC))
	  {
		  //On récupère le nombre total de commentaire pour cette news
         try
         {
			 $ask = $this->_db->prepare('SELECT COUNT(*) as nbCom FROM commentaire_news WHERE id_news= :idn');
			 $ask->bindParam(':idn', $maNews['id'], PDO::PARAM_INT);
			 $ask->execute();
         }
		catch(Exception $e)
		{
			exit('Erreur : ' . $e->getMessage());
		}
         $comm = $ask->fetch();
         
         //On remplace les liens images de la V2 par les bons METTRE UNE CONDITION SUR LA DATE ICI APRES LA MISE EN PROD
         $datelim = strtotime('09-05-2014');
         
         $contenu = $maNews['contenu'];
         $avatar = $maNews['avatar'];
         //On compare la date de la news avec la date limite du 9 mai 2014
         if($maNews['timestamp'] < $datelim)
         {
			//On ne remplace les balises images qu'à l'intérieur des news antérieures à cette date
			$contenu = str_replace('images/news/', 'images/news/V2/', $maNews['contenu']);
			$contenu = str_replace('<p>', '', $contenu);
            $contenu = str_replace('</p>', '', $contenu);
            $contenu = str_replace('<a href="presentation_projet.php?afficher_projet=', '<a id="', $contenu);
			//On n'oublie pas de remplacer l'avatar de l'auteur aussi
			$avatar = str_replace('images/design_site/avatar/', 'images/avatars/', $maNews['avatar']);
			$avatar = stripslashes($avatar);
		 }
		 else
		 {
			 $avatar = '<img src="images/avatars/'. $maNews['avatar'].'" alt="avatar">';
		 }   
         echo '<section>
					<div id="wrapper">';
         
         echo '<article id="newsunique" class="news" data-newsid="'.$maNews['id'].'">
				<h3>'. $maNews['titre'].'</h3>
					<time datetime="'.strftime('%Y-%m-%d', $maNews['timestamp']).'"> '.strftime('%d %B %Y', $maNews['timestamp']).'</time>
					<div class="newsaside">'.$avatar.'
							<div class="author">Par <a href="les-membres.php?member='.$maNews['pseudo'].'" data-link="seemembre">'. $maNews['pseudo'].'</a></div>
							<div class="commentaires">Commentaires ('.$comm['nbCom'].')</div>
							<div class="thanks">Dire merci (<span>'.$maNews['merci'].'</span>)</div>
					</div>
					
					<p>'
					.nl2br(stripslashes($contenu)).
					'</p>';
					//On vérifie si la news a été modifiée
					/*
                    if($maNews['timestamp_modification'] != 0)
                    {
						echo '<br/><br/><i>News modifée le '. date('d/m/Y à H', $maNews['timestamp_modification']) .'h'.date('i', $maNews['timestamp_modification']).'</i>';
					}
					*/
					echo '</article>';
					
		echo '</div>
		</section>';
              
                 $ask->closeCursor();
	  }
	  $lire->closeCursor();
  }
  /**
   * Enregistre une nouvelle news dans la bdd. Met la validation à 0 de façon à ce que
   * la news ne soit pas visible sur le site public.
   *
   * @param string	$auteur		auteur de la news
   * @param string	$titre		titre de la news
   * @param string	$avatar		chemin vers l'image de l'avatar de l'auteur
   * @param	string	$texte		contenu de la news
   * */ 
  public function createNews($auteur, $titre, $avatar, $texte)
  {
	  $billet = $this->_db->prepare('INSERT INTO news SET pseudo = :pseu, titre = :title, avatar = :ava, contenu = :content, timestamp = :time');
	  
	  $billet->bindValue(':pseu', $auteur);
	  $billet->bindValue(':title', $titre);
	  $billet->bindValue(':ava', $avatar);
	  $billet->bindValue(':content', $texte);
	  $billet->bindValue(':time', time(), PDO::PARAM_INT);
	  
	  $billet->execute();
	  
	  $billet->closeCursor();
	  
	  //echo 'Votre news a bien été ajoutée. Elle ne sera visible sur la partie publique du site qu\'une fois validée.';
  }
  /**
   * Modifie une news existante.
   * 
   * @param	int		$id			id de la news
   * @param	string	$auteur		auteur de la news
   * @param string	$titre		titre de la news
   * @param string	$avatar		chemin vers l'image de l'avatar de l'auteur
   * @param string	$texte		contenu de la news
   * @param	string	$best		indique si la news fait partie du best of
   * */ 
  public function updateNews($id, $auteur, $titre, $avatar, $texte, $best)
  {
	  $modif = $this->_db->prepare('UPDATE news SET pseudo = :pseu, titre = :title, avatar = :ava, contenu = :content, best = :best WHERE id = :idMod');
	  
	  $modif->bindValue(':pseu', $auteur);
	  $modif->bindValue(':title', $titre);
	  $modif->bindValue(':ava', $avatar);
	  $modif->bindValue(':content', $texte);
	  $modif->bindValue(':best', $best);
	  //$modif->bindValue(':timeMod', time(), PDO::PARAM_INT);
	  $modif->bindValue(':idMod', $id, PDO::PARAM_INT);
	  
	  $modif->execute();
	  
	  $modif->closeCursor();
	  
	  echo 'Votre news a bien été modifiée.';
  }
  /**
   * Supprime une news.
   * 
   * @param	int	$idSuppr	id de la news à supprimer
   * */
  public function deleteNews($idSuppr)
  {
	  $del = $this->_db->prepare('DELETE FROM news WHERE id = :idSu');
	  $del->bindValue(':idSu', $idSuppr, PDO::PARAM_INT);
	  $del->execute();
	  $del->closeCursor();
	  
	  //echo 'La news a bien été supprimée.';
  }
  /**
   * Valide une news afin qu'elle soit visible sur le site public.
   * 
   * @param	int	$idVal	id de la news à valider
   * */
  public function validateNews($idVal)
  {
	  $ok = $this->_db->prepare('UPDATE news SET validation = 1 WHERE id = :idOk');
	  
	  $ok->bindValue(':idOk', $idVal, PDO::PARAM_INT);
	  $ok->execute();
	  $ok->closeCursor();
	  
	  //echo 'Votre news a bien été validée. Elle est maintenant visible dans la partie publique du site.';
  }
  /**
   *Liste toutes les News existantes
   * 
   *@return	array	$tablNews	tableau contenant la liste des news 
   **/
  public function listNews()
  {
	  $news = $this->_db->query('SELECT * FROM news ORDER BY id DESC');
	  
	  $tablNews = array();
	  
	  while($liste = $news->fetch(PDO::FETCH_ASSOC))
	  {
		  $tabl['id'] = $liste['id'];
		  $tabl['pseudo'] = $liste['pseudo'];
		  $tabl['titre'] = $liste['titre'];
		  $tabl['contenu'] = $liste['contenu'];
		  $tabl['timestamp'] = $liste['timestamp'];
		  //$tabl['timestamp_modification'] = $liste['timestamp_modification'];
		  $tabl['validation'] = $liste['validation'];
		  $tabl['merci'] = $liste['merci'];
		  
		  array_push($tablNews, $tabl);
	  }
	  $news->closeCursor();
	  
	  return $tablNews;
  }
  /**
   *Liste toutes les News publiées existantes
   * 
   *@return	array	$tablNews	tableau contenant la liste des news 
   **/
  public function listArchive()
  {
	  $news = $this->_db->query('SELECT * FROM news WHERE validation=1 ORDER BY id DESC');
	  
	  $tablNews = array();
	  
	  while($liste = $news->fetch(PDO::FETCH_ASSOC))
	  {
		  $tabl['id'] = $liste['id'];
		  $tabl['pseudo'] = $liste['pseudo'];
		  $tabl['titre'] = $liste['titre'];
		  $tabl['contenu'] = $liste['contenu'];
		  $tabl['timestamp'] = $liste['timestamp'];
		  $tabl['validation'] = $liste['validation'];
		  $tabl['merci'] = $liste['merci'];
		  
		  array_push($tablNews, $tabl);
	  }
	  $news->closeCursor();
	  
	  return $tablNews;
  }
  /**
   *Liste toutes les News bestof pour l'admin
   * 
   *@return	array	$tablNews	tableau contenant la liste des news 
   **/
  public function bestofNews()
  {
	  $news = $this->_db->query("SELECT * FROM news WHERE best='oui' ORDER BY id DESC");
	  
	  $tablNews = array();
	  
	  while($liste = $news->fetch(PDO::FETCH_ASSOC))
	  {
		  $tabl['id'] = $liste['id'];
		  $tabl['pseudo'] = $liste['pseudo'];
		  $tabl['titre'] = $liste['titre'];
		  $tabl['contenu'] = $liste['contenu'];
		  $tabl['timestamp'] = $liste['timestamp'];
		  $tabl['validation'] = $liste['validation'];
		  array_push($tablNews, $tabl);
	  }
	  $news->closeCursor();
	  
	  return $tablNews;
  }
  /**
   *Liste toutes les News bestof pour le site
   * 
   *@return	array	$tablNews	tableau contenant la liste des news 
   **/
  public function bestofNewsOnsite()
  {
	  $news = $this->_db->query("SELECT * FROM news WHERE best='oui' ORDER BY id DESC");
	  
	  $tablNews = array();
	  
	  while($liste = $news->fetch(PDO::FETCH_ASSOC))
	  {
		  $tabl['id'] = $liste['id'];
		  $tabl['pseudo'] = $liste['pseudo'];
		  $tabl['titre'] = $liste['titre'];
		  $tabl['contenu'] = substr($liste['contenu'],0,500);
		  $tabl['contextbest'] = $liste['contextbest'];
		  $tabl['timestamp'] = $liste['timestamp'];
		  $tabl['validation'] = $liste['validation'];
		  array_push($tablNews, $tabl);
	  }
	  $news->closeCursor();
	  
	  return $tablNews;
  }
    /**
    Modifie un best of (ou plutot ajoute le contexte puisque qu'il n'existe pas à la création).
	*/ 
  public function updateBestof($id,$contexte)
  {
	  $modif = $this->_db->prepare('UPDATE news SET contextbest = :contexte WHERE id = :idMod');
	  
	  $modif->bindValue(':contexte', $contexte);
	  $modif->bindValue(':idMod', $id, PDO::PARAM_INT);
	  
	  $modif->execute();
	  
	  $modif->closeCursor();
	  
	  echo 'Votre contexte de best of a bien été modifiée.';
  }
  
  
  public function newsTwitter($idLire)
  {
	  //On sélectionne la news voulue dans la bdd
	  $lire = $this->_db->prepare('SELECT * FROM news WHERE id = :idRead');
	  $lire->bindParam('idRead', $idLire, PDO::PARAM_INT);
	  $lire->execute();
	  
	  //On affiche la news
	  while( $maNews = $lire->fetch(PDO::FETCH_ASSOC))
	  {
     $contenu = $maNews['contenu'];
     $titre = $maNews['titre'];
     $monidbordel = $maNews['id'];

      $imageurl = stristr($contenu,'src=');
      $imageurl = stristr($imageurl, '>', true);
      $imageurl = str_replace('src="','',$imageurl); //double quote
      $imageurl = str_replace("src='","",$imageurl); //single quote
      $imageurl = stristr($imageurl, '"', true); //double quote
      $imageurl = stristr($imageurl, "'", true); //single quote
      if (strpos($imageurl,'://') === FALSE){$imageurl = 'http://hhh-world.com'.$imageurl;}
      $texte = substr($titre,0,85); // limite twitter 140 caractères - 22 pour l'URL - 23 pour l'image -4 pour les espaces et la flèche entre texte et lien -6 pour [news]
      $url = 'http://hhh-world.com/lireNews.php?idnews='.$monidbordel;
      // require codebird
      require_once(dirname(__FILE__).'/../twitter-api/codebird.php');
      include dirname(__FILE__).'/../include/connexionTwitter.php';

/*      $reply = $cb->statuses_updateWithMedia(array(
        'status' => $texte.'... '.$url,
        'media[]' => $imageurl
      ));
https://github.com/jublonet/codebird-php/issues/76
*/
//        'status' => $texte.'... '.$url,
      $reply = $cb->statuses_update(array(
        'status' => '[news]'.$texte.' -> '.$url,
      ));
//      print_r($reply); // pour debug seulement
    }
    $lire->closeCursor();	
  }
  
  
  
  /**
   * Initialise la connexion à la bdd
   * */
  public function setDb()
  {
	  include dirname(__FILE__).'/../include/connexionBdd.php';
    $this->_db = $bdd;
    
    //echo '<br/>Passage dans la fonction de connexion à la bdd.<br/>';
  }
}
?>
