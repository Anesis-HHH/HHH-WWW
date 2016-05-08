<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Client IRC Mibbit";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
							<p>
								<span class="big gras center titre">Qu'est-ce qu'un client IRC ?</span>
								Un client IRC c'est un programme permettant de vous connecter au protocole IRC. 
								<span class="big gras center titre">Et donc Mibbit dans tout ça ?</span>
								Mibbit à la particularité d'être un client compatible avec le protocole HTTP et donc d'être utilisable dans un client HTTP : votre navigateur.
							</p>
							<p>
								Nous avons choisi d'intégrer totalement au site de la HHH le client IRC Mibbit. 
								<img src="design/img/irc/mibbit.jpg" alt="client IRC mibbit">
								Une fois connecté (ou pas), vous pouvez à tout moment choisir de le réduire et de continuer votre navigation sur le site. Il ira se loger dans le coin supérieur droit du site, sous la bannière. Ensuite vous pouvez reprendre la conversation en le dépliant à l'aide de l'icône dédiée ou choisir de le fermer.
							</p>
							<p>
								Notez que vous ne pourrez pas télécharger de release avec ce client. Pour ce faire vous devrez utiliser <a href="client-irc-kvirc-luxuria.php" data-link="internal">Luxuria</a> ou un autre client installable.
							</p>
							<p>
								<span class="big gras center titre">Alors n'hésitez pas !</span>
								<span class="abloc big gras center fakelink" data-chat="true">Venez dès maintenant discuter avec la team !</span>
								
							</p>
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 