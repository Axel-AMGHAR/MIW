onload = function (){

    let temp = [{"mois":"Janvier","tp":[2,1,5,2,10,-10,11,2,1,0,5,2,2,10,5,2,2,0,-2,1,2,0,5,-8,0,5,2,2,10,5,2]},
                {"mois":"Février","tp":[2,0,5,2,10,10,5,-2,-2,10,5,2,2,8,5,10,12,10,5,10,10,10,11,8,10,5,10,10]},
                {"mois":"Mars","tp":[2,1,5,1,12,10,5,1,12,10,5,1,2,10,1,1,12,10,15,12,12,10,15,12,10,15,12,12,10,15,12]},
                {"mois":"Avril","tp":[1,1,5,1,10,10,9,12,9,10,9,12,2,10,15,12,12,10,15,12,12,10,15,12,10,15,12,12,10,15]},
                {"mois":"Mai","tp":[12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,10,15,12,12,10,15,12]},
                {"mois":"Juin","tp":[12,10,25,12,22,20,15,12,12,10,15,12,12,10,25,12,22,20,25,12,22,22,15,12,10,15,12,12,10,15]},
                {"mois":"Juillet","tp":[22,30,25,22,22,30,25,22,22,30,35,32,32,30,25,22,22,30,25,22,22,30,25,22,30,25,32,32,20,25,22]},
                {"mois":"Aout","tp":[23,31,26,23,23,29,24,21,21,31,31,30,30,30,24,22,23,30,28,22,22,30,28,22,31,25,30,28,20,28,22]},
                {"mois":"Septembre","tp":[22,30,25,22,22,30,25,22,22,30,35,32,32,30,25,22,22,30,25,22,22,30,25,22,30,25,32,32,20,25]},
                {"mois":"Octobre","tp":[12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,10,15,12,12,10,15,12]},
                {"mois":"Novembre","tp":[12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,12,10,15,12,10,15,12,12,10,15]},
                {"mois":"Décembre","tp":[12,10,12,10,12,10,12,10,10,8,12,8,12,8,9,13,12,13,14,12,10,8,10,9,10,9,8,9,10,8,12]}]
    
    //CREATION DES ELEMENTS
    
    let body = document.getElementsByTagName('body')[0];
    let table = document.createElement('table');
    let thead = document.createElement('thead');
    let tr = document.createElement('tr');
    let th1 = document.createElement('th');
    th1.textContent = "Mois";
    let th2 = document.createElement('th');
    th2.textContent = "Minimum";
    let th3 = document.createElement('th');
    th3.textContent = "Maximum";
    let th4 = document.createElement('th');
    th4.textContent = "Moyenne";
    tr.appendChild(th1);
    tr.appendChild(th2);
    tr.appendChild(th3);
    tr.appendChild(th4);
    thead.appendChild(tr);
    table.appendChild(thead);

    let tbody = document.createElement('tbody');
    temp.forEach ( element => {
        let tr_value = document.createElement('tr');
        let td1 = document.createElement('td');
        td1.textContent = element.mois;
        let td2 = document.createElement('td');
        td2.textContent = element.tp.min();
        let td3 = document.createElement('td');
        td3.textContent = element.tp.max();
        let td4 = document.createElement('td');
        td4.textContent = element.tp.avg();

        tr_value.appendChild(td1);
        tr_value.appendChild(td2);
        tr_value.appendChild(td3);
        tr_value.appendChild(td4);
        tbody.appendChild(tr_value);
    });
    table.appendChild(tbody);
    body.appendChild(table);

    
    // AJOUT DU STYLE 
    
    let my_table = document.getElementsByTagName('table')[0];
    my_table.style.textAlign = 'center';
    my_table.style.border = '1px solid #333';

    let my_tds = document.getElementsByTagName('td');
    for ( let i = 0; i < my_tds.length; i++){
        my_tds[i].style.border = ' 1px solid #333';
        my_tds[i].style.backgroundColor = 'grey';
        my_tds[i].style.color = 'white';
    }

    let my_ths = document.getElementsByTagName('th');
    for ( let i = 0; i < my_ths.length; i++){
        my_ths[i].style.border = '1px solid #333';
    }

}