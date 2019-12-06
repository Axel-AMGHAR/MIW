onload = function () {
    
    function err (){
        console.log('il y a eu un problème');
    }
    
    document.getElementById('list').onkeyup = function (){
        if (this.value.length > 0 ){
        $post("get_villes.php",{'val': this.value.toUpperCase()},recup_txt, err, 'txt');}
    };
    
    function recup_txt(txt){
        txt = JSON.parse(txt);
        let chaine = '';
        txt.forEach( (element) => {
           chaine += `<option value="${element.villes}"></option>`;
        });
        
        document.getElementById('browsers').innerHTML = chaine;
        
    }
};