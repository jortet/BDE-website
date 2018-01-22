<footer>
    <ul id="sponsors">
      <li><a target="_blank" href=http://www.ign.fr/><img alt=ign src="./images/ign.png"></a></li>
      <!-- <li><a target="_blank"><img alt=sponsor2 src="./images/sponsor3.png"></a></li> -->
    </ul>
    <div id="partenaires">
      <a href="http://ensg.eu" target="_blank">Site de l'ENSG géomatique</a>
    </ul>
    <div id="compteur">
      <?php
        $compteur_f = fopen('compteur_visites.txt', 'a+');
        $compte = fgets($compteur_f);
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte ++;
        file_put_contents('compteur_visites.txt', $compte, LOCK_EX);
}

fclose($compteur_f);?>
    </div>
</footer>
