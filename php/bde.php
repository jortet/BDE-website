<?php if (!isset($_SESSION)) {session_start();} ?>
<?php include("redirect.php"); ?>
<?php
$liste_albums = array("vikign" => "BDE VikIGN 2017 - 2018");
foreach ($liste_albums as $key => $album) {
  ?>
  <button id="<?php echo "bouton_".$key ?>" class="selection_album" name="album" type="submit" onclick=openBureau('<?php echo $key ?>'); ><?php echo $album ?></button>
  <div id='<?php echo $key ?>' class="contenuBDE_toshow">

  </div>
    <?php
}
?>
<div id="vikign_content" class="contenuBDE">
  <h1> BDE VikIGN 2017 - 2018</h1>
  <h1>Le mot du bureau</h1>
        <p>Les chefs VikIGN qui, depuis de nombreux mois, sont à la tête du BDE de l’ENSG, ont formé une équipe surmotivée.</p>
        <p>Certes, vous avez été, vous êtes, submergés par les épreuves écrites et orales des concours.
        Mais le dernier mot est-il dit ? L'espérance doit-elle disparaître ? La souffrance est-elle définitive ? Non !<br><br><br>Croyez-nous, nous qui vous parlons en connaissance de cause et vous disons que rien n'est perdu pour l’avenir. Les mêmes moyens qui vous ont torturés peuvent faire venir un jour la victoire.
        Car vous n'êtes pas seuls ! Vous n'êtes pas seuls ! Tu n'es pas seul(e) ! Vous avez un vaste soutien derrière vous et un grand avenir à l'ENSG devant vous.<br><br><br>Cette école n'est pas limitée à la programmation informatique ou la connaissance des capitales d'Europe.
        Cette école tire le meilleur des sciences dures et des sciences humaines.
        Cette école est une opportunité unique.
        Toutes les cartes, tous les GPS, tous les tachéo, sont aujourd'hui, dans l'univers, tous les moyens nécessaires pour mieux comprendre, gérer et protéger le territoire. Foudroyés aujourd'hui par les nouvelles technologies, nous pourrons vaincre dans l'avenir par des technologies supérieures encore.
        Votre destin est là.<br><br><br>Nous, BDE VikIGN de l'ENSG, actuellement à Marne-la-Vallée, nous invitons les valeureux guerriers et les valeureuses guerrières qui veulent intégrer la seule école d'ingénieurs en géomatique d'Europe, ou qui viendraient à le vouloir, avec leurs compétences et leur motivation, nous invitons les courageux et les courageuses qui veulent intégrer une école d'ingénieurs à taille humaine, ou qui viendraient à le vouloir, avec leurs et leur, nous invitons, les copains et les taupins, les fêtards et les lèves-tôt, les Nordistes et les Sudistes, les Bretons et les Alsaciens, les siméons et les siméonnes, les bronzés et les skis, les écureuils et les petits chats, Blanche-neige et les 7 nains, le rouge et le noir, le bien et le mal, toi + moi à se mettre en rapport avec nous.<br><br><br>Quoi qu'il arrive, la flamme de la géomatique ne doit pas s'éteindre et ne s'éteindra pas.<br><br>Demain, comme aujourd'hui, nous vous attendons à l'école pour une année des plus folles.</p>
  <h1>Organigramme</h1>
  <br/><br/>
  <h3> Bureau</h3>
  <div id="bureau" class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/prez.jpg" alt="prez"></div>
      <div class ="prenom">Martin</div>
      <div class ="texte">Prez bien-aimé</div>
      <div class ="texte">Tel Jerry entouré de ses Totally Spies, le prez, Martin Barbier, barbare barbu, barrera la route à qui cherchera à le détrôner</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/viceprez.jpg" alt="vprez"></div>
      <div class ="prenom">Louise</div>
      <div class ="texte">Vice-Prez</div>
      <div class ="texte">VikIGN bretonne, Louise est comme les crêpes aux sarrasins sans bosse : complète. Elle n’a pas froid aux yeux et son regard de braise (de charbon de bois sur un BBQ) saura mettre un peu de chaleur, au fond de vos cœurs. Mais ne la tentez pas : quand elle rentre à 20h, elle rentre à VINgt heure</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/trez.jpg" alt="trez"></div>
      <div class ="prenom">Marion</div>
      <div class ="texte">Trez</div>
      <div class ="texte">Parce qu’elle a une chanson éponyme.<br>Parce qu’elle aime le liquide (au bar et à la caisse).<br>Parce que sa bien belle Xantia s’appelle Gilbert.<br>Parce qu’elle s’appelle Marion et c’est cool.<br>Parce que vendredi, c’est pas de kiki.<br>Parce que sur la tête (alouette).<br>Parce que Shakira.<br>Parce que.</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/secrétaire.jpg" alt= "secrétaire"></div>
      <div class ="prenom">Juliette</div>
      <div class ="texte">Secrétaire</div>
      <div class ="texte">Bien qu’elle vienne d’Alsace, Juliette adore les jeux de Meaux. Elle a toujours une ou deux bonnes idées sous le coude pour venir à la rescousse quand ses amis vont vers le naufrage . Elle a une passion pour les fruits et légumes qui commencent par B (comme les bananes ou les brocolis)</div>
    </div>
  </div>

  <h3>Respo web</h3>
  <div class = "organigramme">
    <div class = "membre">
      <div class = "photo"><img src="./images/benoit.jpg" alt="Benoit"></div>
      <div class="prenom">Benoit</div>
      <div class="texte">L'Unique</div>
    </div>
    <div class = "membre">
      <div class = "photo"><img src="./images/matthieu.jpg" alt="Matthieu"></div>
      <div class="prenom">Matthieu</div>
      <div class="texte">Boire ou coder il faut choisir...</div>
    </div>
  </div>




  <h3>Respo WEI</h3>
  <div class = "organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/Tenastroppris.png" alt="Simeon"></div>
      <div class ="prenom">Siméon</div>
      <div class ="texte">Tractopelle, tractopelle, moi je suis un tractopelle. Ce que j’aime par dessus tout c’est ramasser des cailloux</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/louiseg.jpg" alt="Louise"></div>
      <div class ="prenom">Louise</div>
      <div class ="texte">Petite Louise, je parle de toi, parce qu'avec ta petite voix, tes petites idées, tu as versé sur mon WEI des litres de bières</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/alexandre.jpg" alt= "Alexandre"></div>
      <div class ="prenom">Alexandre</div>
      <div class ="texte">« Nom de Dieu de bon Dieu, l’temps s’abernaudit, les poules s’accroupionnent ». Alex vous convie à son WEI</div>
    </div>
  </div>

  <h3>Respo WEE</h3>
  <div class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/guillemette.jpg" alt="Guillemette"></div>
      <div class ="prenom">Guillemette</div>
      <div class ="texte">Eh oui, une VikIGN de Méditerranée, toujours bronzée ! Guillemette apporte autant de fraicheur à l’équipe que la rosée du matin (ou le rosé de l’apéro). Ne vous fiez pas à ses airs de petite chose fragile : elle n’a pas son pareil pour construire des ponts avec nos partenaires</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/armand.jpg" alt="Armand"></div>
      <div class ="prenom">Armand</div>
      <div class ="texte">Armand n’a pas besoin de vous emmener sur Mars pour avoir la tête dans les étoiles. Un Week-End en Europe devrait suffire à vous en mettre plein la vue</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/valentine.jpg" alt="Valentine"></div>
      <div class ="prenom">Valentine</div>
      <div class ="texte">Jeune géomètre sensible et réservée recherche pays attractif et au climat doux pour un Week-End Europe romantique</div>
    </div>
  </div>


  <h3>Respo Gala</h3>
  <div class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/maud.jpg" alt="Maud"></div>
      <div class ="prenom">Maud</div>
      <div class ="texte">Nageuse synchronisée émérite, elle fait de jolis ploufs dans la baignoire. C’est pourquoi elle est la mieux placée pour faire du Gala une soirée élégante et inoubliable</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/robin.jpg" alt= "Robin"></div>
      <div class ="prenom">Robin</div>
      <div class ="texte">Passionné par les autoroutes et l’Auvergne, Robin sera vous guider vers la soirée la plus huppée de l’année</div>
    </div>
  </div>

  <h3>Respo Bar</h3>
  <div class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/pierre.jpg" alt="Pierre"></div>
      <div class ="prenom">Pierre</div>
      <div class ="texte">Pierre est gentil et sensible des fesses. Qui veut de lui ?</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/jacques.jpg" alt="Jacques"></div>
      <div class ="prenom">Jacques</div>
      <div class ="texte">Jacquouille a dit : « Merci la gueuse. Tu es un laideron mais tu es bien bonne »</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/lucas.jpg" alt= "Lucas"></div>
      <div class ="prenom">Lucas</div>
      <div class ="texte">Petit petit ours brun, c’est un gentil galopin, copain câlin, petit ours brun</div>
    </div>
  </div>

  <h3>Respo IGNare</h3>
  <div class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/marionB.jpg" alt="Marion B"></div>
      <div class ="prenom">Marion</div>
      <div class ="texte">Espiègle, armée de son plus beau lipstick, Brunette mène à merveille la propagande VikIGN. Atout choc et charme de l’équipe, elle est B/L B/L B/L comme le jour…En plus elle s’appelle Marion, donc c’est cool
  </div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/emmanuel.png" alt="Emmanuel"></div>
      <div class ="prenom">Emmanuel</div>
      <div class ="texte">Manu dormit bien cette nuit car Manu rêva. Vous avez ri ? Il va vous le faire payer car Manu-facture</div>
    </div>
  </div>

  <h3>Respo Musique</h3>
  <div class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/tristan.jpg" alt="Tristan"></div>
      <div class ="prenom">Tristan</div>
      <div class ="texte">Serviable, aimable et gentil, DJ Swag vous fera tomber la chemise</div>
    </div>
    <div class = "membre">
      <div class ="photo"><img src="./images/martin.jpg" alt="Martin"></div>
      <div class ="prenom">Martin</div>
      <div class ="texte">Avec sa guitare, Martin animera vos soirées, mariages, baptêmes, bar mitzvah et surtout enterrements, et tout ça gratuitement</div>
    </div>
  </div>

  <h3>Respo Ciné Klub</h3>
  <div class="organigramme">
    <div class = "membre">
      <div class ="photo"><img src="./images/victor.jpg" alt="Victor"></div>
      <div class ="prenom">Victor</div>
      <div class ="texte">Prenez la pose, Victor et son appareil photo ne sont jamais très loin et feront de vous la prochaine star de son film</div>
    </div>
  </div>
</div>
