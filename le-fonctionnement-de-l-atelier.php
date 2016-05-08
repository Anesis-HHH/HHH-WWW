<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Le fonctionnement de l'atelier";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
						
						 <a class="abloc" href="#envers_du_decor">L'envers du décor</a>
							<a class="abloc indent" href="#equipe">l'équipe</a>
							<a class="abloc indent" href="#le_serveur">le serveur</a>
							<a class="abloc indent" href="#irc">IRC</a>
						 <a class="abloc" href="#les_releases">Les releases</a>
							<a class="abloc indent" href="#le_choix_des_releases">Le choix des releases</a>
						    <a class="abloc indent" href="#edition">L'édition</a>
						 <a class="abloc" href="#les_news_et_les_sorties">Les news et les sorties</a>
						 <a class="abloc" href="#le_recrutement">Le recrutement</a>
						
						<h3 class="titre gras center" id="envers_du_decor">L'envers du décor</h3>
							
						<p>La plupart d'entre vous se demande peut être comment fonctionne HHH. Comment sont faites les releases ? Quelles sont les rythmes des news ? Comment se passe le recrutement ?<br />
						Une seule chose : <span class="gras">HHH c'est une usine à gaz</span>.</p>

						<h3 class="titre gras center" id="equipe">L'équipe</h3>

						<p>HHH est composé d'une <span class="gras">vingtaine</span> (non exhaustif) de <span class="gras">membres actifs</span> s'impliquant à des degrés divers dans les productions de la team. La <span class="gras">motivation</span> et l'<span class="gras">envie</span> de proposer quelque chose de bonne <span class="gras">qualité</span> est le moteur du site et de ses contenus.</p>
						
						<p>Sous l'égide d'un boss qui a de l'expérience dans le scantrad, chacun peut venir proposer un projet, que ce soit une release, un artwork, un support de communication... Toutes  notions de créativité est fortement mis en avant dans notre manière de travailler.</p>
						
						<p>
							Depuis 2010, l'équipe organise une grande réunion IRL avec tous les membres ayant la possibilité de venir. C'est pour tout le monde l'occasion de se voir en vrai, et notamment pour les nouveaux membres d'intégrer encore plus l'équipe. Ce week-end, le premier du mois de septembre, est toujours l'occasion de passer un grand moment, de travailler directement ensemble et aussi de monter des projets divers. 
						</p>

						<h3 class="titre gras center" id="le_serveur">Le serveur</h3>

						<p>Nous louons un serveur privé qui nous permet d'être totalement indépendant de qui que ce soit. Ce n'est pas un serveur énorme, mais qui suffit pour vous proposer tout le contenu du site. Ce serveur est à la charge financière directe du boss de l'équipe, ceci dit il n'y a aucune publicité sur le site et le téléchargement est toujours gratuit. C'est pourquoi nous avons mis en place un <a href="faire-un-don.php" data-link="internal">système de don</a> pour vous permettre d'aider la HHH dans sa démarche.</p>

						<h3 class="titre gras center" id="irc">IRC</h3>

						<p>Aaaah IRC, quelque chose qui fait peur à beaucoup d'entre vous alors que c'est aussi simple que MSN (qui est un petit petit fils de l'irc au niveau du protocole). IRC ou Internet Relay Chat, est un protocole à part entière au même titre que le http (oui celui avant le www.).</p>

						<p>Chez HHH, le chan existe depuis la fondation de la team, c'est un endroit où vous pourrez venir télécharger les sorties en avance d'une part, mais aussi pouvoir discuter avec nous en live d'autre part. Beaucoup de gens qui viennent sont étonnés que nous leur répondions et que l'on soit même sympa (!sic).</p>

						<p>On ne mord pas et nous adorons discuter avec nos lecteurs de tout et de rien pas forcément de Hentai, mais aussi de "comment je rempli ma déclaration d'impôts ?".</p>

						<p>Pour <span class="gras">venir c'est facile</span> : Vous pouvez soit télécharger le client spécialement développé par la team : <a href="client-irc-kvirc-luxuria.php " data-link="internal">Luxuria</a> , préconfiguré pour que vous puissiez venir directement télécharger et discuter avec nous; soit utiliser le client sans installation <a href="client-irc-mibbit.php" data-link="internal">Mibbit</a> (téléchargement impossible depuis Mibbit).
						Pour ceux qui voudraient utiliser d'autres clients nous avons créé des <a href="tutoriels-irc.php" data-link="internal">tutoriels</a> spécialement pour HHH. Vous pourrez y trouver aussi un petit historique de l'IRC ainsi qu'un nombre de commandes utiles.</p>


						<h3 id="les_releases" class="titre gras center">Les releases</h3>

						<h3 class="titre gras center" id="le_choix_des_releases">Le choix des releases</h3>

						<p>Les releases que nous éditons sont choisies en interne par l'équipe selon des critères artistiques et technique. Tout d'abord l'histoire et le dessin et ensuite l'existence ou non de Raws (scan brut) japonaises ainsi que leur qualité.</p>

						<p>En effet, on constate généralement que les productions US sont de piètre qualité et que l'édition même a été plus que moyenne. C'est pour cela que nous préférons reprendre de zéro.</p>
						
						<p>Premièrement, pour pouvoir cleaner correctement (c'est à dire refaire les contrastes, la décensure ou encore le recollage de double page) et deuxièmement pour pouvoir éditer (remplir les bulles et refaire les onomatopées) proprement sans repasser par dessus la traduction US.</p>

						<h3 class="titre gras center" id="edition">L'édition</h3>

						<p>Grosso modo il existe <span class="gras">trois étapes principales</span> dans l'édition d'une release :
						</p>
						<p>
							<span class="abloc indent"><span class="gras">La traduction</span> : adaptation de l'oeuvre en français.</span>
							<span class="abloc indent"><span class="gras">Le check</span> : correction de la traduction et vérification de l'édition.</span>
							<span class="abloc indent"><span class="gras">L'édition</span> : correction graphique du scan, contraste et censure, vidanges des bulles et lettrage avec la traduction.</span>
						</p>

						<p>La qualité HHH ne tombe pas de nulle part, elle est dépendante d'un processus visant une qualité maximale. Nous procédons comme suit : 

						</p>
						<p>
							<span class="abloc indent"><span class="gras">Traduction</span> : l'adaptation du chapitre en français.</span>
							<span class="abloc indent"><span class="gras">Check</span> : une première correction après traduction.</span>
							<span class="abloc indent"><span class="gras">Edition</span> : la mise en texte du chapitre d'après la traduction.</span>
							<span class="abloc indent"><span class="gras">Quality check (ou Qcheck ou QC)</span> : la deuxième correction après édition.</span>
							<span class="abloc indent"><span class="gras">Sortie</span></span>
						
						</p>

						<p>Ce processus nous permet de vous <span class="gras">offrir un travail de qualité</span>. Ceci explique pourquoi certaines releases sortent avec du retard : il suffit qu'on soit en manque d'un des pôles de création pour bousculer le rythme des sorties.</p>

						<h3 id="les_news_et_les_sorties" class="titre gras center">Les news et les sorties</h3>
						
						<p>
							Une sortie, une news, deux sorties, deux news. La HHH met un point d'orgue à vous présentez son travail dans une news constructive et pointue. Ceci dit, nous adorons déconner et nous amuser dans nos news, c'est pourquoi vous pourrez trouver la plupart des jeudis, une autre news, sans forcément de rapport avec la production de l'équipe, mais qui a pour but de vous divertir, de vous interpeller et de donner de l'information, un point de vue, un délire.
						</p>

						<p>Alors pourquoi deux sorties ? Deux raisons à cela, l'une historique et l'autre pratique. Tout d'abord parce que la <span class="gras">sortie du premier samedi du mois</span> à été établit par le second boss de la team, <span class="gras">Battosai</span>, en honneur à la sortie du film X sur Canal (ce que les plus jeunes d'entre vous n'ont pas connu depuis l'avènement du porno sur Internet). Ensuite parce que cela nous laisse une semaine de battement pour des corrections éventuelles ou pour avoir les retards dans les temps . Ceci tout en donnant quand même quelque chose aux plus motivés d'entre vous qui s'y prennent encore à l'ancienne (oui IRC est LE support des teams de fansub et scantrad depuis toujours).</p>
				

						<h3 id="le_recrutement" class="titre gras center">Le recrutement</h3>

						<p>Chez HHH on a pour habitude de se parler directement entre nous "face à face", nous préférons un dialogue live plutôt qu'une candidature uniquement par email. C'est pour cela que même après avoir proposé votre candidature par mail, on vous demande de venir sur l'IRC.</p>

						<p>Le processus personnel de création est très libre chez nous, hormis quelques fondamentaux inébranlables, il est laissé une <span class="gras">grande liberté d'adaptation et d'édition</span>. (pour le Check pas de liberté sinon celle du dico ^^)</p>

						<p><a class="gras" href="recrutement.php" data-link="internal">En savoir plus sur le recrutement</a></p>
						
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 