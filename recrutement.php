<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Recrutement";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
							<p>
								Le recrutement dans l'équipe se fait uniquement via IRC et non par mail. <br/><br/>
								Lors du recrutement vous serez mis en contact avec un membre de la team qui sera votre référent pendant toute la durée du test de recrutement et au début pour vous donnez les clés de la team si vous réussissez le test d'entrée.<br/><br/>
								Les tests de recrutement ont été élaborés dans le but de toucher toute les parcelles du scantrad de la spécialité que vous aurez choisit.<br/><br/>
								Seul le pôle développement n'est pas sujet à un test, vous ne pouvez pas être recruté sur votre propre envie. En effet, tous les développeur ont été recruté au fil du temps sur une base de confiance mutuelle et une expertise avérée.
								
							</p>
							<p>
								Une seule chose à faire si vous voulez venir bosser pour l'équipe :
								<span class="titre center gras fakelink" data-chat="true">Venir sur IRC avec Mibbit</span>
								<span class="titre center">ou</span>
								<span class="titre center gras"><a href="client-irc-kvirc-luxuria.php" data-link="internal">Télécharger et installer Luxuria</a></span>
							</p>
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 