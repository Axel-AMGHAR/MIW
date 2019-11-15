onload = function (){

    Object.prototype.log = function (){
        console.log(this);
    }
            
    const exo1 = () => {
        
        let body = document.getElementsByTagName("body")[0];
        let form = document.createElement('form');
        let label = document.createElement('label');
        label.setAttribute('for','ISBN-13');
        label.textContent = 'ISBN-13 :';
        let input_isbn = document.createElement('input');
        input_isbn.setAttribute('type','text');
        input_isbn.setAttribute('id','ISBN-13');
        input_isbn.setAttribute('value','978-2-86889-006-1');
        input_isbn.setAttribute('required','');
        let br = document.createElement('br');
        let input_submit = document.createElement('input');
        input_submit.setAttribute('type','submit');
        input_submit.setAttribute('id','submit');
        let input_validity = document.createElement('input');
        input_validity.setAttribute('type','text');
        input_validity.setAttribute('id','validity');
        input_validity.setAttribute('readonly','');
        form.appendChild(label);
        form.appendChild(input_isbn);
        form.appendChild(br);
        form.appendChild(input_submit);
        form.appendChild(input_validity);
        body.appendChild(form);

        let reg = {
            reg_ISBN_13 : /^(978|979)-\d-\d{5}-\d{3}-\d$/
        };

        function conformeISBN(ISBN){
            return reg['reg_ISBN_13'].test(ISBN);
        }

        function valideISBN(ISBN){
            let chiffres = ISBN.substr(0,ISBN.length-1).split('-');
            chiffres = chiffres.join('');
            chiffres = chiffres.split('');
            let somme1 = 0;
            for (let i=0; i <= chiffres.length-1; i++){
                if (i % 2 == 0)
                    somme1 += parseInt(chiffres[i]);
                else 
                    somme1 += parseInt(chiffres[i])*3;
            }
            somme1 += parseInt(ISBN.substr(ISBN.length-1,ISBN.length));
            return(somme1 % 10 == 0);

        }

        function aff_resultat(value){
            document.getElementById('validity').value = value;
        }
        
        document.getElementById('submit').addEventListener("click", function (e){
            e.preventDefault();
            let ISBN = document.getElementById('ISBN-13').value;

            if(ISBN == '')
                aff_resultat('Saisir un numéro ISBN');
            else if (!conformeISBN(ISBN))
                aff_resultat('ISBN non conforme');
            else if (!valideISBN(ISBN))
                aff_resultat('ISBN non valide');
            else 
                aff_resultat('ISBN valide');
        });
    };
    
    
    const exo2 = () => {
        
        let temp = [
            {
                ville: "Gap",
                max: 38,
                min: -10,
                moy: 18
            },
            {
                ville: "Nice",
                max: 40,
                min: -1,
                moy: 20
            }
        ];
        
        let chaine =`
        <form method="post" action="">
            <select id="select_ville">
                <option selected disabled>Choisir ville</option>`;
        
        temp.forEach(function(element) {
            chaine += `<option>${element['ville']}</option>`;
        });
        
        chaine +=`
        </select><br/><br/>
            <div>Temperature (°C)</div>
            <label for="temp_max">max : </label>
            <input id="temp_max" type="text"  readonly/><br/>

            <label for="temp_min">min : </label>
            <input id="temp_min" type="text"  readonly/><br/>

            <label for="temp_moy">moyenne : </label>
            <input id="temp_moy" type="text"  readonly/><br/>
        </form>`
        
        document.getElementsByTagName("body")[0].innerHTML= chaine;
        
        function find_element_object(val) {
            for(let i=0;i<temp.length;i++){
                if (temp[i]['ville'] == val)
                    return i;
            }
        }
                
        document.getElementById('select_ville').addEventListener("change", function (){
            let temp_max = document.getElementById('temp_max');
            let temp_min = document.getElementById('temp_min');
            let temp_moy = document.getElementById('temp_moy');
            
            let i = find_element_object(this.value)
            temp_max.value = temp[i]['max'];
            temp_min.value = temp[i]['min'];
            temp_moy.value = temp[i]['moy'];
        }); 
        
    };
    
    const exo3 = () => {

        document.getElementsByTagName("body")[0].innerHTML= `
        <table>
            <thead>
                <tr>
                    <th>Devise</th>
                    <th>Montant</th>
                    <th>Cours</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Euro</td>
                    <td><input class="montant" id="euro" type="text"/></td>
                    <td>1 Euro = 1 Euro</td>
                </tr>
                <tr>
                    <td>USD Dollar Américain</td>
                    <td><input class="montant" id="usd" type="text"/></td>
                    <td>1 Euro = 1.2693 USD</td>
                </tr>                
                <tr>
                    <td>FRF France</td>
                    <td><input class="montant" id="frf" type="text"/></td>
                    <td>1 Euro = 6.55957 FRF</td>
                </tr>
                <tr>
                    <td>AUD Dollar Australien</td>
                    <td><input class="montant" id="aud" type="text"/></td>
                    <td>1 Euro = 1.443 AUD</td>
                </tr>
            </tbody>
        </table>`
        
        function affiche_prix (prix_euro){
            document.getElementById('euro').value = (prix_euro).toFixed(4);
            document.getElementById('usd').value  = (prix_euro*1.2693).toFixed(4);
            document.getElementById('frf').value  = (prix_euro*6.55957).toFixed(4);
            document.getElementById('aud').value  = (prix_euro*1.443).toFixed(4);
        }

        let montant = document.getElementsByClassName('montant');

        for(let i = 0; i < montant.length; i++){
            
            montant[i].addEventListener("change", function(){
                
                if (isNaN(this.value))
                    alert("veuillez saisir un nombre");
                else if (this.value==""){}
                else {
                    let value = parseFloat(this.value);
                    let prix_euro = null;
                    switch(this.id){
                        case 'euro':
                            prix_euro = value;
                            break;
                        case 'usd':
                            prix_euro = value/1.2693;
                            break;
                        case 'frf':
                            prix_euro = value/6.55957;
                            break;
                        case 'aud':
                            prix_euro = value/1.443;
                            break;
                        default:
                    }
                    affiche_prix(prix_euro);
                }  
            });
        }
    };


  
    exo1();
/*
    exo2();
    exo3();
*/
};