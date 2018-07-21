<?php
$urisite = 'https://anesis.tk';
$urilel = 'https://lel.anesis.tk';
?>
<!DOCTYPE html> 
<html lang="fr">
<!--
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
-->
  <head>
    
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $titredelapage;?> - Hardcore Hentai Heaquarter V3</title>
    <meta name="description" content="Hardcore Hentai Headquarter - La plus vieille team de scantrad hentai de France, fournisseur de plaisir depuis 2004"/>
    <meta name="keywords" content="hentai,manga,scantrad,français,team,hhh,scan,oasis,doujinshi,headquarter,french"/>
    <meta name="author" content="Lukia, Yumemi, Albirew" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="Hardcore Hentai Heaquarter" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $urisite;?>/" />
    <meta property="og:image:secure_url" content="<?php echo $urisite;?>/hhh.png" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon-precomposed.png">
    <link rel="stylesheet" href="design/css.css?=20161116">
    <link rel="stylesheet" href="design/gfonts.css?=20161116">
<?php /* dépendre de google, caymal
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <script src="design/js/jquery-1.11.0.js"></script>
*/ ?>
    <script src="design/js/jquery-1.11.0.min.js"></script>
    <script src="design/js/jquery.mousewheel.js"></script>
    <script src="design/js/perfect-scrollbar.js"></script>
    <script src="design/js/jquery.transit.min.js"></script>
    <script src="design/js/interface.js?=20180506"></script>
    <script src="design/js/paper-full.min.js"></script>
    <noscript>Bienvenue en 2014, veuillez activer JavaScript pour naviguer sur notre site ;)</noscript>
    <!-- Load external PaperScript and associate it with myCanvas -->
    <script type="text/paperscript" src="design/js/paperbullehhh.js" canvas="myCanvas"></script>
    <!--[if lte IE 8]>
    <script src="design/js/html5.js" type="text/javascript"></script>
    <![endif]-->
  </head>  
  <body>  
    <div id="disclaimer">
      <div id="logoaccueil"></div>
      <p>
      <noscript>Bienvenue en 2014, veuillez activer JavaScript pour naviguer sur notre site ;)<br><br></noscript>
      Ce site Internet contient des textes, images et vidéos à caractère pornographique qui peuvent choquer certaines sensibilités, par conséquent :<br/><br/>
      - L'accès à ce site est strictement interdit aux mineurs.<br/>
      - Le contenu de ce site ne doit pas être diffusé à des mineurs.<br/>
      - En entrant sur ce site je certifie être majeur selon les lois du pays depuis lequel j'y accède.
      
      </p>
      <div id="entree">Entrer</div>
      <div id="sortie"><a href="http://www.pokemon.com/fr/">Sortir</a></div>
    
    </div>
    
<?php
// on va aller se chercher le nombre de projet en fonction de sa catégorie dans le site :)
include 'countprojet.php';
?>
    <header data-deploy="false">
      <div id="closemenu">&times;</div>
      <div id="logo"><img src="design/img/logoblancpetit.png" alt="logo HHH"></div>
      
      <nav>
        <ul>
          <li>
            <a href="news.php" title="Lire les news">News</a>
            <ul>
              <li><a href="index.php" title="les dernière news">Les dernières news</a></li>
              <li><a href="archives-des-news.php" title="les archives des news">Les archives des news</a></li>
              <li><a href="best-of-des-news.php" title="le best-of des news">Le best-of des news</a></li>
              
            </ul>
          </li>
          <li>
            <a href="projets.php" title="Les projets de la team">Projets</a>
            <ul>
              <li><a href="<?php echo $urilel;?>" title="Tous les projets à lire en ligne !" target="_blank">Lecture en Ligne</a></li>
              <li><a href="projets-en-cours.php" title="Tous les mangas actuellement en cours de traduction">Projets en cours (<?php echo $catencours ?>)</a></li>
              <li><a href="projets-termines.php" title="Tous les mangas terminés">Projets terminés (<?php echo $catfini ?>)</a></li>
              <li><a href="liste-complete-des-releases.php" title="La liste complète de nos projets">Liste complète des releases</a></li>
            </ul>
          </li>
          <li>
            <a href="atelier.php" title="Tout sur l'atelier de la HHH">Atelier</a>
            <ul>
              <li><a href="boite-a-erreur.php" title="La correction c'est par ici">Boite à erreur</a></li>
              <li><a href="le-fonctionnement-de-l-atelier.php" title="Comment fonctionne la HHH">Le fonctionnement de l'atelier</a></li>
              <li><a href="recrutement.php" title="Travailler avec la HHH">Recrutement</a></li>
            </ul>
          </li>
          <li>
            <a href="team.php" title="Tout savoir sur l'équipe">Team</a>
            <ul>
              <li><a href="faire-un-don.php" title="Aidez à faire vivre la HHH">Faire un don</a></li>
              <li><a href="qui-est-la-HHH.php" title="Qu'est-ce que la HHH ?">Qu'est la HHH ?</a></li>
              <li><a href="les-membres.php" title="Une belle équipe !">Les membres</a></li>
              <li><a href="contact.php" title="Contactez-nous">Nous contacter</a></li>
            </ul>
          </li>
          <li>
            <a href="irc.php" title="Le protocole de communication par excellence">IRC</a>
            <ul>
              <li><a href="client-irc-mibbit.php" title="Chattez avec nous sans installation">Client IRC Mibbit</a></li>
              <li><a href="client-irc-kvirc-luxuria.php" title="Le client IRC de la HHH">Client KVirc Luxuria</a></li>
              <li><a href="liste-xdcc.php" title="La liste des projets téléchargeable sur IRC">Liste XDCC</a></li>
              <li><a href="tutoriels-irc.php" title="Des tutoriels pour IRC">Tutoriels IRC</a></li>
            </ul>
          </li>
          <li>
            <a href="bonus.php" title="La HHH dépasse les limites">Bonus</a>
            <ul>
              <li><a href="hors-serie.php" title="Les chapitres exceptionnels">Hors série (<?php echo $cathorsserie ?>)</a></li>
              <li><a href="animes.php" title="Parce qu'on sait AUSSI faire du fansub">Animes (<?php echo $catanime ?>)</a></li>
              <li><a href="artworks.php" title="Photoshop ne sert pas qu'à faire du scantrad.">Artworks</a></li>
              <li><a href="jeux.php" title="Des jeux que l'équipe a développé aux jeux auxquels nous adorons jouer.">Jeux (<?php echo $catjeux ?>)</a></li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <div id="animationcontrol">Arrêter l'animation du fond</div>
    
    </header>
    <canvas id="myCanvas" resize></canvas>
    <div id="main">
      <div id="entete">
        <div id="deploynav"></div>
        <h1><a href="index.php">Hardcore Hentai Headquarter <span>Hentai français depuis 2004</span></a></h1>
        <div id="gadget">
          <a href="rss.php" title="RSS"><div></div></a>
          <a href="https://www.facebook.com/hardcorehentaiheadquarter" title="Facebook" target="_blank"><div></div></a>
          <a href="https://twitter.com/HHH_World" title="Twitter" target="_blank"><div></div></a>
          <div id="triggercontact"></div>
        </div>
      </div>
      <h2><?php echo $titredelapage;?></h2>
      <div id="content">
        <div id="dynabox">