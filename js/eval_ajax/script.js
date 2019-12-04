onload = function () {
    function err (){
        console.log('il y a eu un problème');
    }


    $get_syn("biblio.xml",{},recup_livres, err,'txt');

    function recup_livres(txt){

        document.getElementById('liste').innerHTML =
            `    <div id="disp"><input name="livres" type="radio" id="dispo" checked>
<label for="dispo">Livres disponibles</label></div>
<div id="n_disp">
<input name="livres" type="radio" id="non_dispo">
<label for="non_dispo">Livres non disponibles</label></div>`;

        function dis_trs(livre, bool,chaine){
            for (let i=0; i< livre.length; i++){
                if (livre[i].getElementsByTagName('disponible')[0].textContent == bool){
                    if (i<10)
                        chaine += `<tr id="${i}">`;
                    else
                        chaine += `<tr style="display:none" id="${i}">`;
                    chaine += `<td>${livre[i].getElementsByTagName('titre')[0].textContent}</td>`
                    chaine += `<td>${livre[i].getElementsByTagName('auteur')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('genre')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('editeur')[0].textContent}</td>`;
                    chaine += `<td >${livre[i].getElementsByTagName('disponible')[0].textContent}</td></tr>`;
                }
            }
            return chaine;
        }

        for (let i=0; i<2; i++){


            let chaine = '';
            if (i%2 == 0)
                chaine += `<table id="oui">`;
            else
                chaine += `<table style="display_none" id="non">`;

            chaine += `<thead>
<tr>
<th>Titre</th>
<th>Auteur</th>
<th>Genre</th>
<th>Editeur</th>
<th>Disponibilité</th>
</tr>
</thead>
<tbody style='text-align:center'>`;

            let livre = txt.getElementsByTagName('livre');

            if (i%2 == 0)
                chaine += dis_trs(livre,'oui',chaine);
            else
                chaine += dis_trs(livre,'non',chaine);

            chaine += `</tbody></table>`;
            
            console.log(chaine);
            document.getElementById('tab_livres'+i).innerHTML = chaine;
        }


//        document.getElementById('disp').onclick = function (){
//            Array.from(document.getElementsByClassName('oui')).forEach((el) => {
//                el.style.display = 'table-row';
//            });
//
//            Array.from(document.getElementsByClassName('non')).forEach((el) => {
//                el.style.display = 'none';
//            });
//        };
//
//        document.getElementById('n_disp').onclick = function (){
//            Array.from(document.getElementsByClassName('oui')).forEach((el) => {
//                el.style.display = 'none';
//            });
//
//            Array.from(document.getElementsByClassName('non')).forEach((el) => {
//                el.style.display = 'table-row';
//            });
//        };

    }
};