class Gestion_liste_personne {
    
    constructor (){
        this.p_debut = null;
    }
    
    ajout (nom){
        let Pnouveau = new Tpersonne(nom);
        if (this.p_debut == null)
            this.p_debut = Pnouveau;
        else {
            Pnouveau.pSuivant = this.p_debut;
            this.p_debut = Pnouveau;
        }
    }
    
    display (class_div){
        let pointeur = this.p_debut;
        class_div.html("");
        while(pointeur != null){
            class_div.append('<div>'+pointeur.nom+'</div>');
            pointeur = pointeur.pSuivant;
        }
    }
    
    delete (nom){
        let pointeur = this.p_debut;
        let pointeur_prec = this.p_debut;
        while(pointeur != null && pointeur.nom.toLowerCase() != nom){
            pointeur_prec = pointeur;
            pointeur = pointeur.pSuivant;
        }

        if (pointeur == null){
            alert("le nom n'est pas présent dans la liste (la liste est peut être vide)");
            return;
        } else if (this.p_debut.pSuivant == null) {
            console.log("t");
            this.p_debut = pointeur.pSuivant;
        }
         else {
            pointeur_prec = pointeur.pSuivant;
            pointeur.pSuivant = null;
        }
    }
    
    reinitialize (){
        let pointeur_suiv;
        let i =0;
        while (this.p_debut != null){
            delete this.p_debut.nom;
            pointeur_suiv = this.p_debut.pSuivant;
            delete this.p_debut.pSuivant;
            this.p_debut = pointeur_suiv;
            console.log(i++);
        }
    }  
}

class Tpersonne {
    
    constructor (nom){
        this.nom = nom;
        this.pSuivant = null;
    }
}