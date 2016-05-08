<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Tutoriels IRC";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
							<p>
								<span class="titre center">Parce qu'IRC est un protocole méconnu de beaucoup de gens, la HHH vous propose des outils et des conseils utiles pour bien commencer dans cet univers aussi vaste qu'Internet</span>
								<span class="titlebox titre">
									<a href="#irctuto" class="titre">Tutoriels PDF</a>
									<a href="#ircnotion" class="titre">Notions de l'IRC</a>
									<a href="#ircnotionhistoire" class="titre indent">Histoire de l'IRC</a>
									<a href="#ircnotionserver" class="titre indent">Les notions de serveur et de salon</a>
									<a href="#ircnotionlevel" class="titre indent">Les levels d'utilisateurs</a>
									<a href="#irccommandes" class="titre">Commandes IRC</a>
									<a href="#irccommandessimple" class="titre indent">Les commandes simples et directes</a>
									<a href="#irccommandesnickserv" class="titre indent">Les commandes du service de pseudo (nickserv)</a>
									<a href="#irccommandeschanserv" class="titre indent">Les commandes du service de salon (chanserv)</a>
									<a href="#irccommandesbotserv" class="titre indent">Les commandes du service de bot (botserv)</a>
									<a href="#irccommandestrigger" class="titre indent">Les remotes</a>
								</span>
							</p>
							
							<h3><span id="irctuto" class="titre gras center">Tutoriels PDF</span></h3>
							<p>
								<span class="center abloc">Chacun ses goûts en matière de client IRC,<br/> nous vous proposons donc des tutoriels en PDF pour trois grands clients : </span>
								<a href="freedownload/tuto_irc/Tuto_KVIrc.pdf" class="titre center">Tutoriel KVirc</a>
								<a href="freedownload/tuto_irc/Tuto_X-Chat.pdf" class="titre center">Tutoriel Xchat</a>
								<a href="freedownload/tuto_irc/Tuto_mIRC.pdf" class="titre center">Tutoriel mIRC</a>
							</p>
							
							<h3><span id="ircnotion" class="titre gras center">Notions de l'IRC</span></h3>
							<p>
								
								<span id="ircnotionhistoire" class="titre center">Histoire de l'IRC</span>
								IRC (Internet Relay Chat) fut conçu fin août 1988, il a été décrit initialement par Jarkko Oikarinen et Darren Reed.<br/>
								Depuis, de nombreuses versions du système ont été développées par les gros serveurs.<br/><br/>
								En été 1996, on assista au "grand split" entre les serveurs américain et européen/asiatique. Deux gros réseaux se sont donc dégagés : IRCnet et EFnet, chacun développant maintenant sa propre version du protocole. (<a href="http://www.irc.org/history_docs/TheGreatSplit.html" target="_blank">source</a>)<br/><br/>
								Beaucoup d'entre-vous connaissent sans le savoir IRC sous la forme de MSN (mort maintenant) qui était une adaptation du protocole IRC sous forme individuelle mais gardant le même principe : relayer l'information depuis le point d'accès le plus proche.<br/><br/>
								Aujourd'hui on en est à la version 6 d'IRC, permettant la compatibilité avec l'IPV6.<br/>
								Pour plus d'information et de liens utiles, nous vous recommandons le site officiel du protocole : <a href="http://www.irc.org" target="_blank">http://www.irc.org</a> (en anglais), ainsi qu'une  <a href="http://www.dmoz.org/Computers/Internet/Chat/IRC/Networks/" target="_blank">liste de réseau IRC vérifié par DMOZ</a>.
							</p>
							<p>
								
								<span id="ircnotionserver" class="titre center">Les notions de serveur et de salon</span>
								Un réseau IRC est composé de plusieurs serveur connecté les uns aux autres et se relayant chacun l'information en fonction de son point de provenance (le plus proche).<br/>
								Typiquement, la HHH est sur le réseau Worldnet, ce dernier est composé de d'un serveur qui s'appel Vidar (vidar.irc.worldnet.net) et d'un serveur sobrement appelé Services (Services.Worldnet.Net).
							</p>
							<p>
								Ces serveurs contiennent un nombre plus ou moins définit de salons qui peuvent posséder leurs propres propriétés (appelés "Modes") et dont le nom commence par un dièse "#".<br/><br/>
								Voici quelques-uns des Modes que vous pourriez rencontrer :<br/> 
								-Mode +n : pas de messages provenant de l'extérieur.<br/>
								-Mode +t : changement de sujet restreint (le topic ne peut être changé que par au moins un opérateur).<br/>
								-Mode +r : le salon est enregistré sur le serveur.<br/>
								-Mode +s : salon secret (il ne sera pas vu dans la liste).<br/>
								-Mode +m : salon modéré : seul les utilisateurs voicés peuvent parler.<br/>
								-Mode +i : salon accessible uniquement sur invitation.<br/>
								-Mode +c : couleurs et styles de caractères interdit.
							</p>
							<p>
								
								<span id="ircnotionlevel" class="titre center">Les levels d'utilisateurs</span>
								Sur IRC, les utilisateurs sont disposés en fonction de leur niveau d'accès au salon :<br/>
								Vous avez surement remarqué que certains avaient des petits signes devant leurs pseudos (+, @, %, &, ~).<br/>
								Alors du plus petit au plus haut gradé :<br/><br/>

								LE VOICE : Noté par un "+".<br/>
								C'est avant tout un prestige qui vous encourage à parler.<br/><br/>
								LE HALFOP : Noté par un "%".<br/>
								Le halfop permet de kicker et bannir sur le chan et de distribuer des voices. Donc le halfop permet de gérer le chan.<br/><br/>
								LE OP : Noté par un "@".<br/>
								Le op a les mêmes droits que les halfops, mais peut en plus déléguer ses pouvoirs s'il s'absente, soit opé quelqu'un.<br/><br/>
								L'ADMINISTRATEUR OU PROTECT : Noté par un "&".<br/>
								Cette section comprend généralement le bot du salon et les administrateurs responsables des ops.<br/><br/>
								LE PROPRIÉTAIRE : Noté par un "~".<br/>
								Il a TOUS les droits, TOUS !
							</p>
							<h3><span id="irccommandes" class="titre gras center">Commandes IRC</span></h3>
							<p>
								Le protocole IRC dispose de beaucoup de commandes vous permettant de faire plein de choses, en voici une bonne liste non-exhaustive, il y a plus de 500 commandes en réalité. Certaines commandes sont disponibles directement et d'autres dépendent des services du serveur.<br/><br/>
								Toute commande passée sur IRC commence NÉCESSAIREMENT avec un slash "/".<br/><br/>
								Ceci étant dit, la plupart des client IRC ayant une interface disposent de toutes ces commandes en passant par l'interface du programme (clic droit, menus,etc.). Néanmoins vous remarquerez très vite qu'il est plus rapide de passer par une ligne de commande.<br/><br/>
								Les bouts de commande entre crochet [ ] sont les parties que vous devez modifier (les crochets doivent être absent quand vous envoyez la commande).<br/><br/>
								Pour une documentation exhaustive sur les commandes IRC, consulter la <a href="http://www.anope.org/docgen/1.8/fr/" target="_blank">documentation d'Anope</a> (en français !!!).
							</p>
							<p>
								<span id="irccommandessimple" class="titre center">Les commandes simples et directes</span>
							
								<span class="abloc italic gras">/nick [votre pseudo]</span>
								<span class="titlebox abloc">Permet de changer de pseudo quand cela vous chante</span>
								
								<span class="abloc italic gras">/me [une action]</span>
								<span class="titlebox abloc">Permet d'effectuer des actions sous la forme : Votrepseudo fait la roue (/me fait la roue)</span>
								
								<span class="abloc italic gras">/join #[un nom de salon]</span>
								<span class="titlebox abloc">Permet de joindre un salon, si le salon n'existe pas, vous le créérez et en deviendrez op.</span>
								
								<span class="abloc italic gras">/part</span>
								<span class="titlebox abloc">Permet de sortir du salon où a été tapé la commande.</span>
								
								<span class="abloc italic gras">/quit</span>
								<span class="titlebox abloc">Permet de se déconnecter du serveur, peu importe le salon où la commande a été tapée.</span>
								
								<span class="abloc italic gras">/hop</span>
								<span class="titlebox abloc">Permet de partir et de revenir sur le salon instantanément.</span>
								
								<span class="abloc italic gras">/list</span>
								<span class="titlebox abloc">Donne la liste des salons du serveur.</span>
							</p>
							<p>
								<span id="irccommandesnickserv" class="titre center">Les commandes du service de pseudo (nickserv)</span>
								<span class="titlebox abloc">Tout mot de passe <span class="gras">ne doit pas</span> contenir d'espace.</span>
								
								<span class="abloc italic gras">/nickserv register [mot de passe] [adresse email]</span>
								<span class="titlebox abloc">Permet d'enregistrer votre pseudonyme sur le serveur. Enregistrez votre pseudo sert à vous protéger. Si votre pseudo n'est pas enregistré, n'importe qui peut s'en servir quand vous êtes absent, se faire passer pour vous et vous apporter pas mal de problèmes.</span>
								
								<span class="abloc italic gras">/nickserv identify [mot de passe]</span>
								<span class="titlebox abloc">Permet de vous identifier au serveur à la connexion.</span>
								
								<span class="abloc italic gras">/nickserv ghost [pseudo normal] [mot de passe]</span>
								<span class="titlebox abloc">Si vous avez lancé deux fois votre connexion IRC ou que votre connexion a flanché et que votre client se relance automatiquement quand il reçoit de nouveau la connexion, vous vous retrouvez avec un deuxième utilisateur. Cette commande permet de supprimer le doublon présent.</span>
								
								<span class="abloc italic gras">/msg nickserv recover [pseudo] [mot de passe]</span>
								<span class="titlebox abloc">Permet de reprendre votre pseudo si un autre user l'utilise.</span>
								
								<span class="abloc italic gras">/msg nickserv release [pseudo] [mot de passe]</span>
								<span class="titlebox abloc">Permet d'abandonner votre pseudo.</span>
								
								<span class="abloc italic gras">/msg nickserv sendpass [pseudo]</span>
								<span class="titlebox abloc">Permet de vous faire envoyer votre mot de passe si vous l'avez oublié. Le mot de passe sera envoyé sur l'adresse mail que vous avez donné lors de l'enregistrement.</span>
							</p>	
								
							<p>
								<span id="irccommandeschanserv" class="titre center">Les commandes du service de salon (chanserv)</span>
								
								<span class="abloc italic gras">/msg chanserv register #[salon] [mot de passe] [description] </span>
								<span class="titlebox abloc">Permet d'enregistrer le salon à chanserv et vous donne le statut de owner.</span>
								
								<span class="abloc italic gras">/msg chanserv access #[chan] add [pseudo] [level]</span>
								<span class="titlebox abloc">Permet de donné un access à un utilisateur enregistré et identifié sur le serveur. Où [level] est un chiffre : level 3 = voice(+) / level 4 = halfop(%) / level 5 = op(@) / level 10 = protect(&).</span>
								<span class="titlebox abloc">Il est a noté que vous ne pouvez pas désigner un autre propriétaire. Il n'y a qu'un seul propriétaire par salon.</span>
								
								<span class="abloc italic gras">/msg chanserv identify #[chan] [mot de passe]</span>
								<span class="titlebox abloc">Permet l'identification en propriétaire du chan.</span>
							
							</p>
							<p>
								<span id="irccommandesbotserv" class="titre center">Les commandes du service de bot (botserv)</span>
								<span class="abloc titlebox">Tout bon serveur IRC dispose d'un service de robot permettant la gestion automatique de certaines actions. Pour intéragir avec un robot vous devez être au moins enregistré et identifié sur le serveur.</span>
								<span class="abloc italic gras">/msg botserv botlist</span>
								<span class="titlebox abloc">Donne la liste des noms de bots disponibles.</span>
								
								<span class="abloc italic gras">/msg botserv assign #[chan] [nom du bot issu de la liste des bots]</span>
								<span class="titlebox abloc">Assigne un bot au salon dont vous être propriétaire.</span>
								
								<span class="abloc italic gras">/msg botserv say #[chan] [texte]</span>
								<span class="titlebox abloc">Permet de parler grâce au bot. Vos paroles seront prononcées par le bot.</span>
								
								<span class="abloc italic gras">/msg botserv act #[chan] [texte]</span>
								<span class="titlebox abloc">Cette commande permet de faire un acte par l'intermédiaire du bot présent sur le chan. C'est l'équivalent d'un /me que ferait le bot.</span>
								
							</p>
							
							<p>
								<span id="irccommandestrigger" class="titre center">Les remotes</span>
								<span class="abloc titlebox">Tout bon serveur IRC a aussi activé les commandes par remotes. Ces remotes sont des commandes que vous donnez au bot et il effectue une action pour vous. Ces commandes ne sont pas précédées d'un slash "/".</span>
								
								<span class="abloc italic gras">!voice ou !devoice</span>
								<span class="titlebox abloc">Donne au bot l'ordre de vous voicer ou de vous dévoicer</span>
								
								<span class="abloc italic gras">!halfop ou !dehalfop</span>
								<span class="titlebox abloc">Donne au bot l'ordre de vous halfoper ou de vous dehalfoper</span>
								
								<span class="abloc italic gras">!op ou !deop</span>
								<span class="titlebox abloc">Donne au bot l'ordre de vous oper ou de vous déoper</span>
								
								<span class="abloc italic gras">!protect ou !deprotect</span>
								<span class="titlebox abloc">Donne au bot l'ordre de vous passer protect ou de vous descendre de votre protect</span>
								
								<span class="abloc italic gras">!owner ou !deowner</span>
								<span class="titlebox abloc">Donne au bot l'ordre de vous assigné propriétaire ou de vous descendre de votre statut de propriétaire.</span>
								
								<span class="abloc italic gras">!k [pseudo] [raison optionnelle]</span>
								<span class="titlebox abloc">Permet de kicker un pseudo avec ou sans raison</span>
								
								<span class="abloc italic gras">!kb [pseudo] [raison optionnelle]</span>
								<span class="titlebox abloc">Permet de kicker et de bannir un pseudo avec ou sans raison</span>
								
								<span class="abloc italic gras">!b [pseudo] [raison optionnelle]</span>
								<span class="titlebox abloc">Pose simplement un ban sur le pseudo, il ne pourra plus se connecter au salon lors de sa prochaine visite.</span>
							</p>
							
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 