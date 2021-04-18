var latitudePosition;
var longitudePosition;
var maPosition; /* marqueur de ma position */

function chercherPositionComplete() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(positionTrouvee, erreurPosition, { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 });
    } else {
        alert("Votre navigateur ne supporte pas la géolocalisation !");
    }
}

function afficheMaPosition() {
    /* ma position actuelle */

    var monIcone = L.icon({
        iconUrl: 'marqueur_rouge.png',
        iconAnchor: [16, 32]
    });

    console.log(latitudePosition);
    console.log(longitudePosition);
    maPosition = L.marker([latitudePosition, longitudePosition], { icon: monIcone });
    maPosition.bindPopup("<strong>Je suis ici !</strong>");

    /* Ajouter ma position au cluster et au tableau de marqueurs */
    listeMarqueurs.push(maPosition);
    clusterMarqueurs.addLayer(maPosition);
}

/* Fonction qui permet de récupérer ma position si elle est disponible et si j'ai donné mon consentement */
function positionTrouvee(position) {
    /* informations de base */
    latitudePosition = position.coords.latitude;
    longitudePosition = position.coords.longitude;

    afficheMaPosition();
}

/* Fonction pour gérer les erreurs */
function erreurPosition(erreur) {
    switch (erreur.code) {
        case erreur.PERMISSION_DENIED:
            alert("PERMISSION_DENIED : l'utilisateur n'a pas autorisé l'accès à sa position.");
            break;
        case erreur.POSITION_UNAVAILABLE:
            alert("POSITION_UNAVAILABLE : la position n'a pas pu être déterminée.");
            break;
        case erreur.TIMEOUT:
            alert("TIMEOUT : le service n'a pas répondu à temps.");
            break;
        case erreur.UNKNOWN_ERROR:
            alert("UNKNOWN_ERROR : une erreur inconnue s'est produite");
    }
}

/* Création d'un carte centrée sur la latitude 47.3649° N et longitude E 0.7278° A peu près vers Tours en France*/
var objetCarte = L.map('ma_carte').setView([47.3649, 0.7278], 12);

/* Définir le fond de carte à utiliser */
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Thanks &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(objetCarte);

/* Définition de quelques lieux à placer sur la carte */
var lieux = {
    "Brive": { "lat": 45.1590, "lon": 1.5335, "popup": "V 16 Octobre 2020-Brives la Gaillarde 19 Livraison" },
    "Souston": { "lat": 43.4820, "lon": -1.5594, "popup": "V 06 Novembre 2020 Soustons (40) et Biarritz(64) Livraison" },
};

/* Au travers d'une boucle, je parcoure tous mes éléments */
/* et je crée des marqueurs associés à chacun d'eux */
var listeMarqueurs = [];
var clusterMarqueurs = L.markerClusterGroup();

/* pour chaque lieu, je récupère les données, crée un marqueur et un popup */
for (index in lieux) {
    /* définition du marqueur */
    var marker = L.marker([lieux[index].lat, lieux[index].lon]);
    console.log(lieux[index].lat);
    console.log(lieux[index].lon);
    console.log(marker);
    /* ajout du popup au marqueur */
    marker.bindPopup(lieux[index].popup);
    /* ajout du marqueur au tableau listeMarqueurs */
    listeMarqueurs.push(marker);
    /* ajout du marqueur au cluster */
    clusterMarqueurs.addLayer(marker);
}

var groupe = new L.featureGroup(listeMarqueurs);
console.log(groupe);

/* je recherche la zone limite qui contient tous les éléments du groupe */
var zoneCouverte = groupe.getBounds().pad(0.25);
console.log(zoneCouverte);

/* j'affiche une carte qui dépend de la zone couverte */
objetCarte.fitBounds(zoneCouverte);

/* j'ajoute le cluster à la carte */
objetCarte.addLayer(clusterMarqueurs);