onload = function () {
  
    function ajax_txt(document){
         let req = Xhr();
         req.onreadystatechange= function(){
            if (this.readyState==this.DONE){
                let ext = document.split('.')[1]
                if( ext == "txt")
                    recup_txt(req.responseText);
                else if ( ext == "json")
                    recup_json(req.responseText);
            }

         }; 

         req.open("GET", document, true); 
         req.send(null);
    }
    
    function ajax_xml(document){
         let req = Xhr();
         req.onreadystatechange= function(){
            if (this.readyState==this.DONE)
                recup_xml(req.responseXML); 
         }; 

         req.open("GET", document, true); 
         req.send(null);
    }

    function ajax_php(document, value = null){
        let req = Xhr();
        req.onreadystatechange= function(){
            if (this.readyState==this.DONE)
                if (document == 'bdd_cat.php')
                    recup_cat(req.responseXML);
                else
                    recup_pro(req.responseText);
        };
        if (document == 'bdd_cat.php'){
            req.open("GET", document, true);
            req.send(null);
        } else {
            req.open("POST", document, true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send('id='+value);
        }
    }

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

    function recup_pro(txt) {
        txt = JSON.parse(txt);

        let pro = document.getElementById('products');
        let chaine = ''
        txt.forEach( (element)=>{
            chaine += `<option value="${element.id_cat}">${element.nom}</option>`
        });
        pro.innerHTML = chaine;
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
             
    document.getElementById('ajax_txt').onclick = function (){
        ajax_txt("sourceHtml.txt");
    }

    document.getElementById('ajax_xml').onclick = function (){
        ajax_xml("sourceXml.xml");
    }
    
    document.getElementById('ajax_json').onclick = function (){
        ajax_txt("sourceJson.json");
    }

    ajax_php("bdd_cat.php");

    document.getElementById('categories').onchange = function (){
        ajax_php("bdd_pro.php",this.value);
    }
};