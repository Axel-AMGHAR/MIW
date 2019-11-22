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
};