var map = L.map('mapid').setView([48.840579, 2.586968], 11);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([48.841080, 2.587400]).addTo(map)
//L.marker([48.840579, 2.586968]).addTo(map)
    .bindPopup("L'ENSG Géomatique")
    .openPopup();
