function client(str) {
    if (str == "") {
        document.getElementById("resultat").innerHTML = "";
        return;
    } else { 
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         
        document.getElementById("resultat").innerHTML = xmlhttp.responseText;
        
            }
        }
        xmlhttp.open("POST","bon_de_livraison_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }
}

