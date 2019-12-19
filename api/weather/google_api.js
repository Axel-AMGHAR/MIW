onload = function (){

    /*    document.getElementById("submit").onclick = function (e){
        e.preventDefault();
        let adress = document.getElementById('adresse').value.replace(/ /g,'+');
        adress += ','.
        $post("https://maps.googleapis.com/maps/api/geocode/json",{'address': adress, },recup_coordonees, err,'txt');

    }

    function err (){
        console.log('erreur de requete');
    }

    function recup_coordonees (json){

    }*/

    var openStreetMapGeocoder = GeocoderJS.createGeocoder('openstreetmap');
    openStreetMapGeocoder.geocode('GAP FRANCE', function(result) {
        let lat = result[0].latitude;
        let lon = result[0].longitude;
    });
    
/*    openStreetMapGeocoder.geodecode("44.915", "-93.21", function(result) {
        console.log(result);
    });*/

}