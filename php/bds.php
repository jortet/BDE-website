<?php if (!isset($_SESSION)) {session_start();} ?>
<?php include("redirect.php"); ?>
<?php
$liste_albums = array("oxign" => "BDS OxIGN 2018 - 2019", "rossignols" => "BDS L'Ordre des RossIGNols 2017 - 2018");
foreach ($liste_albums as $key => $album) {
  ?>
  <button id="<?php echo "bouton_".$key ?>" class="selection_album" name="album" type="submit" onclick=openBureau('<?php echo $key ?>'); ><?php echo $album ?></button>
  <div id='<?php echo $key ?>' class="contenuBDS_toshow">

  </div>
    <?php
}
?>
<div id="oxign_content" class="contenuBDS">
  <h1>BDS OxIGN</h1>
  Bonne ambiance
</div>
<div id="rossignols_content" class="contenuBDS">
  <h1>BDS L'Ordre des RossIGNols</h1>
  <h2>Le mot du bureau</h2>
  <p>Le BDS est le bureau qui gère la vie sportive au sein de l’école. Si tu as lâché le sport ces deux ou trois dernières années, ou même que tu n’en as jamais fait (hérésie…), nous t’aiderons à retrouver la ligne !</p>
  <p>Le Bureau organise et participe à un certain nombre de compétitions sur l’année : sur le campus, entre les différentes écoles et plus encore. Des activités comme des sorties escalade, laser game, bowling ou encore patinoire vous sont également proposées. Il ne tient qu’à vous de proposer de nouvelles activités ! En plus des activités extérieures, l’école possède aussi des terrains de tennis, de foot, ainsi qu’une salle de musculation. </p>
  <p>L’école dispose également d’équipes de rugby, de volley, de tennis, de pompom (si tu es un garçon, c’est aussi fait pour toi!), ainsi que des (quasi) professionnels surmotivés de pétanque (ENSG championne invaincue de pétanque au Trophée Descartes, excusez du peu!). N’hésite pas à venir nous voir afin de mettre en place de nouveaux sports. Le but est de diversifier les activités afin d’augmenter ton bien-être sportif ! </p>
  <p>Au sport durant l’année à Paris s’ajoutent des sorties lors du stage à Forcalquier, comme de la spéléologie, du rafting, du canyoning, des randonnées… Impossible de s’ennuyer !</p>
  <p>Comme tu l’auras compris, le BDS a ce qu’il te faut pour ta pratique sportive !</p>
  <p>En espérant te voir à la rentrée ! </p>
</div>
