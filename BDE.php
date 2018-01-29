<?php session_start(); ?>
<?php //include("./php/redirect.php"); ?>
<!DOCTYPE html>
<?php include("./php/head.html"); ?>
  <body>
  <?php include("./php/main.php"); ?>
  <div id='filtre'><img id="croix" onclick='closeFiltre(this.parentNode);' src="./images/croix_fermeture.png" alt="Fermer"></div>
  <div id="contenu">
    <?php
    $pages = array('accueil', 'actu', 'ajout_photo', 'album', 'albums', 'bde', 'bds', 'contact', 'deconnexion', 'espace_VIP', 'ignare');
    if (!(isset($_GET['id']) and in_array($_GET['id'], $pages))) {
      include("./php/accueil.php");
      ?>
  </div>
      <?php
    }
    else {
      ?>
  </div>
      <script type="text/javascript">
        goToPHP("./php/<?php echo $_GET['id']; ?>.php", data="<?php echo http_build_query($_GET); ?>");
      </script>
      <?php
    }?>
  <?php include("./php/sponsors.php"); ?>
  <div id="scripts"></div>
  <script type="text/javascript">new Draggable(document.getElementById('menu'));</script>
</body>
</html>
