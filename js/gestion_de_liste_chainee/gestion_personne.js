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
            class_div.append('<div class="animated  flipInX delay-10s">'+pointeur.nom+'</div>');
            pointeur = pointeur.pSuivant;
        }
    }
    
    delete (nom){
        let pointeur = this.p_debut;
        let p_suivant;
        let p_prec;
        while(pointeur != null && pointeur.nom.toLowerCase() != nom){
            p_prec = pointeur;
            pointeur = pointeur.pSuivant;
        }

        if (pointeur == null){
            alert("le nom n'est pas présent dans la liste (la liste est peut être vide)");
            delete(prompt("veuillez réesayer"));
            return;
        } else {
            p_suivant = pointeur.pSuivant;
            delete pointeur.pSuivant;
            delete pointeur.nom;
            if (pointeur == this.p_debut)
                this.p_debut = p_suivant;
            else 
                p_prec.pSuivant = p_suivant;
        }
    }
    
    reinitialize (){
        let pointeur_suiv;
        while (this.p_debut != null){
            delete this.p_debut.nom;
            pointeur_suiv = this.p_debut.pSuivant;
            delete this.p_debut.pSuivant;
            this.p_debut = pointeur_suiv;
        }
    }  
}

class Tpersonne {
    
    constructor (nom){
        this.nom = nom;
        this.pSuivant = null;
    }
}