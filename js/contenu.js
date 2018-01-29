function Ajax(callback, file, data="", action="POST") {
  /*
  Requete AJAX pour ouvrir le fichier sélectionné. Prend en paramètrre :
   * function callback, exécuté avec le paramètre responsetext une fois la requete AJAX effectué correctement
   * file, fichier de destination de la requete
   * data, donnée sen voyé avec la requête (optionnel)
 */

  var ajax = new XMLHttpRequest();
  ajax.open(action, file, true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  ajax.addEventListener('readystatechange', function(e) {

    // test du statut de retour de la requête AJAX
    if (ajax.readyState == 4 && (ajax.status == 200 || ajax.status == 0)) {
        // récupération du contenu du fichier et envoi de la fonction de callback
        callback(ajax.responseText);

    }
  });
  console.log(data, action);
  ajax.send(data);
}

function sleep(ms) {
  /*
  Temporisation de la durée souhaité (ms).
  Correctif de 4ms correspondant approximativement au temps d'éxécution propre
  */

  return new Promise(resolve => setTimeout(resolve, Math.max(1, ms-4)));
}

/*

*/

window.onpopstate = function () {
  /* Rechargement de la page lors de la navigation avec l'historique */
  window.location.reload();
}

function connect(){
  var filtre = document.getElementById('filtre');
  filtre.style.zIndex = 1000;
  filtre.style.opacity = 1;

}

function closeFiltre(filtre) {
  filtre.style.opacity = 0;
  filtre.style.zIndex = -1;
}

function addScript(name) {
  name = "./js/"+name+".js";
  if (isScript(name)) {
    removeScript(name);
  }
  script = document.createElement('script');
  script.src = name;
  script.setAttribute('expsrc', name);
  document.getElementById('scripts').appendChild(script);
}

function isScript(name) {
  scripts = document.getElementById('scripts').getElementsByTagName('script');
  for (var i=0; i < scripts.length; i++) {
    script = scripts[i];
    if (script.getAttribute('expsrc') == name) {
      return true;
    }
  }
  return false;
}

function removeScript(name) {
  scripts = document.getElementById('scripts').getElementsByTagName('script');
  for (var i=0; i < scripts.length; i++) {
    script = scripts[i];
    if (script.getAttribute('expsrc') == name) {
      document.getElementById('scripts').removeChild(script);
    }
  }
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function chargerPage (new_url, page="Accueil")
{
  // Actualisation de l'URL:
  history.pushState({ path: this.path}, '', new_url);
  // Actualisation du titre
  document.getElementsByTagName('title')[0].innerHTML = "BDE VikIGN - " + page;
}

function goTop(to=0) {
  window.scroll({top:to,left:0,behavior:'smooth'});
}

function goToPHP(path, data, action, explicite_path) {
  explicite_path = explicite_path || path.replace("./php/", "").replace(".php", "");
  data = data || "";
  action = action || 'POST';
  page = capitalizeFirstLetter(explicite_path);
  function replaceContent(response) {
    goTop(document.getElementsByTagName('header')[0].offsetHeight-document.getElementById('menu').offsetHeight);
    document.getElementById('contenu').innerHTML = response;
    if (data == "") {
      chargerPage("?id="+explicite_path, page);
    }
    else if (data.includes("id=")) {
      chargerPage("?"+data, page);
    }
    else {
      chargerPage("?id="+explicite_path+"&"+data, page);
    }
    addScript(explicite_path);
  }
  Ajax(replaceContent, path, data, action)
}
