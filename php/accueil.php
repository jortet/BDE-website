<?php if (!isset($_SESSION)) {session_start();} ?>
<h1>Accueil</h1>
<p>Bienvenue sur le site du BDE VIKIGN de l'ENSG géomatique</p>
<div id="ecole">
  <div id="presentation">
    <i id="attention"><br>/!\ Ce site est en cours de développement.  Il s’agit d’un projet entièrement mené par deux élèves ingénieurs de première année depuis Mars 2017. /!\<br></i>
	<h3 style="padding: 20px;">L'Ecole</h3>
    <div class="paragraph"><p>L'Ecole Nationale des Sciences Géographiques fait partie du panel des Grandes Écoles d'Ingénieurs de France, située sur le campus Descartes à Marne-la-Vallée.</p>
		<p>L’ENSG propose 13 cycles de formation en géomatique centrés sur l’acquisition et la gestion de l’information géographique.  La géomatique est la contraction des termes « géographie » et « informatique». Différents niveaux de diplômes y sont préparés : BTS, licence professionnelle, cycle d’ingénieur, masters et mastères spécialisés. Les débouchés professionnels sont très diversifiés : environnement, management des territoires, transports, énergie, défense, prévention des risques et plus généralement, tous les domaines s’appuyant sur les technologies de l’information.</p>
		<p>Pour plus de précision sur ces différentes formations et leur intégration, <a target="_blank" href="http://ensg.eu">clique ici</a>.</p></div>
	<h3 style="padding-top:30px;">Le BDE actuel</h3>
      <table id="photomembrebde">
		<tr>
			<td><img alt="Membres BDE" src="./images/photo_4bde.JPG"></td>
		</tr>
		<tr>
			<td>"Le BDE fait le lien entre l'école et les étudiants, il est là pour animer votre vie au sein de l'établissement!"</td>
		</tr>
		</table>
    <h3>Campus</h3>
		<div class="paragraph"><p>L’ENSG est entourée d’autres grandes écoles et universités prestigieuses parmi lesquelles : l’Université Paris Est Marne-la-Vallée, l’ESIEE, l’Ecole d’Urbanisme de Paris et l’Ecole Nationale des Ponts et Chaussées. La proximité géographique de ces écoles donne l’occasion à de nombreuses rencontres dans le cadre des cours, mais aussi en dehors lors de défis sportifs comme le Trophée Descartes ou lors de la plus grosse soirée étudiante de l’Est parisien, la Nuit Descartes.</p>
		<p>Un campus qui est ainsi dynamique, mais aussi bien desservi par le réseau de RER et de bus et qui garde pourtant l’esprit d’un campus campagnard, tant les forêts et étangs ne manquent pas autour de la cité : de quoi vous combler pour les activités en plein air.</p>
		<p>Ouverte au soleil couchant, l’ENSG correspond à la partie ouest du bâtiment en commun avec l’Ecole des Ponts et Chaussées, à 5 minutes à pied de la station du RER A. Un gigantesque et élégant hall de 4 étages sous verrière se divise en trois grandes ailes, laissant la place à de multiples salles de cours et TP, à des bureaux, à un centre de documentation et à un étage entier d’une aile pour le foyer des élèves.</p></div>
    <h3>Situation géographique de l'école</h3>
  </div>
<div id="mapid" onmouseenter="bloque(this)"></div>
<script src="./js/leaflet.js"></script>
<script>
  function bloque(mapdiv){
    mapdiv.preventDefault();
  }
</script>
<br><br>
<center><p>ENSG<br>
6-8 Avenue Blaise Pascal<br>
Cité Descartes<br>
Champs-sur-Marne<br>
77455 Marne la Vallée<br>
CEDEX 2
</center>
</div>
