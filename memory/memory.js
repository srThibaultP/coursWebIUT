/**
 * @Author: Thibault PECH
 * @Date:   2022-02-02 08:52:59
 * @Last Modified by:   Thibault PECH
 * @Last Modified time: 2022-02-02 11:32:41
 */
var numCartes = [1, 1, 2, 2, 3, 3, 4, 4];
var etatsCartes = [0, 0, 0, 0, 0, 0, 0, 0];
var cartesTrouve = []; // Etat de la carte
var nbPaires = 0;
var clicks = 0;
var nbReset = 0;


var date = new Date;
var connection = date.getTime();

var hr = 0;
var min = 0;
var sec = 0;
var demarrage = true;

const timer = document.getElementById('timer');
var selectionCarte = document.getElementById("memory").getElementsByTagName("img");
for (var i = 0; i < selectionCarte.length; i++) {
    selectionCarte[i].numCarte = i;
    selectionCarte[i].onclick = function () {
        //Position dans le tableau
        enJeu(this.numCarte);
        console.log(cartesTrouve.length)
    }
}

//shuffle();  // L'array numCartes à changé de position
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
function enJeu(numCarte) {
    //Si on a cliqué que sur une carte
    departTimer();
    clicks++;
    if (cartesTrouve.length < 2) {
        //Pas encore cliqué
        if (etatsCartes[numCarte] == 0) {
            etatsCartes[numCarte] = 1;
            cartesTrouve.push(numCarte);
            etatCartes(numCarte);
        } else {
            console.log("Carte déjà cliquée");
            clicks--;
        }
        //Si on clique sur deux cartes
        if (cartesTrouve.length == 2) {
            var nvEtat = 0;
            if (numCartes[cartesTrouve[0]] == numCartes[cartesTrouve[1]]) {
                nvEtat = -1;
                nbPaires++;
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
                document.getElementById('paires').innerHTML = nbPaires;
                if (nbPaires == 4) {
                    finTimer();
                    alert("gg");
                    document.getElementById("btn").style.display = "block";
                }
            }, 500);
        }
    }
    document.getElementById('clicks').innerHTML = clicks;
}

function rejouer() {
    shuffle();
    for (var i = 0; i < selectionCarte.length; i++) {
        selectionCarte[i].src = "img/Point_d_interrogation.jpg";
        selectionCarte[i].style.visibility = "visible";
    }
    etatsCartes = [0, 0, 0, 0, 0, 0, 0, 0];
    nbPaires = 0;
    resetTimer();
}

function departTimer() {
    if (demarrage == true) {
        demarrage = false;
        rouagesTimer();
    }
}
function finTimer() {
    if (demarrage == false) demarrage = true;
}

function rouagesTimer() {
    if (demarrage == false) {
        sec = parseInt(sec);
        min = parseInt(min);
        hr = parseInt(hr);

        sec++;

        if (sec == 60) {
            min++;
            sec = 0;
        }
        if (min == 60) {
            hr++;
            min = 0;
            sec = 0;
        }

        if (sec < 10 || sec == 0) {
            sec = '0' + sec;
        }
        if (min < 10 || min == 0) {
            min = '0' + min;
        }
        if (hr < 10 || hr == 0) {
            hr = '0' + hr;
        }

        timer.innerHTML = hr + ':' + min + ':' + sec;

        setTimeout("rouagesTimer()", 1000);
    }
}

function resetTimer() {
    timer.innerHTML = "00:00:00";
    stoptime = true;
    hr = 0;
    sec = 0;
    min = 0;
}