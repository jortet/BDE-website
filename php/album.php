<?php if (!isset($_SESSION)) {session_start();} ?>
<?php include("redirect.php"); ?>
<h1>Albums photo</h1>
  <?php
  $liste_albums = array("WEI", "WEE", "Gala", "Soirées", "Forcalquier");
  foreach ($liste_albums as $key => $album) {
    ?>
    <button class="selection_album" name="album" type="submit" onclick=goToPHP('./php/albums.php','<?php echo "album=".$album ?>',action='POST')><?php echo $album ?></button>
      <?php
  }
  ?>
<script type="text/javascript" src='./js/main.js'></script>
