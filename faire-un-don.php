<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Faire un don";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
							<p>
								Le serveur et le nom de domaine sont intégralement payés par Lukia et les frais annuels s'élèvent à 226€. Nous ne dépendons pas de la pub pour rembourser ces frais.
								<img src="design/img/dons.jpg">
								Vous pouvez aider la team à subvenir à ses besoins en donnant un peu, beaucoup, à la folie en suivant
								<a href="http://anesis-server.infos.st/" class="titre big center" target="_blank">CE LIEN !</a>
								
							</p>
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 