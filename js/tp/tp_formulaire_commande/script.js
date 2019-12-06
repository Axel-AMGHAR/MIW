onload = function() {
    document.getElementsByTagName("body")[0].innerHTML= `
            <form>
                <fieldset>
                    <legend>Identification</legend>
                    <div class="labin">
                        <label>Nom : </label>
                        <input type="text" value="AMGHAR" required/>
                        <label>Prenom : </label>
                        <input type="text" value="Axel" required/>
                    </div>

                    <div class="labin">
                        <label>Adresse : </label>
                        <input class="adresse" type="text" value="5 rue parin" required/><br/>
                    </div>
                    
                    <div class="labin">
                        <label>Code postal : </label>
                        <input class="code_postal" type="number" value="84250" required/>
                        <label>Ville : </label>
                        <input type="text" value="Le Thor" required/>
                    </div>
                    
                    <div class="labin">
                        <label>Telephone : </label>
                        <input class="num" type="text" value="06 51 65 89 68" required/>
                        <label>E-mail : </label>
                        <input class="mail" type="text" value="axel.amghar@etu.univ-amu.fr" required/>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Selection des produits</legend>
                    <div class="labin">
                        <select class="select_libelle">
                        <option selected disabled>Choisir</select>
                        </select>
                        <input class="prix" type="number" readonly/>
                        <input class="quantitee" type="number" readonly/>
                        <input class="plus" type="button" value="+"/>
                        <input class="moins" type="button" value="-"/>
                        <input class="reset_quantitee" type="button" value="x"/>
                    </div>
                    
                    <div class="labin">
                        <select class="select_libelle">
                        <option selected disabled>Choisir</select>
                        </select>
                        <input class="prix" type="number" readonly/>
                        <input class="quantitee" type="number" readonly/>
                        <input class="plus" type="button" value="+"/>
                        <input class="moins" type="button" value="-"/>
                        <input class="reset_quantitee" type="button" value="x"/>
                    </div>
                    
                     <div class="labin">
                        <select class="select_libelle">
                        <option selected disabled>Choisir</select>
                        </select>
                        <input class="prix" type="number" readonly/>
                        <input class="quantitee" type="number" readonly/>
                        <input class="plus" type="button" value="+"/>
                        <input class="moins" type="button" value="-"/>
                        <input class="reset_quantitee" type="button" value="x"/>
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Résultats</legend>
                    <div class="labin">
                        <label>Montant hors taxe : </label>
                        <input class="ht" type="text" readonly/>
                    </div>
                    <div class="labin">
                        <label>Montant TVA(19,6%) : </label>
                        <input class="tva" type="text" readonly />
                    </div>
                    <div>
                        <label>Montant TTC : </label>
                        <input class="ttc" type="text" readonly/>
                    </div>
                </fieldset>
                
            <div class="buttons">
                <input class="valider" type="submit" value="Valid" />
                <input class="reset_form" type="button" value="Reset page" />
            </div>

            </form>
    `;
    
    const verif_code_postal = (code_postal) => {
        let regex_code_postal = /^[0-9]{5}$/;
        return (regex_code_postal.test(code_postal));
    };
    
    const verif_num_tel = (num) => {
        let regex_num_with_dash = /^([0-9]{2}[-]?){4}[0-9]{2}$/;
        let regex_num_with_space = /^([0-9]{2}[ ]?){4}[0-9]{2}$/;
        return (regex_num_with_dash.test(num) || regex_num_with_space.test(num));
    };
    
    const verif_mail = (mail) => {
        let regex_mail = /^[0-9a-zA-Z-._]+[@]{1}[0-9a-zA-Z-._]+[.]{1}[a-z0-9]{2,4}$/;
        return (regex_mail.test(mail));
    };
    
    const make_red_and_message = (element ,message) => {
        if ($('.false').length != 0){
            element.removeClass('false');
        }
        element.addClass('false');
        element.css('border','red solid 2px');
        element.after("<p class='reset' style='color: red;'>" + message + "</p>");
    };
    
    $('.valider').click(function(e) {
        e.preventDefault();
        let valide = true;
        let cp = $('.code_postal');
        let num = $('.num');
        let mail = $('.mail');       
        
        if ($('.reset').length != 0){
            $('.reset').remove();
            $('.false').css('border',' solid black 1px');
        }

        if(!verif_code_postal(cp.val())){
            make_red_and_message(cp,'Le code postal doit comporter 5 chiffres');
            valide = false;
        }
        
        if(!verif_num_tel(num.val())){
            make_red_and_message(num,"Le numéro de téléphone doit comporter une suite de 5 nombres de deux chiffres séparés par des espaces ou des tirets (mais pas les deux)");
            valide = false;
        }
        
        if(!verif_mail(mail.val())){
            make_red_and_message(mail,"Le mail n'est pas valide");
            valide = false;
        }
        
        if (valide)
            alert("Le formulaire est valide");
            
    });
    
    $('.reset_form').click(function (e) {
        e.preventDefault();
        document.location.reload(true);

    })
    
    let lib_produit = ['pc','imprimante','moniteur','cd'];
    let prix_produit = [1000,150,300,20];

    const find_element_tab = (val) => {
        for(let i=0;i<lib_produit.length;i++){
            if (lib_produit[i] == val)
                return i;
        }
    } 
    
    const calcul_prix = () => {
        let prix_hors_taxes = 0;
        $('.select_libelle').each(function (index, select) {
            let prix_produit = $(select).parent().find('.prix').val();
            let quantitee = $(select).parent().find('.quantitee').val();
            if (prix_produit != '' && quantitee != '')
            prix_hors_taxes += eval(parseInt(prix_produit) * parseInt(quantitee));
        });
        
        let tva = prix_hors_taxes*0.196;
        $('.ht').val(prix_hors_taxes);
        $('.tva').val(tva.toFixed(2));
        $('.ttc').val((tva+prix_hors_taxes).toFixed(2));
    };
    
    $('.select_libelle').each(function (index, select) {
        lib_produit.forEach(function(element){
            $(select).append('<option value="'+element+'">'+element+'</option>')           
        });
        
        let quantitee = $(select).parent().find('.quantitee');
        
        $(select).change(function () {
            let i = find_element_tab($(select).val());
            $(select).parent().find('.prix').val(prix_produit[i]);
            quantitee.val(1);
            calcul_prix();
            
        })
        
        $(select).parent().find('.plus').click(function () {
            if (quantitee.val() != '')  
                quantitee.val(parseInt(quantitee.val(),10)+1);
            calcul_prix();
        })
        
        $(select).parent().find('.moins').click(function () {
            if (quantitee.val() != '' && quantitee.val() > 0 )  
                quantitee.val(parseInt(quantitee.val(),10)-1);
             calcul_prix();
       })
        
        $(select).parent().find('.reset_quantitee').click(function() {
            quantitee.val('');
            calcul_prix();
        });
        
    });
    
};


