<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Team";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="intermediaire">
							<div class="intertitre">
								<h3><a href="faire-un-don.php" title="Faire un don" data-link="internal">Faire un don</a></h3>
								<p>
									Pas de pub et des chapitres gratuit, ça ne tombe pas du ciel. Aidez la HHH à payer son serveur !
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="qui-est-la-HHH.php" title="Qui est la HHH ?" data-link="internal">Qui est la HHH ?</a></h3>
								<p>
									Parce qu'on a une philosophie et un savoir-être ! Les maisons d'édition et les ayant-droits, c'est ici aussi pour vous. 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="les-membres.php" title="Les membres" data-link="internal">Les membres</a></h3>
								<p>
									La HHH c'est avant tout une équipe qui se connait réellement, à vous de nous connaître également.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="contact.php" title="Nous contacter" data-link="internal">Nous contacter</a></h3>
								<p>
									Quelque chose à nous dire en particulier ? Remplissez le formulaire de contact. 
								</p>
							</div>
						
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 