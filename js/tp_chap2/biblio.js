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

function maxi(){
    if(arguments.length == 0) throw new Error ("vous n'avez pas passé de paramétres");
    let nb_max = null;


    for (let i =0; i < arguments.length;i++){
    
        if (isNaN(arguments[i])){
            throw new Error ("le tableau doit contenir uniquement des nombres");
        } 
        if (nb_max < arguments[i]) nb_max = arguments[i];
    }
    return nb_max; 
}