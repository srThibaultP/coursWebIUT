/**
 * @Author: Thibault PECH
 * @Date:   2022-02-02 08:52:59
 * @Last Modified by:   Thibault PECH
 * @Last Modified time: 2022-02-02 10:09:02
 */
var numCartes = [1, 1, 2, 2, 3, 3, 4, 4];
var etatsCartes = [0, 0, 0, 0, 0, 0, 0, 0];
var cartesTrouve = []; // Etat de la carte

var selectionCarte = document.getElementById("memory").getElementsByTagName("img");
for (var i = 0; i < selectionCarte.length; i++) {
    selectionCarte[i].numCarte = i;
    selectionCarte[i].onclick = function () {
        //Position dans le tableau
        enJeux(this.numCarte);
        console.log(cartesTrouve.length)
    }
}

shuffle();  // L'array numCartes à changé de position
//----------------------------------------------------------------------------------------------------------------------
// Permet de mélanger les cartes
function shuffle() {
    var j, x, k;
    for (k = numCartes.length - 1; k >= 1; k--) {
        j = Math.floor(Math.random() * (k + 1));
        x = numCartes[k];
        numCartes[k] = numCartes[j];
        numCartes[j] = x;
    }
}

// Permet de changer l'état des cartes
function etatCartes(numCarte) {
    switch (etatsCartes[numCarte]) {
        case 0:
            //Position de base
            selectionCarte[numCarte].src = "img/Point_d_interrogation.jpg";
            break;
        case 1:
            //Afficher la carte
            selectionCarte[numCarte].src = "img/" + numCartes[numCarte] + ".png";
            break;
        case -1:
            //Cacher la carte
            selectionCarte[numCarte].style.visibility = "hidden";
            break;
    }
}

// Fontion principale
function enJeux(numCarte) {
    //Si on a cliqué que sur une carte
    if (cartesTrouve.length < 2) {
        //Pas encore cliqué
        if (etatsCartes[numCarte] == 0) {
            etatsCartes[numCarte] = 1;
            cartesTrouve.push(numCarte);
            etatCartes(numCarte);
        } else {
            console.log("Carte déjà cliquée");
        }
        //Si on clique sur deux cartes
        if (cartesTrouve.length == 2) {
            var nvEtat = 0;
            if (numCartes[cartesTrouve[0]] == numCartes[cartesTrouve[1]]) {
                nvEtat = -1;
                console.log("Carte identique");
            } else {
                console.log("Carte non identique");
            }
            etatsCartes[cartesTrouve[0]] = nvEtat;
            etatsCartes[cartesTrouve[1]] = nvEtat;

            setTimeout(function () {
                etatCartes(cartesTrouve[0]);
                etatCartes(cartesTrouve[1]);
                // Vider le tableau
                cartesTrouve.length = 0;
            }, 500);
        }
    }
}