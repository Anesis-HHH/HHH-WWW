<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="News";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="intermediaire">
							<div class="intertitre">
								<h3><a href="index.php" title="Les dernières news" data-link="internal">Les dernières news</a></h3>
								<p>
									Retrouvez les dernières news de la HHH.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="archives-des-news.php" title="Les archives des news" data-link="internal">Les archives des news</a></h3>
								<p>
									Les archives, le seul endroit où la poussière a du bon.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="best-of-des-news.php" title="Le best-of des news" data-link="internal">Le best-of des news</a></h3>
								<p>
									Parce qu'on sait faire de bonnes news, on vous en propose le meilleur !
								</p>
							</div>
						
						</div>
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 