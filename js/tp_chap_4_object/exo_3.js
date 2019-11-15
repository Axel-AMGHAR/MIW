onload = function () {
    
    Object.prototype.log = function (){
        console.log(this);
    }
    
    Object.prototype.alert = function (){
        alert(this);
    }
    
    class Carte {
        
        constructor(numero, couleur){
            this.numero = numero;
            this.couleur = couleur;
            this.image = null;
        }
        
        affiche_carte (){
            let img = $('.img_carte');
            let nom = "cartes1/" + this.numero + this.couleur + '.gif';
            img.attr('src',nom);
        }

    }
    
    let tab_personne = ['valet','dame','roi'];

    let num_carte = $('.select_num_carte');
    let i=1;
    for(i; i<=10;i++){
        num_carte.append('<option value="'+i+'">'+i+'</option>');      
    }

    tab_personne.forEach( function(Element){
        i++;
        num_carte.append('<option value="'+i+'">'+Element+'</option>');
    });

    $('.envoyer').click(function(e) {
        e.preventDefault();
        let carte = new Carte(num_carte.val(),$('.select_type_carte').val());
        carte.affiche_carte();
    })            

}