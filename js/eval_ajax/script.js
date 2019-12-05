onload = function () {
    function err (){
        console.log('il y a eu un problème');
    }

    // requete ajax (voir lib)
    $get_syn("biblio.xml",{},recup_livres, err,'txt');

    function recup_livres(txt){
        let page_oui = 1;
        let page_non = 1;
        let display = 'oui';

        //création des boutons de pagination
        document.getElementById('buttons').innerHTML = `
        <button class="prev"><a href=""><img src="img/back.png" alt=""></a></button>
        <button class="next"><a href=""><img src="img/right-arrow.png" alt=""></a></button>
        page: <span id="page"></span>
`
        //creation des input radio pour choisir entre livres dispo et non dispo

        document.getElementById('liste').innerHTML =
            `<div id="disp"><input name="livres" type="radio" id="dispo" checked>
            <label for="dispo">Livres disponibles</label></div>
            <div id="n_disp">
            <input name="livres" type="radio" id="non_dispo">
            <label for="non_dispo">Livres non disponibles</label></div>`;

        //affiche les tr avec dipo oui ou dispo non
        function dis_trs(livre, bool,chaine){
            let size=0;
            for (let i=0; i< livre.length; i++){

                if (livre[i].getElementsByTagName('disponible')[0].textContent == bool){
                    size++;
                    if (size<=10)
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

        //crée deux tableaux avec un les dispo: oui et l'autre les non puis cache les non
        for (let i=0; i<2; i++){

            let chaine = '';
            if (i%2 == 0)
                chaine += `<table id="oui">`;
            else
                chaine += `<table style="display:none" id="non">`;

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
                chaine = dis_trs(livre,'oui',chaine);
            else
                chaine = dis_trs(livre,'non',chaine);
            chaine += `</tbody></table>`;

            document.getElementById('tab_livres'+i).innerHTML = chaine;
        }

        //pagination
        let my_page = document.getElementById('page');
        my_page.textContent = page_oui;

        //affiche seulement les 10 elements pour chaque page
        function display_row (want_page){
            let j = null;
            (display == 'oui')?j=0:j=1;
            let trs = document.getElementsByTagName('tbody')[j].getElementsByTagName('tr');
            if(want_page>0 && want_page <= Math.ceil(trs.length/10) ){
                if (display == 'oui'){
                    page_oui = want_page;
                    my_page.textContent = page_oui;
                } else {
                    page_non = want_page;
                    my_page.textContent = page_non;
                }

                for (let y=0; y<trs.length;y++){
                    if ( y >= parseInt(want_page-1+ '0') && y < parseInt(want_page+ '0')){
                        if(typeof trs[y] != undefined)
                            trs[y].style.display = 'table-row';
                    } else {
                        if(typeof trs[y] != undefined)
                            trs[y].style.display = 'none';
                    } 
                }
            }
        }

        //evenement quand on clique sur precedent
        document.getElementsByClassName('prev')[0].onclick = function (e){
            e.preventDefault();
            let want_page = null;
            if(display == "oui")
                want_page = page_oui-1;
            else
                want_page = page_non-1;
            display_row(want_page);
        };

        //evenement quand on clique sur suivant
        document.getElementsByClassName('next')[0].onclick = function (e){
            e.preventDefault();
            let want_page = null;
            if(display == "oui")
                want_page = page_oui+1;
            else
                want_page = page_non+1;
            display_row(want_page);
        };

        //evenement quand on clique sur dispo:oui
        document.getElementById('disp').onclick = function (){
            my_page.textContent = page_oui;
            display = 'oui';
            document.getElementsByTagName('table')[0].style.display = 'table-row';
            document.getElementsByTagName('table')[1].style.display = 'none';
        };

        //evenement quand on clique sur dispo:non
        document.getElementById('n_disp').onclick = function (){
            my_page.textContent = page_non;
            display = 'non';
            document.getElementsByTagName('table')[0].style.display = 'none';
            document.getElementsByTagName('table')[1].style.display = 'table-row';
        };
        
        let progressBar = document.getElementById("p");
        progressBar.style.display = 'none';
    }

};