 <div id="background"></div>
<div id="background2"></div>
<header>
  <section id="menu" draggable="true">
    <?php
    $pages = array("accueil"=>"Accueil", "admissibles"=>"Admissibles", "bde"=>"Le BDE", "bds"=>"Le BDS", "actu"=>"Actualités", "ignare"=>"L'IGNare", "album"=>"Photos", "connexion"=>"Se connecter");
    foreach ($pages as $nom => $page) {
      if ($nom == "album" || $nom == "ignare") {
        if (isset($_SESSION['ENSG'])) { if (!$_SESSION['ENSG']) {continue;}} else {continue;}
      }
      if ($nom == "connexion") {
        ?>
        <button class="bouton" target="_self" onmouseup="connect()"><span><strong><?php echo $page; ?></strong></span></button>
        <?php
      }
      else { ?>
      <button class="bouton" target="_self" onmouseup="goToPHP('./php/<?php echo $nom; ?>.php')"><span><strong><?php echo $page; ?></strong></span></button>
      <?php
      }
    }
     ?>
   </section>
  <div id="logos">
      <div id="logo_bde">
        <img onmouseup="goToPHP('./php/bde.php')" src="./images/logo_bde_transparent.png" alt="icone bde">
      </div>
      <div id="logo_ensg">
        <a target="_blank" href="http://ensg.eu"><img src="./images/logo_ensg.png" alt="logo ensg mais ca marche pas"></a>
      </div>
  </div>
  <div id = "photo_bde">
    <img src="./images/photo_bde.jpg" alt="photo bde">
  </div>
  <a onmouseup="goTop()" id="haut_de_page"><img src="./images/flèche_haut.png" alt=""></a>
  <?php
  if (isset($_POST['id']) AND isset($_POST['mdp'])) {
    if ($_POST['id'] == "admin" AND $_POST['mdp'] == hash("whirlpool", "admin")) {
      $_SESSION['type'] = "admin";
      $_SESSION['modifier_article'] = True;
      $_SESSION['supprimer_article'] = True;
      $_SESSION['IGNare'] = True;
      $_SESSION['ENSG'] = True;
    }
    elseif ($_POST['id'] == "membreENSG" AND $_POST['mdp'] == hash("whirlpool", "Fg4d-8!azo")) {
      $_SESSION['type'] = "membre ENSG";
      $_SESSION['modifier_article'] = False;
      $_SESSION['supprimer_article'] = False;
      $_SESSION['IGNare'] = False;
      $_SESSION['ENSG'] = True;
    }
    else {
      echo '<p id="erreur_connexion">Mot de passe ou identifiant incorrect</p>';
    }
  }
  if (!isset($_SESSION['type'])) {
  ?>
  <div id=connexion>
    <form id="infos_connexion" action=# method="post">
      <label for="id">Identifiant : </label>
      <input type="text" name="id" placeholder="identifiant" />
      <label for="mdp">Mot de passe : </label>
      <input id="password" type="password" name="mdp" placeholder="mot de passe" />
      <input id="bouton_connexion" type="submit" value="Connexion"/>
    </form>
    <script src="./js/whirlpoolExec.js"></script>
  </div>
  <?php
  }
  else {
  ?>
  <div id=connexion>
    <div id="connected">
      <form id="utilisateur" action="./php/espace_VIP.php" method="post" onsubmit="return false">
        <input type="hidden" name="creer_article" value=True />
        <input type="image" src="./images/icone_connexion.png" alt="connecté en tant que" onclick=goToPHP("./php/espace_VIP.php","creer_article=True") />
        <span style="margin-left:5px;"><?php echo $_SESSION['type'] ?></span>
      </form>
      <form id="deconnexion" action="./php/deconnexion.php" method="post" onsubmit="return false">
        <input id="bouton_dc" type="submit" value="Déconnexion" onclick=goToPHP("./php/deconnexion.php") />
      </form>
    </div>
  </div>
  <?php
  } ?>
</header>
