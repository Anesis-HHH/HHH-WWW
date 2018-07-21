<?php 
header("Pragma: no-cache");
include dirname(__FILE__).'/../include/connexionBdd.php';
include 'include/head.php';

// récupère les 30 derniers download
$lastDL= $bdd->query('SELECT * FROM download2 WHERE id!=0 ORDER BY id DESC LIMIT 0, 30');
//récupère les 100 meilleurs downloads
$topDL= $bdd->query('SELECT * FROM download2 WHERE id!=0 ORDER BY pop DESC LIMIT 0, 100');
// récupère le nombre de tous les downloads
$totalDL=$bdd->query('SELECT pop FROM download2 WHERE id!=0');
?>
<div id="main">
	<h2>Statistiques des downloads</h2>
	
	<?php
			$arraytotal=array();
			$totaldownload=0;
			// on récupère les 30 derniers download
			while($toto = $totalDL->fetch(PDO::FETCH_ASSOC))
			{
				$nbdl=intval($toto);
				array_push($arraytotal,$toto);
			}
			
			for($i=0;$i<count($arraytotal);$i++){
				$totaldownload+=intval($arraytotal[$i]['pop']);
			}
			echo '<div class="big titre gras">Nombre total de downloads : '. number_format($totaldownload,0,'.',' ').'<span class="advice mini"> (depuis 2010)</span></div>';
		?>
	
	<div class="fakelink titlebox">Les 30 derniers downloads</div>

  <div id="archnews_liste">
<!-- entete du tableau-->

		<div id="listrlz_cat">
			<span class="statdl_count">N°</span>
			<span class="statdl_date">Date de sortie</span>
			<span class="stat_titre">Release</span>
			<span class="stat_chapitre">Chapitre</span>
			<span class="stat_DL">Download</span>
			<span class="stat_fichier">Fichier</span>
		</div>
<!-- entete du tableau-->
<?php
			// on récupère les 30 derniers download
			$i=1;
			while($last = $lastDL->fetch(PDO::FETCH_ASSOC))
			{
		?>
<!-- dynamique-->		
		<div class="listrlz_line">
			<span class="statdl_count"><?php echo $i."-"; ?></span>
			<span class="statdl_date"><?php echo date("d/m/Y",$last['timestamp']); ?></span>
			<span class="stat_titre"><?php echo $last['titre']; ?></span>
			<span class="stat_chapitre"><?php echo $last['numero_chapitre']; ?></span>
			<span class="stat_DL"><?php echo $last['pop']; ?></span>
			<span class="stat_fichier"><?php echo $last['dl']; ?></span>
	
		</div>
<!-- dynamique-->		

<?php
	$i++;
	}
?>		
	</div>	<!-- end tableau-->		
	
<!--------------------------------------------------------------------------->	
	<div class="fakelink titlebox">Les 100 meilleurs downloads</div>

  <div id="archnews_liste">
<!-- entete du tableau-->

		<div id="listrlz_cat">
			<span class="statdl_count">N°</span>
			<span class="statdl_date">Date de sortie</span>
			<span class="stat_titre">Release</span>
			<span class="stat_chapitre">Chapitre</span>
			<span class="stat_DL">Download</span>
			<span class="stat_fichier">Fichier</span>
		</div>
<!-- entete du tableau-->
<?php
			// on récupère les 100 meilleurs downloads
			$i=1;
			while($best = $topDL->fetch(PDO::FETCH_ASSOC))
			{
		?>
<!-- dynamique-->		
		<div class="listrlz_line">
			<span class="statdl_count"><?php echo $i."-"; ?></span>
			<span class="statdl_date"><?php echo date("d/m/Y",$best['timestamp']); ?></span>
			<span class="stat_titre"><?php echo $best['titre']; ?></span>
			<span class="stat_chapitre"><?php echo $best['numero_chapitre']; ?></span>
			<span class="stat_DL"><?php echo $best['pop']; ?></span>
			<span class="stat_fichier"><?php echo $best['dl']; ?></span>
	
		</div>
<!-- dynamique-->		

<?php
	$i++;
	}
?>		
	</div>	<!-- end tableau-->		
</div>



<?php 
include 'include/foot.php';
?> 
