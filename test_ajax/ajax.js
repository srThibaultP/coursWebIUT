function loadXMLDoc() {
    var yourSelect = document.getElementById("actorid");
    alert(yourSelect.selectedOptions[0].value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("films").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", "films.ajx.php", true);
    xhttp.send();
}