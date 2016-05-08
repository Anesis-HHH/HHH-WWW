<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Boite à erreur";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<h3 class="center">
							Une faute d'orthographe oubliée ? Une page manquante ? Un bug sur le site ? Une erreur en particulier ? Aidez-nous à rendre meilleure la HHH ! 
						</h3>
						<div id="errorbox">
							<div class="mini">Avant d'envoyer une erreur incompréhensible pour nous, veuillez lire le petit mémo en dessous de ce formulaire.</div>
							<div id="errorselect">
								<div class="errottitle">*Type d'erreur :</div>
								<input type="radio" name="errortype" value="faute" id="faute"><label for="faute">Faute de français dans un volume</label>
								<input type="radio" name="errortype" value="miss" id="misspage"><label for="misspage">Page manquante</label>
								<input type="radio" name="errortype" value="bug" id="bugsite"><label for="bugsite">Un bug sur le site</label>
								<input type="radio" name="errortype" value="autre" id="other"><label for="other">Autre</label>
							</div>
							<div class="errottitle">*Intitulé de l'erreur :</div>
							<input type="text" name="errorintitule">
							<div class="errottitle">*Description :</div>
							<textarea name="errortext" ></textarea>
							<input type="text" name="dumbot"/>
							<div id="errorsend">Envoyer</div>
						</div>
						<div id="erroradvice">
								<p>Afin de corriger au plus vite une faute dans une release, donnez-nous l'emplacement exact de la faute. Dites-nous dans quel volume, quelle page, dans quelle case, dans quelle bulle, et enfin, quel mot si l'erreur concerne un mot.<br/><br/>
								Voici un petit exemple :<br/><br/>
								<img src="design/img/page_faute.jpg" alt="page d'erreur">
								Cet extrait du volume Escape est annoté selon la nomenclature que nous utilisons pour traduire : les cases sont numérotées et les bulles sont représentées dans le sens de lecture par l'alphabet (vous noterez que les double-bulles n'en font qu'une).<br/><br/>
								Voici donc comment procéder :<br/>
								- Dans le volume Escape, page 38, il y a une faute case 1, bulle C, "bitte".<br/>
								- Même page, case 5, bulle A, "foi"
								<br/><br/><br/>
								<span class="gras">Merci de participer à la qualité HHH !</span>
							</p>
						
						</div>
						
					
					
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 