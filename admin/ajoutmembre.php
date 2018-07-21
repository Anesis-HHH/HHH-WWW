<?php 
header("Pragma: no-cache");
include 'include/head.php';
?>
<div id="main">
	<h2>Ajouter un membre</h2>

	<form action="action/addmembre.php" method="post">

		<p>
			Pseudo :
			<input type="text" name="pseudo" /><br/>			
		</p>
		<p>
			email :
			<input type="text" name="email" /><br/>
			<span class="advice mini">N'apparaitra pas sur le site</span>			
		</p>
		<p>
			Date de naissance :
			<input type="text" name="datenaissance" /><br/>
			<span class="advice mini">Sous la forme JJ/MM/AAAA. Seul votre âge apparaitra sur le site</span>
		</p>
		<p>
			Fichier avatar :
			<input type="text" name="avatar"/><br/>
			<span class="advice mini">Mettez le nom du fichier. N'oubliez pas d'uploader le fichier d'avatar dans images/avatars/</span>
		</p>		
		<p>
			Pôle du(des) poste(s) occupé(s) :<br/>
			Traduction<input type="checkbox" name="pole1" value="traduction"/><br/>
			Correction<input type="checkbox" name="pole2" value="correction"/><br/>
			Édition<input type="checkbox" name="pole3" value="edition"/><br/>
			Développement<input type="checkbox" name="pole4" value="developpement"/><br/>
		</p>
		

		<p>
			Description :
			<br />
			<textarea name="description" rows="8" cols="75"></textarea>
		</p>	

		<p>
			Loisirs :
			<br />
			<textarea name="loisirs" rows="8" cols="75"></textarea>
		</p>		
		<p>
			Contribution aux projets suivants :
			<span class="advice mini">Vous ne pouvez pas remplir cette case à la création de la fiche. Pour ce faire vous devez modifier votre profil.</span>
			<textarea name="contribution" rows="8" cols="75"></textarea>
			
		</p>		
		<p>
			Statut :
			<select name="statut">
				<option value="-">-</option>
				<option value="actif">Actif</option>
				<option value="enpause">En pause</option>
				<option value="retraire">À la retraite</option>
			</select><br/>
		</p>	
		
		<input type="submit" value="Envoyer" />
	</form>







		
</div>

<?php 
include 'include/foot.php';
?> 
