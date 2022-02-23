function loadXMLDoc() {
var url = 'films.ajx.php';
var yourSelect = document.getElementById("actorid");

let request =
    $.ajax({
        type: "POST", 	        //Méthode à employer POST ou GET 
        url: url,  //Cible du script coté serveur à appeler 
        data: {actorid: yourSelect.selectedOptions[0].value},  //Paramètres à envoyer au script coté serveur
        beforeSend: function () {
            //Code à appeler avant l'appel ajax en lui même
        }
    });
request.done(function (output) {
    //Code à jouer en cas d'éxécution sans erreur du script du PHP
    document.getElementById("films").innerHTML = output;
});
request.fail(function (error) {
    //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
    document.getElementById("films").innerHTML = "error";
});
request.always(function () {
    //Code à jouer après done OU fail quoi qu'il arrive
});
}