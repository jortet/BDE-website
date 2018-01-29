var contenuBDStoShow = document.getElementsByClassName("contenuBDS_toshow");
var contenuBDS = document.getElementsByClassName("contenuBDS");

for (var i = 0; i < contenuBDS.length; i++) {
  contenuBDStoShow[i].innerHTML = contenuBDS[i].innerHTML
}


function openBureau(name) {
  var content = document.getElementById(name);
  var button_content = document.getElementById("bouton_"+name);
  content.style.visibility = "visible";
  content.style.opacity = 1;
  content.style.maxHeight = "1000px";

  button_content.setAttribute("onclick", "close"+button_content.getAttribute("onclick").substr(4))
}

function closeBureau(name) {
  var content = document.getElementById(name);
  var button_content = document.getElementById("bouton_"+name);
  content.style.visibility = "hidden";
  content.style.opacity = 0;
  content.style.maxHeight = "0px";

  button_content.setAttribute("onclick", "open"+button_content.getAttribute("onclick").substr(5))

}
