var contenuBDEtoShow = document.getElementsByClassName("contenuBDE_toshow");
var contenuBDE = document.getElementsByClassName("contenuBDE");

for (var i = 0; i < contenuBDE.length; i++) {
  contenuBDEtoShow[i].innerHTML = contenuBDE[i].innerHTML
}


function openBureau(name) {
  var content = document.getElementById(name);
  var button_content = document.getElementById("bouton_"+name);
  content.style.visibility = "visible";
  content.style.opacity = 1;
  content.style.maxHeight = "100000px";

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
