<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Client KVirc Luxuria";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
							<p>
							<img src="design/img/irc/luxuria.jpg" alt="KVirc Luxuria">
							<span class="titlebox abloc">
							<a href="#luxuriainstall" class="abloc">Installation</a>
							<a href="#luxuriaconfig" class="abloc">Première connexion - Étape 1 : Configurer Luxuria</a>
							<a href="#luxuriaconnec" class="abloc">Première connexion - Étape 2 : Connexion au salon #hhh</a>
							<a href="#luxuriadl" class="abloc">Première connexion - Étape 3 : Le téléchargement des releases de la team.</a>
							<a href="#luxuriacredit" class="abloc">Crédits.</a>
							</span>
								<span class="big gras center titre">Qu'est-ce qu'un client IRC ?</span>
								Un client IRC c'est un programme permettant de vous connecter au protocole IRC. 
								<span class="big gras center titre">Et donc Luxuria dans tout ça ?</span>
								Afin de faciliter l'accès au salon de l'équipe sur IRC pour les personnes n'ayant jamais utiliser un client IRC, la	HHH a mis au point un dérivé de KVirc que nous avons baptisé "Luxuria".
							</p>
							<p>
								Le client Luxuria est préconfiguré pour que vous n'ayez quasi rien à faire pour venir discuter ou télécharger nos chapitres.
								<img src="design/img/irc/kvirc_luxuria.jpg" alt="client IRC KVirc Luxuria">
								<a href="freedownload/kvric/KVIrc_Luxuria_Setup v0.0.4.2.exe" title="télécharger luxuria" class="titre big center">Télécharger Luxuria pour Windows</a>
							</p>
							<p>
								<span id="luxuriainstall" class="big gras center titre">Installation</span>
								<span class="center abloc titlebox">Le logiciel étant portable, l'installation se résume plus à une décompression, aucune greffe ne sera faite sur votre système, vous pouvez choisir de l'installer où bon vous semble : un dossier spécifique ou une clé USB :)</span>
								<img src="design/img/irc/001.png" alt="La page de bienvenue">
								<span class="center abloc">La page de bienvenue. Pour faire poli, avec une jolie fille à gauche.</span>

								<img src="design/img/irc/002.png" alt="La page de licence">
								<span class="center abloc">La page de licence. Et oui ! Nous en avons mis une, mais c'est une licence GPL, alors pourquoi ne pas la lire pour une fois ?</span>

								<img src="design/img/irc/003.png" alt="La page de sélection du répertoire d'installation">
								<span class="center abloc">La page de sélection du répertoire d'installation. C'est ici que certains d'entre vous installeront le logiciel sur une clé USB.
								L'emplacement par défaut est celui affiché sur le screen.</span>
								
								<img src="design/img/irc/004a.png" alt="La page des composants - Luxuria Normal">
								<span class="center abloc">La page des composants. L' "Édition Luxuria normale" pour la majorité des personnes.
								</span>
								<img src="design/img/irc/004b.png" alt="La page des composants - Luxuria Discret">
								<span class="center abloc">L' "Édition Luxuria discrète" est conseillée pour ceux qui préfèrent avoir un logiciel en toute discrétion.
								/!\ Attention, avant de cliquer sur "Installer", il faut qu'un des thèmes soit sélectionné mais JAMAIS les deux ensemble.</span>

								<img src="design/img/irc/005.png" alt="La page d'installation">
								<span class="center abloc">Pas besoin d'en faire un florilège.</span>

								<img src="design/img/irc/006.png" alt="La page de finalisation">
								<span class="center abloc">À la fin de l'installation, vous pouvez lancer le logiciel.
								Pour ceux qui découvrent le monde l'IRC, lancez aussi le fichier d'aide qui contient le tutoriel (le même que celui qui est ci-dessous).</span>

								<img src="design/img/irc/007.png" alt="La popup de pseudo">
								<span class="center abloc">Une popup se lance à la fin de l'installation. Nous vous demandons vraiment de ne pas sauter cette étape, on aimerait éviter d'avoir 36 pseudos commençant par "HHHUser". Merci d'avance.</span>
								
							</p>
							<p>
								<span class="big gras center titre">Première connexion</span>
								<span id="luxuriaconfig" class="titlebox center abloc">ETAPE 1 : Configurer Luxuria.</span>
								Après avoir installé et lancé le logiciel, vous vous trouvez alors nez à nez à cet écran :
								<img src="design/img/irc/luxuria_demarrage.jpg" alt="client KVIRC luxuria">
								Comme vous le remarquerez, un seul serveur est disponible : celui qui héberge la team.<br/>
								[1] : Propriétés avancées du serveur sélectionné.<br/>
								[2] : Ajouter un regroupement de serveurs (qui peuvent avoir une même configuration d'identité et de charset).<br/>
								[3] : Ajouter un serveur (avec une configuration d'identité et de charset spécifique).<br/>
								[4] : Modifier l'adresse du serveur.<br/>
								[5] : Se connecter au serveur sélectionné.<br/>
							</p>
							<p>
								Il faut maintenant configurer son identité sur le chan. Pour cela, il suffit de cliquer sur "Avancée ..." [1].<br/>
								Il s'affiche alors ceci :<br/>
								<img src="design/img/irc/luxuria_config.jpg" alt="client KVIRC luxuria">
							
								Il ne vous reste plus qu'à modifier les champs "Nom d'utilisateur" et "Pseudo" selon votre envie.<br/> Évitez de mettre votre VRAI NOM, car cela pourra être vu par les autres utilisateurs.<br/>
								
								La configuration de votre connexion est terminée, cliquez sur "Valider".<br/>

								Vous êtes de nouveau face au premier écran. Pour vous connecter, il suffit de cliquer sur "Se Connecter Maintenant" [5].
							</p>
							<p>
								<span id="luxuriaconnec" class="titlebox center abloc">ETAPE 2 : La connexion au salon #HHH.</span>
								1- Après un petit temps de connexion et d'enregistrement au serveur qui peut être long, vous obtenez une page similaire à celle-ci :
								<img src="design/img/irc/luxuria_salon.jpg" alt="client KVIRC luxuria">
								[1] : Fenêtre du serveur (contient des informations de connexion et d'utilisation). NE SURTOUT PAS LA FERMER (ça vous déconnecterait du serveur).<br/>
								[2] : Fenêtre du salon #HHH.<br/>
								[3] : Barre de sujet (affiche le topic du salon, en particulier les dernières releases).<br/>
								[4] : Zone d'affichage.<br/>
								[5] : Barre de pseudos (cette zone contient tous les pseudos des utilisateurs connectés au le salon).<br/>
								[6] : Zone de saisie de texte.
								<span class="center titre"> Voilà ! Vous êtes connecté à IRC, dites bonjour et commencez à télécharger et/ou à discuter avec les personnes présentes.</span>
							</p>
							<p>
								<span id="luxuriadl" class="titlebox center abloc">ÉTAPE 3 : Télécharger les releases de la team.</span>
								La liste des releases de HHH est disponible sur le lien suivant : <a href="http://xdcclist.hhh-world.com/" target="_blank" title="liste xdcc">http://xdcclist.hhh-world.com/</a>.

								Vous avez alors accès à la liste des téléchargements disponibles sur le chan.
								<img src="design/img/irc/listexdcc.jpg" alt="client KVIRC luxuria">
								[1] : le numéro de la release.<br/>
								[2] : le nom de la release.<br/>
								[3] : taille du fichier.<br/>
							</p>
							<p>	
								Vous cherchez donc la release que vous souhaitez télécharger. Dans ce cas, on va télécharger le 1er chapitre de The Spirit of Capitalism.<br/><br/>

								Vous repérez le chapitre en question, il porte le numéro : 496 (au moment où ce tutoriel a été écrit). Retournez alors sur KVIrc.<br/><br/>

								Pour télécharger une release, il faut taper sur le salon #HHH :
								<span class="titre center gras">/msg [Kepler] xdcc send #lenumérodelarelease</span>
								puis valider avec Entrée.<br/>
								Dans notre exemple vous taperiez la commande ci-dessous pour télécharger le chapitre 1 de The Spirit of Capitalism :
								<span class="titre center gras">/msg [Kepler] xdcc send #496</span>
							</p>
							<p>
								Un pop-up apparait alors au centre de votre écran :
								<img src="design/img/irc/luxuria_valid.jpg" alt="client KVIRC luxuria">
								Là, c'est simple, il suffit de cliquer sur "Accepter".
							</p>
							<p>
								Immédiatement après, vous tombez sur une fenêtre où avez juste à choisir le dossier de téléchargement. Remarquez que le dossier par défaut se trouve dans le répertoire de dépôt du logiciel. Valider après avoir fait votre choix.<br/><br/>

								Une nouvelle fenêtre s'ouvre dans KVIrc avec comme informations principales :
								<img src="design/img/irc/luxuria_transfert.jpg" alt="client KVIRC luxuria">
								Il y a là :<br/>
								- L'état de votre téléchargement.<br/>
								- La vitesse du transfert.<br/>
								- La destination du téléchargement.
							</p>
							<p>
								Voilà ^^ vous venez de télécharger votre première release. Vous pouvez maintenant télécharger la totalité des releases de HHH.<br/>
								Lors des sorties, elles sont disponibles sur le chan IRC une semaine avant de l'être sur le site.<br/><br/>

								Néanmoins quelques problèmes peuvent survenir et le fichier sera impossible à télécharger. Pour pallier au problème :<br/>
								- Vérifiez que votre pare-feu ne bloque pas les flux entrants de KVIrc.<br/>
								- Si ce n'est pas le cas, tapez la commande : 
								<span class="center abloc gras titre">/dccallow +[Kepler]</span> pour débloquer les autorisations au niveau du client.
							</p>
							<p>
								<span id="luxuriacredit" class="center abloc titre">Crédits</span>
								Ce programme respecte les conditions de la licence émises par le code source de KVIrc.
								<span class="abloc titre">Code source : <a href="http://www.kvirc.net/" target="_blank">KVIRC team</a></span>
								<span class="abloc titre">Code de portabilité : <a href="http://portableapps.com/" target="_blank">PortableApps.com</a></span>
								<span class="abloc titre">Réalisation du paquet Luxuria 0.0.4.2 : <span class="gras">Jack3113</span></span>
								<span class="abloc titre">Design Luxuria 0.0.4.2 : <span class="gras">Lukia</span></span>
							</p>
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 