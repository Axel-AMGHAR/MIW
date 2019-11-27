/*
http://api.openweathermap.org/data/2.5/weather?q=Poitiers,fr&appid=f8668c5a4eda974bc5db4a1ec14922a0
api.openweathermap.org/data/2.5/weather?q={city name},{country code}d
*/
onload = function () {
    $post("get_departements.php",{},recup_departements, err,'txt');

    document.getElementById('departements').onchange = function () {
        $post("get_villes.php",{'id':this.value},recup_villes, err,'txt');
    };

    document.getElementById('villes').onchange = function () {
        $get(`http://api.openweathermap.org/data/2.5/weather`,{'q': this.value+',fr', 'appid':'f8668c5a4eda974bc5db4a1ec14922a0'},affiche_infos, err);
    };

    function recup_departements (txt){
        txt = JSON.parse(txt);
        let departements = document.getElementById('departements');
        let chaine = '';
        txt.forEach( (element)=>{
            chaine += `<option value="${element.code}">${element.nom}</option>`
        });
        departements.innerHTML = chaine;
    }

    function recup_villes(txt){
        txt = JSON.parse(txt);
        let villes = document.getElementById('villes');
        let chaine = '';
        txt.forEach( (element)=>{
            chaine += `<option value="${element.id}">${element.nom}</option>`
        });
        villes.innerHTML = chaine;
    }

    function affiche_infos (txt) {
        txt = JSON.parse(txt);
        let rain = "pas de pluie"
        if(txt.rain !== undefined && txt.rain !== null){
            if (txt.rain['3h'] !== undefined && txt.rain['3h'] !== null)
                rain = txt.rain['3h'];
            else if (txt.rain['1h'] !== undefined && txt.rain['1h'] !== null)
                rain = txt.rain['1h'];
        }
        let sunrise = new Date(parseInt(txt.sys.sunrise + '000'));
        let heure = (sunrise.getHours() > 9)?sunrise.getHours():'0'+sunrise.getHours();
        let minute = (sunrise.getMinutes() > 9)?sunrise.getMinutes():'0'+sunrise.getMinutes();
        sunrise = heure + ':'+ minute;

        let sunset = new Date(parseInt(txt.sys.sunset + '000'));
        heure = (sunset.getHours() > 9)?sunset.getHours():'0'+sunset.getHours();
        minute = (sunset.getMinutes() > 9)?sunset.getMinutes():'0'+sunset.getMinutes();
        sunset = heure + ':'+ minute;
        let cardinal = getCardinal(txt.wind.deg);



        let html = `<h1>${txt.name + ' '+ txt.sys.country}</h1>

        <h2>
            <img src="http://openweathermap.org/img/wn/${txt.weather[0].icon}@2x.png" alt="">
            ${(txt.main.temp-273.15).toFixed(2)  + '°C'}
        </h2>
        <div>${txt.weather[0].main}</div>
        <div>${'Get at ' + new Date().toLocaleString()}</div>
        <table>
            <tbody>
            <tr>
                <td>Wind</td>
                <td>${'Speed: '+txt.wind.speed} m/s</br>
                ${cardinal} (${'degree: '+txt.wind.deg} °)
                </td>
            </tr>
            <tr>
                <td>Cloudiness</td>
                <td>${txt.weather[0].description}</td>
            </tr>
            <tr>
                <td>Pressure</td>
                <td>${txt.main.pressure} hba</td>
            </tr>
            <tr>
                <td>Humidity</td>
                <td>${txt.main.humidity} %</td>
            </tr>
            <tr>
                <td>Rain</td>
                <td>${rain}</td>
            </tr>
            <tr>
                <td>Sunrise</td>
                <td>${sunrise}</td>
            </tr>
            <tr>
                <td>Sunset</td>
                <td>${sunset}</td>
            </tr>
            </tbody>
        </table>`;
        document.getElementById('meteo').innerHTML = html;
    }

    function getCardinal(angle) {
        /**
         * Customize by changing the number of directions you have
         * We have 8
         */
        const degreePerDirection = 360 / 8;

        /**
         * Offset the angle by half of the degrees per direction
         * Example: in 4 direction system North (320-45) becomes (0-90)
         */
        const offsetAngle = angle + degreePerDirection / 2;

        return (offsetAngle >= 0 * degreePerDirection && offsetAngle < 1 * degreePerDirection) ? "North"
            : (offsetAngle >= 1 * degreePerDirection && offsetAngle < 2 * degreePerDirection) ? "North-East"
                : (offsetAngle >= 2 * degreePerDirection && offsetAngle < 3 * degreePerDirection) ? "East"
                    : (offsetAngle >= 3 * degreePerDirection && offsetAngle < 4 * degreePerDirection) ? "South-East"
                        : (offsetAngle >= 4 * degreePerDirection && offsetAngle < 5 * degreePerDirection) ? "South"
                            : (offsetAngle >= 5 * degreePerDirection && offsetAngle < 6 * degreePerDirection) ? "South-West"
                                : (offsetAngle >= 6 * degreePerDirection && offsetAngle < 7 * degreePerDirection) ? "West"
                                    : "North-West";
    }
};
