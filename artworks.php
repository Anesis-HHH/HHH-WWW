<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Artworks";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques" class="artworks">
						<div class="big titre gras">Les Crédits</div>
							<p>
								Depuis le début la fondation de l'équipe, les crédits ont fait partie du paquet des releases que vous téléchargez. <br/>En 2010, la décision a été prise de les changer tous les mois. Depuis lors, à quelques exceptions près, c'est <span class="gras">Lukia</span> qui s'y colle tous les mois. 
							</p>
							<?php
								$dir='images/artworks/credits/'; // dossier des credis
								// on scan le dossier
								$wallarray=scandir($dir, 1);
								// pour chaque dossier trouvé
								foreach ($wallarray as $key=>$value) {
									if ($value != "." && $value != ".."){
										echo '<div class="blockcred">'."\n";
										// on l'ouvre
										$handle = scandir($dir.$value."/");
										foreach($handle as $cle=>$valeur){
											if ($valeur != "." && $valeur != ".." && $valeur=="mini"){
												$mini=scandir($dir.$value."/".$valeur."/");
												echo '<img src="'.$dir.$value."/".$valeur."/".$mini[2].'" alt="credit">'."\n";
											}
										}
										foreach($handle as $cle=>$valeur){
									
											 if ($valeur != "." && $valeur != ".." && $valeur!="mini") { // on élude les retour de racine et le répertoire des minature
												// on récupère les taille et le nom des images
												echo '<div class="abloc center"><a href="'.$dir.$value."/".$valeur.'">'.$value.'</a></div>'."\n";
											}
										}
										echo "</div>\n";
									}
								}
							?>
							<div class="clear"></div>
							<div class="big titre gras">Les Wallpapers</div>
							<p>
								Des wallpapers dérivés des crédits, des calendriers ou d'une envie soudaine.<br/> On notera le seul dérivé du HHH Girl Contest (concours organisé 2 ans de suite ayant pour but d'habiller une nana aux couleurs de la HHH) : le Lara Croft, arrivé 3° au concours, fait par <span class="gras">Yumemi</span>, désormais membre de l'équipe.
							</p>
							
							<?php
								$dir='images/artworks/wallpapers/'; // dossier des wallpaper
								// on scan le dossier
								$wallarray=scandir($dir);
								// pour chaque dossier trouvé
								foreach ($wallarray as $key=>$value) {
									if ($value != "." && $value != ".."){
										echo '<div class="blockwall">'."\n";
										// on l'ouvre
										$handle = scandir($dir.$value."/");
										foreach($handle as $cle=>$valeur){
											if ($valeur != "." && $valeur != ".." && $valeur=="mini"){
												$mini=scandir($dir.$value."/".$valeur."/");
												echo '<img src="'.$dir.$value."/".$valeur."/".$mini[2].'" alt="wallpaper" width="200">'."\n";
											}
										}
										foreach($handle as $cle=>$valeur){
									
											 if ($valeur != "." && $valeur != ".." && $valeur!="mini") { // on élude les retour de racine et le répertoire des minature
												// on récupère les taille et le nom des images
												$getimagesize = getimagesize($dir.$value."/".$valeur);
												$sizex=$getimagesize[0];
												$sizey=$getimagesize[1];
												echo '<div class="abloc center"><a href="'.$dir.$value."/".$valeur.'">'.$value.'-'.$sizex.'-'.$sizey.'</a></div>'."\n";
											}
										}
										echo "</div>\n";
									}
								}
							?>
							<div class="clear"></div>
							<div class="big titre gras">Les Calendriers</div>
							<p>
								De juillet 2010 à décembre 2011, la HHH a sortit un calendrier tous les mois pour égayer votre bureau. Ces calendriers étaient destinés à être imprimé puis plier selon ces instructions : 
								<img src="design/img/howtodo.jpg" alt="calendrier">
								Dans les auteurs de ces travaux graphiques (très long à faire) on a compté: 
								<span class="abloc">-<span class="gras">SSG</span> : Février 2011.</a>
								<span class="abloc">-<span class="gras">Datenshi</span> : Juin 2011.</a>
								<span class="abloc">-<span class="gras">Yumemi</span> : Décembre 2011.</a>
								<span class="abloc">-<span class="gras">Gregorio</span> : Juillet 2010.</a>
								<span class="abloc">-<span class="gras">Lukia</span> : tous les autres.</a>
							</p>
							<?php
								$dir='images/artworks/calendriers/'; // dossier des wallpaper
								// on scan le dossier
								$wallarray=scandir($dir);
								// pour chaque dossier trouvé
								foreach ($wallarray as $key=>$value) {
									if ($value != "." && $value != ".."){
										echo '<div class="blockcal">'."\n";
										// on l'ouvre
										$handle = scandir($dir.$value."/");
										foreach($handle as $cle=>$valeur){
											if ($valeur != "." && $valeur != ".." && $valeur=="mini"){
												$mini=scandir($dir.$value."/".$valeur."/");
												echo '<img src="'.$dir.$value."/".$valeur."/".$mini[2].'" alt="calendrier" width="200">'."\n";
											}
										}
										foreach($handle as $cle=>$valeur){
									
											 if ($valeur != "." && $valeur != ".." && $valeur!="mini") { // on élude les retour de racine et le répertoire des minature
												// on récupère les taille et le nom des images
												echo '<div class="abloc center"><a href="'.$dir.$value."/".$valeur.'">'.$value.'</a></div>'."\n";
											}
										}
										echo "</div>\n";
									}
								}
							?>
							<div class="clear"></div>
							
							
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 