<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Bonus";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="intermediaire">
							<div class="intertitre">
								<h3><a href="hors-serie.php" title="Hors série" data-link="internal">Hors série</a></h3>
								<p>
									Les one-shots, les doujins ou les erotics comics que la HHH produit exceptionnellement. 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="animes.php" title="Animes" data-link="internal">Animes</a></h3>
								<p>
									Parce qu'on sait AUSSI faire du fansub.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="artworks.php" title="Artworks" data-link="internal">Artworks</a></h3>
								<p>
									Photoshop ne sert pas qu'a faire du scantrad, retrouvez les belles images, les crédits mensuels, les wallpapers et les calendriers de la HHH. 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="jeux.php" title="Jeux" data-link="internal">Jeux</a></h3>
								<p>
									Des jeux que l'équipe a développé aux jeux auxquels nous adorons jouer, retrouvez la sélec' de la HHH.
								</p>
							</div>
						
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 