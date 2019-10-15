function nombre(n){
    let reg = /^[-+]?[0-9]+(,|.)?[0-9]*$/;
    return reg.test(n);
}

function entier_positif(n){
    let reg = /^[+]?[0-9]+$/;
    return reg.test(n);
}

function is_pair(n){
    return(n%2 == 0);
}

//return float
function arrondi(nombre,x){
    return parseFloat(nombre).toFixed(x);
}
            
//return nombre
function nb_occurences (occurence,chaine){
    var regex = new RegExp(occurence,"g");
    return chaine.match(regex).length;
}

//return chaine
function substitue (occurence_a_chercher,occurence_a_remplacer,chaine){
    return chaine.replace(occurence_a_chercher,occurence_a_remplacer);
}

//fonctions géométriques

function surf_carre(c){
    return c*c;
}

function surf_rect(c,l){
    return c*l;
}

function surf_cercle(r){
    return eval(3.14*(r*r));
}