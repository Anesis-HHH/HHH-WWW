<?php
include 'include/connexionBdd.php';

if(isset($_GET["pseudo"]) && !empty($_GET["pseudo"])){
	
	$dossier = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseu');
	$dossier->bindParam('pseu', $_GET["pseudo"]);
	$dossier->execute();
	
	while($fmembre = $dossier->fetch(PDO::FETCH_ASSOC))
	{
			// concaténation des poles
			if($fmembre['pole1']!="-") $poste="Traduction, "; 
			if($fmembre['pole2']!="-") $poste.="Correction, "; 
			if($fmembre['pole3']!="-")$poste.="Édition, "; 
			if($fmembre['pole4']!="-")$poste.="Développement, ";
			
			$poste=substr($poste, 0, -2);
			
			// calcul de l'age
			//date in mm/dd/yyyy format;
			if(!empty ($fmembre['birthday'])){
			$birthDate = $fmembre['birthday'];
			//explode the date to get month, day and year
			$birthDate = explode("/", $birthDate);
			//get age from date or birthdate
			$age = (date("dm", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("dm")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2]));
			}else {
				$age="indéterminé mais majeur (si si c'est vrai, Lukia a couché avec lui)";
			}
			
			
		echo'
			<div id="fichemembre">
				<div id="pseudo_membre" class="aace">'.$fmembre['pseudo'].'</div>
				<div id="avatar_membre"><img src="images/avatars/'.$fmembre['avatar'].'" alt="avatar HHH"></div>
				<div id="info_membre">
					
					<div class="lignemembres">
						<span class="gras">Poste : </span>'.$poste.'
					</div>
					
					<div class="lignemembres">
						<span class="gras">Age : </span> '.$age.'
					</div>
					
					<div class="lignemembres">
						<div class="gras abloc">Description : </div>
						<p>
							'.nl2br($fmembre['description']).'
						</p>
					</div>
					
					<div class="lignemembres">
						<div class="gras abloc">Loisirs : </div>
						'.nl2br($fmembre['loisirs']).'
					</div>
					<div class="lignemembres">
						<span class="gras abloc">Contribution aux projets suivants : </span>
						'.nl2br($fmembre['contribution']).'

					</div>
				</div>
			</div>
			
		';
	}
	
	$dossier->closeCursor();
}
		
		
?>
