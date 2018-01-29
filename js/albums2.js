var albums = this.parentNode.getElementsByClassName('div_photos');
var filtre = document.getElementById("filtre");
var diapo = document.getElementById("diapo");
var titre_album = document.getElementById("titre_album");
var fermer_diapo = document.getElementById("fermer_diapo");
var photo_diapo = document.getElementById("photo_diapo");
var telechargement = document.getElementById("telechargement");
var bouton_gauche = document.getElementById("diapo_gauche");
var bouton_droit = document.getElementById("diapo_droit");
var numero = 1;

for (var i = 0, c = albums.length; i < c; i++) {
  var photos = albums.getElementsByClassName("photos_album");
  for (var j=0; j<photos.length; j++)
    photos[j].onclick = function() {
      var nom_album = this.parentNode.textContent
      var chemin = "../images/albums/"+nom_album+"/1.jpg";
      photo_diapo.setAttribute("src", chemin);
      diapo.setAttribute("style", "transition:.5s;opacity:1;z-index:25;");
      diapo.setAttribute("name", nom_album);
      diapo.setAttribute("nbphoto", nb_photo);
      titre_album.innerHTML = nom_album;
      filtre.setAttribute("style", "transition:.5s;position:absolute;width:142.8%;height:110%;z-index:20;opacity:.85;background-color:black;");
  };
}

function affiche(i) {
  var nb_photo = diapo.getAttribute("nbphoto")
  if (i < 1) {
    i = nb_photo;
  }
  if (i > nb_photo) {
    i = 1;
  }
  var nom_album = diapo.getAttribute("name");
  var chemin = "../images/albums/"+nom_album+"/"+i+".JPG";
  photo_diapo.setAttribute("src", chemin);
  telechargement.setAttribute("href", chemin);
  telechargement.setAttribute("download", i+".jpg");
  numero = i;

}
bouton_droit.onclick = function() {
  affiche(numero+1);
}
bouton_gauche.onclick = function() {
  affiche(numero-1);
}
fermer_diapo.onclick = function() {
  filtre.setAttribute("style", "transition:.5s;opacity:0;z-index:-1");
  diapo.setAttribute("style", "transition:.5s,opacity:0;z-index:-1");
  numero = 1;
};

photo_diapo.ondblclick = function() {
  this.setAttribute("style", "max-width:1000%;max-height:1000%;transition:.3s;")
}
