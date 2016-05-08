<?php
include 'include/connexionBdd.php';

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
	$titredelapage="Les membres";
	include 'include/head.php';
}
$activeMembre= $bdd->query('SELECT * FROM membre WHERE statut = "actif" ORDER BY pseudo');
$pauseMembre= $bdd->query('SELECT * FROM membre WHERE statut = "enpause" ORDER BY pseudo');
$retiredMembre= $bdd->query('SELECT * FROM membre WHERE statut = "retraite" ORDER BY pseudo');
?>
			
				<section>
					<div id="wrapper">
						<div id="leftmembres">
							<div class="blocmembres">
								<div class="titremembres">Pôles de la Team</div>
								<div class="lignemembres">Traduction <div class="postemembres">T</div></div>
								<div class="lignemembres">Correction <div class="postemembres">C</div></div>
								<div class="lignemembres">Édition <div class="postemembres">E</div></div>
								<div class="lignemembres">Développement <div class="postemembres">D</div></div>
							</div>
						
							<div class="blocmembres">
							
							<div class="titremembres">Membres actifs</div>
							<?php
								while($lesmembres = $activeMembre->fetch(PDO::FETCH_ASSOC))
								{
							?>
							<div class="lignemembres"><div class="membre"><?php echo $lesmembres['pseudo']; ?></div>
								<?php
									
									if($lesmembres['pole4']=="developpement"){
										echo '<div class="postemembres">D</div>';
									}
									if($lesmembres['pole3']=="edition"){
										echo '<div class="postemembres">E</div>';
									}
									if($lesmembres['pole2']=="correction"){
										echo '<div class="postemembres">C</div>';
									}
									if($lesmembres['pole1']=="traduction"){
										echo '<div class="postemembres">T</div>';
									}
								
								?>
							</div>
							
							<?php
								}
								$activeMembre->closeCursor();
							?>
							</div>
							<div class="blocmembres">
								<div class="titremembres">Membres en pause</div>
								<?php
								while($lesmembres = $pauseMembre->fetch(PDO::FETCH_ASSOC))
								{
								?>
								<div class="lignemembres"><div class="membre"><?php echo $lesmembres['pseudo']; ?></div>
									<?php
										
										if($lesmembres['pole4']=="developpement"){
											echo '<div class="postemembres">D</div>';
										}
										if($lesmembres['pole3']=="edition"){
											echo '<div class="postemembres">E</div>';
										}
										if($lesmembres['pole2']=="correction"){
											echo '<div class="postemembres">C</div>';
										}
										if($lesmembres['pole1']=="traduction"){
											echo '<div class="postemembres">T</div>';
										}
									
									?>
								</div>
								
								<?php
									}
									$activeMembre->closeCursor();
								?>
							</div>
						
							<div class="blocmembres">
								<div class="titremembres">Membres à la retraite</div>
								<?php
								while($lesmembres = $retiredMembre->fetch(PDO::FETCH_ASSOC))
								{
								?>
								<div class="lignemembres"><div class="membre"><?php echo $lesmembres['pseudo']; ?></div>
									<?php
										
										if($lesmembres['pole4']=="developpement"){
											echo '<div class="postemembres">D</div>';
										}
										if($lesmembres['pole3']=="edition"){
											echo '<div class="postemembres">E</div>';
										}
										if($lesmembres['pole2']=="correction"){
											echo '<div class="postemembres">C</div>';
										}
										if($lesmembres['pole1']=="traduction"){
											echo '<div class="postemembres">T</div>';
										}
									
									?>
								</div>
								
								<?php
									}
									$activeMembre->closeCursor();
								?>
							</div>
							<div class="blocmembres">
								<div class="titremembres">Membres à la retraite dont nous n'avons pas la fiche<br/><span class="mini">(si vous êtes dans cette liste, contactez-nous pour la mettre à jour)</span></div>
								Aijou<br/>
								Aylin<br/>
								Ame no Ryu<br/>
								
								Bal Sagoth<br/>
								Battosai_<br/>
								Benjamin<br/>
								Bondal<br/>
								Brasno<br/>
								Centauri<br/>
								Cereal<br/>
								CFH<br/>
								Deedo<br/>
								Giromu<br/>
								Guizmo<br/>
								Honey<br/>
								Kite<br/>
								Lesinfox<br/>
								Lhazar<br/>
								Magus<br/>
								Maniac<br/>
								Mendou<br/>
								Niten<br/>
								RikWean<br/>
								Sad Joker<br/>
								Shorty<br/>
								Silsa<br/>
								The_Peluche<br/>
								Thisbang<br/>
								Tsucchi<br/>
							</div>
						</div>
						
						<div id="rightmembres">
						
						
						
							<div id="concilmembre">Cliquez sur un membre pour voir sa fiche.</div>
						
						
							
						</div>

							
						
						
						
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
