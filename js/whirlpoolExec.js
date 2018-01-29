var sent = document.getElementById("bouton_connexion");
var mdp = document.getElementById("password");
sent.onclick  = async function() {
    mdp.value = dohash(mdp.value);
}
function dohash(instr) {
  var hashstr = HexWhirlpool(instr);
  var outstr = "";
  hashstr = hashstr.split('');
  for(var i=0; i<hashstr.length; i++) {
    if(i % 64 == 0 && i > 0) outstr += '\n';
      outstr += hashstr[i];
    }
  hashstr = hashstr.join();
  outstr = outstr.toLowerCase();
  return outstr;
}
