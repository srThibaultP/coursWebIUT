function loadXMLDoc() {
    var yourSelect = document.getElementById("actorid");
    const url = "films.ajx.php";
    var datas = { actorid: yourSelect.selectedOptions[0].value };
    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).then(datas)
        .then(res => console.log(res));
}