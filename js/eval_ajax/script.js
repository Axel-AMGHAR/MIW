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

        function changePage(page){
            let prev = document.getElementById('prev');
            let next = document.getElementById('next');
                }

            let chaine = 
                `<table>
<thead>
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
            for (let i=0; i< livre.length; i++){
                if (livre[i].getElementsByTagName('disponible')[0].textContent == 'oui'){

                    chaine += `<tr class="oui"><td>${livre[i].getElementsByTagName('titre')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('auteur')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('genre')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('editeur')[0].textContent}</td>`;
                    chaine += `<td >${livre[i].getElementsByTagName('disponible')[0].textContent}</td></tr>`;
                }
                else{

                    chaine += `<tr class="non" style='display: none;'><td>${livre[i].getElementsByTagName('titre')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('auteur')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('genre')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('editeur')[0].textContent}</td>`;
                    chaine += `<td>${livre[i].getElementsByTagName('disponible')[0].textContent}</td></tr>`;
                }
            }

            chaine += `</tbody>
</table>`;
            document.getElementById('tab_livres').innerHTML = chaine;

            document.getElementById('disp').onclick = function (){
                Array.from(document.getElementsByClassName('oui')).forEach((el) => {
                    el.style.display = 'table-row';
                });

                Array.from(document.getElementsByClassName('non')).forEach((el) => {
                    el.style.display = 'none';
                });
            };

            document.getElementById('n_disp').onclick = function (){
                Array.from(document.getElementsByClassName('oui')).forEach((el) => {
                    el.style.display = 'none';
                });

                Array.from(document.getElementsByClassName('non')).forEach((el) => {
                    el.style.display = 'table-row';
                });
            };

        }
    };