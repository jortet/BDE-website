<footer>
    <ul id="sponsors">
      <li>
        <a target="_blank" href=http://www.ign.fr/><img alt=IGN src="./images/ign.png"></a>
        <center><a href="http://vertigeo.ensg.eu/" target="_blank">Site de l'IGN</a></center>
      </li>
  	  <li >
        <center id="infosensg"><p>ENSG<br>
          6-8 Avenue Blaise Pascal<br>
          Cité Descartes<br>
          Champs-sur-Marne<br>
          77455 Marne la Vallée<br>
          CEDEX 2</p>
        </center>
      </li>
      <li>
        <a target="_blank" href=http://www.ensg.eu/><img src="./images/ensg.png" alt="ENSG"></a>
        <center><a href="http://ensg.eu/" target="_blank">Site de l'ENSG</a></center>
      </li>

      <!-- <li><a target="_blank"><img alt=sponsor2 src="./images/sponsor3.png"></a></li> -->
    </ul>
		<center>
      <p>Pour toute question, contactez le BDE : <i style="color:blue;">bde@ensg.eu</i><p>
    </center>




    <div id="partenaires">
      <a href="http://www.vertigeo.ensg.eu/" target="_blank" style="color:white;">Site de Vertigeo, junior-entreprise de l'école</a>
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
