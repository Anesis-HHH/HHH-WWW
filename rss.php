<?php
header("Pragma: no-cache");
header("Content-type: application/rss+xml");
require 'classes/NewsManager.php';
// on va se baser sur le systeme d'archive pour faire le RSS
$archives = new NewsManager();
$tabArc = $archives->listArchive();

// la ptite fonction qui nous réécrit les URLS pour le rewrite du serveur
function GenerateUrl ($s) {
  //Convert accented characters, and remove parentheses and apostrophes
  $from = explode (',', "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,(,),[,],'");
  $to = explode (',', 'c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,,,,,,');
  //Do the replacements, and convert all other non-alphanumeric characters to spaces
  $s = preg_replace ('~[^\w\d]+~', '-', str_replace ($from, $to, trim ($s)));
  //Remove a - at the beginning or end and make lowercase
  return strtolower (preg_replace ('/^-/', '', preg_replace ('/-$/', '', $s)));
}
		echo '<?xml version="1.0" encoding="UTF-8" ?><rss version="2.0"><channel><description>Flux RSS des news de la Hardcore Hentai Headquarter</description><link>http://hhh-world.com</link><title>Hardcore Hentai Headquarter, Hentai français depuis 2004</title>';
		
		// on va se limiter au 10 premiere news 
		for($i=0;$i<10;$i++){
			
			
			// echo print_r($tabArc[$i]['titre']); --> tableau associatif DANS un tableau indexé.
			$idnews=$tabArc[$i]['id'];
			$titrenews=$tabArc[$i]['titre'];
			// on applique le meme systeme de réécriture d'url que dans les archives des news
			$paramTitre=GenerateUrl($tabArc[$i]['titre']);
			$datenews=date('D, d M Y H:i:s +0200', $tabArc[$i]['timestamp']);
			// pour respecter la syntaxe XML, on passe les caractère HTML à la moulinette, et pour un meilleur rendu, on prend en compte les sauts de lignes.
			$resume =  htmlspecialchars(nl2br($tabArc[$i]['contenu']));
			$auteur=$tabArc[$i]['pseudo'];
			echo'
			<item>
				<title>'.$titrenews.'</title>
				<link>http://hhh-world.com/lireNews.php?idnews='.$idnews.'&amp;titre='.$paramTitre.'</link>
				<description>'.$resume.'</description>
				<comments>http://hhh-world.com/lireNews.php?idnews='.$idnews.'&amp;titre='.$paramTitre.'</comments>
				<author>'.$auteur.'</author>
				<pubDate>'.$datenews.'</pubDate>
				<guid>'.$titrenews.'</guid>
				<source>http://hhh-world.com</source>
			</item>
			';
	
		}
		
	echo '</channel></rss>';


?>



