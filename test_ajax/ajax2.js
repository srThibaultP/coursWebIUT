function loadXMLDoc() {
    var yourSelect = document.getElementById("actorid");
    const url = "films.ajx.php";
    var formData = new FormData();
    formData.append('actorid', yourSelect.selectedOptions[0].value);

    fetch(url, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            //console.log(body);
            document.getElementById("films").innerHTML = body;
        });
}