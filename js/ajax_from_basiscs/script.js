onload = function () {

    function recup_cat(txt){
        let categories = document.getElementById('categories');
        let xml_cat = txt.getElementsByTagName('categorie');
        for (let i=0; i < xml_cat.length; i++){
            let option = document.createElement("option");
            option.textContent = xml_cat[i].textContent;
            option.value= i+1;
            categories.appendChild(option);
        }
    }

    function recup_pro(txt) {
        txt = JSON.parse(txt);

        let pro = document.getElementById('products');
        let chaine = '';
        txt.forEach( (element)=>{
            chaine += `<option value="${element.id_cat}">${element.nom}</option>`
        });
        pro.innerHTML = chaine;
    }

    function recup_json(txt){
        txt = JSON.parse(txt);
        let chaine = '<h1>Version JSON</h1><table><tbody>';
        txt.forEach((element) =>{
            chaine +=
                `<tr>
                    <td>${element.nom}</td>
                    <td>${element.prenom}</td>
                    <td>${element.age}</td>
                </tr>`;
        });
        chaine +='</tbody></table>';
        document.getElementsByClassName('results')[0].innerHTML = chaine;
    }

    function recup_txt(txt){
        document.getElementsByClassName('results')[0].innerHTML = '<h1>Version TXT</h1>' + txt;
    }

    function recup_xml(txt){
        let chaine = '<h1>Version XML</h1><table><tbody>';
        let client = txt.getElementsByTagName('client');
        for (let i=0; i < client.length; i++){
            let nom = client[i].getElementsByTagName('nom')[0].textContent;
            let prenom = client[i].getElementsByTagName('prenom')[0].textContent;
            let age = client[i].getElementsByTagName('age')[0].textContent;
            chaine +=
                `<tr>
                    <td>${nom}</td>
                    <td>${prenom}</td>
                    <td>${age}</td>
                </tr>`;

        };
        chaine +='</tbody></table>';
        document.getElementsByClassName('results')[0].innerHTML = chaine;
    }

    function err (){
        console.log('il y a eu un problème');
    }

    document.getElementById('ajax_txt').onclick = function (){
        $get("sourceHtml.txt",{},recup_txt, err)
    };

    document.getElementById('ajax_xml').onclick = function (){
        $get("sourceXml.xml",{},recup_xml, err)
    };

    document.getElementById('ajax_json').onclick = function (){
        $get("sourceJson.json",{},recup_json, err)
    };

    $get("bdd_cat.php",{},recup_cat, err,'xml');

    document.getElementById('categories').onchange = function (){
        $post("bdd_pro.php",{'id' : this.value},recup_pro, err,'txt');
    }
};