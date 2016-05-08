<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Atelier";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="intermediaire">
							<div class="intertitre">
								<h3><a href="boite-a-erreur.php" title="Boite à erreur" data-link="internal">Boite à erreur</a></h3>
								<p>
									Déposer ici les erreurs que vous auriez pu trouver dans un volume ou sur le site. 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="le-fonctionnement-de-l-atelier.php" title="Le fonctionnement de l'atelier" data-link="internal">Le fonctionnement de l'atelier</a></h3>
								<p>
									Faire du scantrad pendant plus de 10 ans nécessite une méthode bien particulière. Découvrez comment fonctionne l'atelier de la HHH. 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="recrutement.php" title="Recrutement" data-link="internal">Recrutement</a></h3>
								<p>
									Vous souhaitez intégrer l'équipe en tant que traducteur, correcteur, éditeur ou même développeur ? C'est ici que ça se passe.
								</p>
							</div>
						
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 