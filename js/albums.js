function removeLoader() {
  var loader = document.getElementById("loader");
  loader.innerHTML = "";
  loader.style.zIndex = "-9999";
  loader.style.backgroundColor = "rgba(0,0,0,0)";
}

// start : récupération de la taille des div photos
var div_photos = document.getElementsByClassName('div_photos');
var photos = document.getElementsByClassName('photos_album');
for (var i=0; i<div_photos.length; i++) {
  div_photos[i].style.opacity = '0';
  div_photos[i].style.display = 'flex';
  for (var j=0; j<photos.length; j++) {
    photos[j].style.width = '18%';
    photos[j].style.height = 'auto';
    photos[j].style.marginLeft = '1%';
    photos[j].style.marginRight = '1%';
    photos[j].style.marginTop = '20px';
    photos[j].style.marginBottom = '20px';
  }

};
removeLoader();
var div_photos = document.getElementsByClassName('div_photos');
var videos = document.getElementsByClassName('video_album');
for (var i=0; i<videos.length; i++) {
  videos[i].style.display = 'none';
};
for (var i=0; i<div_photos.length; i++) {
  div_photos[i].setAttribute('height', Math.max(500, div_photos[i].clientHeight));
  div_photos[i].style.height = '0px';
  var photos = div_photos[i].getElementsByClassName('photos_album');
  for (var j=0; j<photos.length; j++) {
    photos[j].style.width = '0%';
    photos[j].style.margin = '0%';
  }
}

  // Fonction onclick sur le titre
  var titres = document.getElementsByClassName('titre_album_photo');
for (var i=0; i<titres.length; i++) {
  titres[i].onclick = async function () {
    var container = this.parentNode;
    var album = container.getElementsByClassName('div_photos')[0];
    var photos_album = container.getElementsByClassName('photos_album');
    var video = container.getElementsByClassName('video_album')[0];
    // si la div n'est pas la : appartition
    if (album.style.height === '0px'){
      video.style.transition = '.5s';
      video.style.display = 'flex';
      for (var k=0; k<photos_album.length; k++) {
        photos_album[k].style.marginLeft = '1%';
        photos_album[k].style.marginRight = '1%';
        photos_album[k].style.marginTop = '20px';
        photos_album[k].style.marginBottom = '20px';
        }
      var height = album.getAttribute('height');
      var variableHeight = 0;
      var time = 500;
      var j = 0;
      for(var i = 0; i<100;i++){
        j += time/100;
        variableHeight = sinus(height, time, j);
        album.style.height = String(variableHeight)+"px";
        album.style.opacity = sinus(1, time, j);
        for (var k=0; k<photos_album.length; k++) {
          photos_album[k].style.width = String(sinus(17, time, j))+'%';
        }
        await sleep(time/200);
      }
      for (var k=0; k<photos_album.length; k++) {
        if (parseFloat(photos_album[k].width) < parseFloat(photos_album[k].height)) {
          photos_album[k].style.width = '11%';
          photos_album[k].style.marginLeft = '3%';
          photos_album[k].style.marginRight = '3%';
          photos_album[k].style.marginTop = '20px';
          photos_album[k].style.marginBottom = '20px';
        }
      }
      // si elle est la  : disparition
    }
    else{
      var height = album.clientHeight;
      var variableHeight = 0;
      var time = 500;
      var j = 0;
      for(var i = 0; i<100;i++){
        j += time/100;
        variableHeight = rev_sinus(height, time, j);
        album.style.height = String(variableHeight)+"px";
        album.style.opacity = rev_sinus(1, time, j);
        for (var k=0; k<photos_album.length; k++) {
          photos_album[k].style.width = String(rev_sinus(17, time, j))+'%';
        }
        await sleep(time/200);
      }
      for (var k=0; k<photos_album.length; k++) {
        photos_album[k].style.margin = '0%';
      }
      video.style.display = 'none';
    }
    // début du chantier
    var diapo = document.getElementById("diapo");
    var titre_album = document.getElementById("titre_album");
    var fermer_diapo = document.getElementById("fermer_diapo");
    var photos_diapo = document.getElementById("photos_diapo");
    var photo_diapo = document.getElementById("photo_diapo");
    var telechargement = document.getElementById("download");
    var bouton_gauche = document.getElementById("diapo_gauche");
    var bouton_droit = document.getElementById("diapo_droit");
    var categorie_album = document.getElementById('categorie_album').innerHTML;
    var liste_photos = JSON.parse(document.getElementById('liste_photos').innerHTML);

    for (var j=0; j<photos_album.length; j++) {
      photos_album[j].onclick = function() {
        var nom_album = album.parentNode.firstElementChild.id;
        var photo_diapo = document.getElementById("photo_diapo");
        var photo_taille_reelle = this.getAttribute("name");
        var chemin = "./images/albums/"+categorie_album+"/"+nom_album+"/"+photo_taille_reelle;
        photo_diapo.setAttribute("src", chemin);
        diapo.setAttribute("style", "z-index:25;transition:.5s;background-color:rgba(0,0,0,.85);");
        diapo.setAttribute("name", nom_album);
        diapo.setAttribute("nbphoto", liste_photos[nom_album].length-1);
        telechargement.href = chemin;
        titre_album.innerHTML = album.parentNode.firstElementChild.innerHTML;
        var numero = -1
        for (var k=0; k<liste_photos[nom_album].length; k++){
          if (liste_photos[nom_album][k] == photo_taille_reelle) {
            numero = k;
          }
        }
        diapo.setAttribute("numero", numero)
        telechargement.download = liste_photos[nom_album][numero];
      }
    };

    async function affiche(i) {
      var nb_photo = diapo.getAttribute("nbphoto");
      if (i < 1) {
        i = nb_photo;
      }
      if (i > nb_photo) {
        i = 1;
      }
      var nom_album = diapo.getAttribute("name");
      var chemin = "./images/albums/"+categorie_album+"/"+nom_album+"/"+liste_photos[nom_album][i];
      photos_diapo.lastElementChild.style.visibility = "hidden";
      photos_diapo.removeChild(photos_diapo.firstElementChild);
      var spinner = photos_diapo.appendChild(document.createElement('img'));
      spinner.src = "./images/Eclipse.svg";
      spinner.id = "loader_photos";
      spinner.style = "position: fixed;z-index: 9999;top: 40%;left: 45%;width: 10%;height: auto";
      var new_img = document.createElement('img');
      new_img.src = chemin;
      new_img.alt = "Image manquante";
      new_img.id = "photo_diapo";
      while (!new_img.complete) {
        await sleep(100);
      }
      photos_diapo.removeChild(photos_diapo.lastElementChild);
      var new_img = photos_diapo.appendChild(new_img);
      new_img.style.visibility = "visible";
      new_img.style.opacity = 1;
      new_img.style.height = 'auto';
      telechargement.href = chemin;
      telechargement.download = liste_photos[nom_album][i];
      diapo.setAttribute("numero", i);

    }
    bouton_droit.onclick = function() {
      photo_diapo.src = "./images/Eclipse.svg"
      affiche(parseInt(diapo.getAttribute("numero"))+1);
    }
    bouton_gauche.onclick = function() {
      photo_diapo.src = "./images/Eclipse.svg"
      affiche(parseInt(diapo.getAttribute("numero"))-1);
    }
/*
  photo_diapo.ondblclick = function() {
    this.setAttribute("style", "max-width:100%;max-height:100%;transition:.3s;")
  }*/
  }
};
// functions auxiliaires
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
function sinus(Xm, f, t) {
  return Xm*(1+Math.sin(Math.PI*t/f-Math.PI/2))/2
}
function rev_sinus(Xm, f, t) {
  return Xm*(1+Math.sin(-Math.PI*t/f+Math.PI/2))/2
}

function fermerDiapo() {
  diapo.style.opacity = 0;
  diapo.style.visibility = "hidden";
  console.log('hello');
  diapo.getElementById('photo_diapo').style.visibility = "inherit";
}
