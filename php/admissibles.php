<?php if (!isset($_SESSION)) {session_start();} ?>
<h1>Admissible</h1>
<h2><center>Le BDE de l'ENSG vous souhaite la bienvenue !</center></h2>
	<div class="boutons_admissions">
		<button id="selection_partie" name="admissible" onclick="admissible.php#admissible">Admissible ENSG</button>
		<button id="selection_partie" name="acces" onclick="admissible.php#acces_ecole">Accès à l'école</button>
		<button id="selection_partie" name="resto" onclick="admissible.php#resto_ecole">Restauration</button>
		<!--<a href="admissible.php#admissible"><input type="button"></a>-->
	</div>

<div id="presentation">

    <div class="paragraph"><p>Si tu es admissible dans notre merveilleuse école, tout d'abord, félicitations! </p>
		<p>Tu es en filière scientifique (MP-PC-PSI-PT) ou littéraire (BL)? Tu auras donc le plaisir de découvrir nos locaux lors des oraux du concours Mines-Télécom ou de la banque BL-SES. Tu pourras entre chaque oral te renseigner auprès de nos étudiants qui tiendront un stand pour te tenir informé de la vie de l'école et répondre à toutes tes questions!</p>
		<p>Pour plus de précision sur ces différentes formations et leur intégration, <a target="_blank" href="http://ensg.eu">clique ici</a>.</p></div>
	<h3 style="padding-top:30px;">Admissibles ENSG</h3>

	  <table id="liens">
		<div style="display:flex;flex-direction:column;">
			<center></p>Le BDE fait le lien entre l'école et les étudiants, il est là pour animer votre vie au sein de l'établissement. Afin d'en avoir un aperçu, vous pouvez consulter la plaquette alpha de l'ENSG, qui est disponible <a id="dl_plaquette" href=".plaquette_alpha_ensg_2017.pdf/" download="plaquette_alpha_ensg_2017.pdf">ici</a><i> (25 Mo)</i></p></center>
				<div style="display:flex;flex-direction:row;">
					<iframe width="45%" height=auto src="https://www.youtube.com/embed/bG-Z35nVHeA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					<iframe width="45%" height=auto src="https://www.youtube.com/embed/Eajuygme8wg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
		<tr>
			<td><p><center>   La plaquette alpha 2017 de l'ENSG   </center></p></td>
			<td><p><center>   Vidéo de présentation de l'ENSG   </center></p></td>
			<td><p><center>   Video SmartCampus de décembre 2016   </center></p></td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>

</div>

<div id="acces_ecole">

	<h3 style="padding-top:30px;">Plan d'accès</h3>
	<center>
		<td><img src="./images/plan.png" width="80%" height="auto" alt="icone bde">
		<p>Par le RER A, direction Marne la Vallée-Chessy, arrêt Noisy-Champs (25 minutes depuis Châtelet). </p>
		<p>Conseil : Sortir à l’avant du train, puis après le portique emprunter la sortie de droite(sortie Descartes).</p>
	</center>
</div>

<div id="resto_ecole">

	<h3 style="padding-top:30px;">Restauration</h3>
	<ul>
		<li>Le self MRS : situé en face de l’Ecole, ouvert de 11h30 à 14h00. </li>
		<li>La cafét’ : située dans le Hall de l'Ecole, tu pourras y trouver des sandwiches, des paninis ainsi que des gâteaux/ viennoiseries.</li>
		<li>Différents restaurants/fast-food à proximité : Good Tasty, Addictea Cafe et Candy Crepe.</li>
	</ul>

</div>
