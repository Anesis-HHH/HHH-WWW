<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="IRC";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="intermediaire">
							<div class="big titre">
								Vous trouverez le salon de l'équipe à l'adresse suivante :
								<h3><a href="irc://irc.worldnet.net/HHH">#HHH@irc.worldnet.net</a></h3>					
							</div>
							<div class="titre">Pour tous ceux qui ne connaissent pas IRC, vous avez deux clients à disposition et des tutoriels ci-dessous.</div>
							<div class="intertitre">
								<h3><a href="client-irc-mibbit.php" title="Client IRC Mibbit">Client IRC Mibbit</a></h3>
								<p>
									Un client IRC sans installation qui vous permettra de venir chatter avec la team directement dans votre navigateur.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="client-irc-kvirc-luxuria.php" title="Client KVirc Luxuria">Client KVirc Luxuria</a></h3>
								<p>
									Pour vous permettre de télécharger directement et facilement sur IRC, la team a fait sa propre version du client KVirc. 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="liste-xdcc.php" title="Liste XDCC">Liste XDCC</a></h3>
								<p>
									Pour télécharger sur IRC, vous avez besoin du numéro du chapitres, c'est ici que ça se passe.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="tutoriels-irc.php" title="Tutoriel IRC">Tutoriels IRC</a></h3>
								<p>
									Retrouvez des tutoriels IRC pour d'autres clients ou les grands basiques des commandes IRC.
								</p>
							</div>
						
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 