let i = 0;
let total = null;
let passed = null;  
MiwUnit = {
    test: function(titre, fonction_asserts){
        let div = document.createElement('div');
        if (i>0)
            document.getElementsByClassName('div'+(i-1))[0].removeAttribute('id');
        div.classList.add('div'+ i++);
        div.id = 'last';
        let gen_div = document.createElement('div');
        gen_div.innerHTML = titre;
        gen_div.style.backgroundColor = 'grey';
        gen_div.appendChild(div);
        document.body.appendChild(gen_div);
            
        let status = 'show';
        gen_div.onclick = function(){
            if (status == 'show')
                hide(gen_div);
            else 
                show(gen_div);
        }
        
        let results = fonction_asserts();
        let footer = document.createElement('div');
        console.log(total);
        footer.innerHTML = 'Nb tests : ' + total + ' Passed : ' + passed + ' Failed ' + (total-passed);
        gen_div.appendChild(footer);
        let p = document.createElement('p');
        document.body.appendChild(p);

        function hide(gen_div){
            gen_div.children[0].style.display = 'none';
            status = 'hide';
        }
        
        function show(gen_div){
            gen_div.children[0].style.display = 'inline';
            status = 'show';
        }
        
        total = 0;
        passed = 0;
    }
}

assert=(result, message)=>{
    let div = document.createElement('div');
    message='TEST '+(result?'REUSSI':'ECHOUE')+' >> '+ message;
    div.style.backgroundColor= result?'green':'red';
    div.style.color = 'white';
    div.innerHTML = message;
    document.getElementById('last').appendChild(div);
    if (result)
        passed++;
    total++;
}