<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Nous contacter";
include 'include/head.php';
}
?>
			<section>
				<div id="wrapper">
					<div id="contactpage" class="contactbox">
						<div class="contacttitre">Une question en particulier ? Un remerciement ? Un coup de gueule ?<br/>Laissez-nous un message, nous vous répondrons si possible.<div class="gras">Pour tous bug ou erreur, veuillez vous reporter à la boite à erreur.</div></div>
						<div class="contactitem">Pseudo*</div>
						<input type="text" name="contactpseudo">
						<div class="contactitem">Email</div>
						<input type="text" name="contactmail">
						<div class="contactitem">Votre message*</div>
						<textarea name="contacttext" ></textarea>
						<input type="text" name="dumbot"/>
						<div id="contactsend">Envoyer</div>
					</div>
				</div>
			
			</section>


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 