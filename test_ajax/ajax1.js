function loadXMLDoc() {
    var yourSelect = document.getElementById("actorid");
    //alert(yourSelect.selectedOptions[0].value);
    var http = new XMLHttpRequest();
    var url = 'films.ajx.php';
    var params = 'actorid=' + yourSelect.selectedOptions[0].value;
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function () {//Call a function when the state changes.
        if (http.readyState == 4 && http.status == 200) {
            //alert(http.responseText);
            document.getElementById("films").innerHTML = this.responseText;
        }
    }
    http.send(params);
}