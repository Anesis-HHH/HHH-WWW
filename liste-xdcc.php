<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Liste XDCC";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="pagesstatiques">
							<p>
								<span class="big gras center titre">Vous retrouverez la liste des chapitres téléchargeable via IRC sur la liste XDCC à cette adresse : <a href="http://xdcclist.hhh-world.com/" target="_blank" title="liste xdcc" class="titre">http://xdcclist.hhh-world.com/</a></span>
								
								<span class="big center titre">Bon téléchargement !</span>
								
							</p>
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 