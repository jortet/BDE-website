<?php if (!isset($_SESSION)) {session_start();} ?>
<?php include("redirect.php"); ?>
<?php
function scan_dir($dir) {
    $ignored = array('.', '..', '.svn', '.htaccess');

    $files = array();
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored)) continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    $files = array_keys($files);

    return ($files) ? $files : false;
}

function is_photo($filename, $extensions = array("jpg", "jpeg", "png", "gif")) {
  foreach ($extensions as $extension) {
    $pattern = "/.".$extension."$/";
    if (preg_match($pattern, strtolower($filename))) {
      return true;
    }
  }
  return false;
}

function is_video($filename) {
  return is_photo($filename, array("avi", "mp4"));
}


chdir($_SESSION['realpath']);

if (!isset($_POST['album'])) {
  print_r($_POST);
  include("album.php");
  exit();
}

?>

<h1>Albums photo</h1>
<?php
  //test si l'utilisateur est connecté
  if (!(isset($_SESSION['ENSG']) AND $_SESSION['ENSG'])) {
    $liste_photos = [];
    echo "<div id=liste_photos hidden>". json_encode($liste_photos) ."</div>
    ";
    die("<p>Vous devez être connecté pour accéder au contenu</p>");
  }
  else {
    ?>
    <div id="loader" style="position : fixed;display: flex;justify-content: center;align-items: center;z-index: 9999;background-color: rgba(100,100,100,0.7);top : 0px;left : 0px;height : 100%;width : 100%;">
     <img src="./images/Eclipse.svg" alt="Loading..." style="display: flex;justify-content: center;align-items: center;">
    </div>
    <?php
    $dir = opendir("./images/albums/");
    $album_found = false;
    // recherche du dossier en appel
    while (false !== ($dossier = readdir($dir))) {
      if (!is_dir($dossier)) {
        if ($dossier == $_POST['album']) {
          $dir_path = "./images/albums/".$_POST['album']."/";
          $dir = opendir($dir_path);
          $album_found = true;
          break;
        }
      }
    }
    if (!$album_found) {
      ?>
      <script type="text/javascript">
        removeLoader();
        var div_photos = document.getElementsByClassName('div_photos');
        for (var i=0; i<div_photos.length; i++) {
          div_photos[i].setAttribute('height', div_photos[i].clientHeight);
          div_photos[i].style.height = '0px';
          var photos = div_photos[i].getElementsByClassName('photos_album');
          for (var j=0; j<photos.length; j++) {
            photos[j].style.width = '0%';
          }
        }
      </script>
      <?php
      die("<div style='display:flex;margin:50px;font-size:1.3em;color:rgb(200,10,20);cursor:auto;'> Aucune photo disponible dans cet album</div>
      <i onclick=goToPHP('./php/albums.php') style=\"display:flex;justify-content:flex-end;align-self:flex-end;margin:10px;font-size:0.9em;cursor:pointer;\"><< Revenir aux albums</i>");
    }
    $photos = [];
    while (($dossier = readdir($dir)) /*&& $dossier !== "WEI"*/){
      if ($dossier == "SUGGESTED") {
        if (!($_SESSION['type'] == "admin")) {
          continue;
        }
      }
      if (!is_dir($dossier)){
        echo "<div class=\"album_photo\">
        <button id=\"$dossier\" class=\"titre_album_photo\" style:\"z-index:1;\">".preg_replace("#_#", " ", $dossier)."</button>
        ";
        $dir_album_path = $dir_path.$dossier."/";
        $photos= scan_dir($dir_album_path);
        if (file_exists('./docs/'.$dossier.'.mp4')) {
          echo "
          <div class='video_album' style='display:flex;position:relative;flex-direction:column;width:100%;margin-bottom:30px;'>
            <video src='./docs/$dossier.mp4' width='80%' , height='auto', style='position:relative;z-index:inherit;margin: 50px;' controls>
              Pas de vidéo.
            </video>
            <div style=\"display:flex;flex-direction:row;justify-content:space-around;align-items:space-around;width:100%\">
              <a href='./docs/$dossier.mp4' download=\"$dossier\" style=\"display:flex;justify-content:center;margin-right:10px;\">Télécharger la vidéo</a>
              <a href='./docs/$dossier.zip' download=\"$dossier\" style=\"display:flex;justify-content:center;\">Télécharger toutes les photos</a>
            </div>
          </div>
          ";
        }
        elseif (file_exists('./docs/'.$dossier.'.avi')) {
          echo "
          <div class='video_album' style='display:flex;position:relative;flex-direction:column;width:100%;margin-bottom:30px;'>
            <video src='./docs/$dossier.avi' width='80%' , height='auto', style='position:relative;z-index:inherit;margin: 50px;' controls>
              Pas de vidéo.
            </video>
            <div style=\"display:flex;flex-direction:row;justify-content:space-around;align-items:space-around;width:100%\">
              <a href='./docs/$dossier.avi' download=\"$dossier\" style=\"display:flex;justify-content:center;margin-right:10px;\">Télécharger la vidéo</a>
              <a href='./docs/$dossier.zip' download=\"$dossier\" style=\"display:flex;justify-content:center;\">Télécharger toutes les photos</a>
            </div>
          </div>
          ";
        }
        else {
          echo "
          <div class='video_album' style='height:0;style='display:flex;position:relative;flex-direction:column;width:100%;margin-bottom:30px;'>
            <div style=\"display:flex;flex-direction:row;justify-content:space-around;align-items:space-around;width:100%\">
              <a href='./docs/$dossier.zip' download=\"$dossier\" style=\"display:flex;justify-content:center;\">Télécharger toutes les photos</a>
          </div></div>
          ";
        }
        echo "<div id=\"div_photos_$dossier\" class=\"div_photos\" style=\"display:none\">
        ";
        $liste_photos[$dossier] = [];
        if ($photos == []) {
          $photos = ['none.jpg'];
        }
        foreach ($photos as $photo){
          $img_path = $dir_album_path.$photo;
          if (preg_match("/mini_/", $photo) && is_photo($photo)) {
            $large_img = substr($photo,5); // sans le mini_
            echo "<img class=\"photos_album\" alt='' src='$img_path' name=$large_img >
            ";
            $liste_photos[$dossier][] = substr($photo,5);
          }
          else if (is_video($photo)) {
            echo "<video src='$img_path' width='40%' , height='auto', style='position:relative;z-index:inherit;margin:5%;' controls>
              Vidéo indisponible.
            </video>";
          }
        }
        echo "</div>
        </div>
        ";
        echo "<div id=liste_photos hidden>". json_encode($liste_photos) ."</div>
              <div id=categorie_album hidden>" . $_POST['album'] . "</div>
        ";
      }
    }
    $dir.closedir();
  }
  ?>
<i onclick="goToPHP('./php/albums.php')" style="display:flex;justify-content:flex-end;align-self:flex-end;margin:10px;font-size:0.9em;cursor:pointer;"><< Revenir aux albums</i>
</div>
<div id="diapo">
  <div id="photos_diapo">
    <img id="photo_diapo" src=./images/Eclipse.svg alt="raté">
  </div>
  <img id="diapo_gauche" src="./images/Arrowleft.png" alt="<">
  <img id="diapo_droit" src="./images/Arrowright.png" alt=">">
  <a id="download" class="icones" href="./images/logo_bde.png" download="logo_bde.png"><img src="./images/download.png" title="Télécharger l'image" alt="Télécharger"></a>
  <span onclick=goToPHP("./php/ajout_photo.php") ><img id="add" class="icones" src="./images/add.png" title="Ajouter une photo à l'album" alt="Ajouter une photo"></span>
  <p id=titre_album>ALbum photo</p>
  <img id=croix_fermeture class="icones" src="./images/croix_fermeture.png" alt="X fermer" title="Fermer le diapo" onclick="fermerDiapo()">
</div>
<script src='./js/main.js'></script>
<script src='./js/albums.js'></script>
