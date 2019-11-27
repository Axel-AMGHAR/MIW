function $get(url, data, done, error, real_type = null){
    let req = Xhr();
    let type = url.split('.')[1];
    req.onload= function(){
        if ( this.status == 200){
            if (type=='php')
                 (real_type == 'xml')?done(req.responseXML):done(req.responseText);
            else if (type == 'xml')
                done(req.responseXML);
            else
                done(req.responseText);
        } else
            error();
    };
    let chaine_url ='?';
    for (const property in data){
        chaine_url += encodeURIComponent(property) + '='+ encodeURIComponent(data[property])+'&';
    }
    chaine_url += 'date=' + new Date();
    req.open("GET", url+chaine_url, true);
    req.send(null);
}

function $post(url, data, done, error, real_type = null){
    let req = Xhr();
    let type = url.split('.')[1];
    req.onload= function(){
        if ( this.status == 200){
            if (type=='php')
                (real_type == 'xml')?done(req.responseXML):done(req.responseText);
            else if (type == 'xml')
                done(req.responseXML);
            else
                done(req.responseText);
        } else
            error();
    };



    let chaine_post = '';
    for (const property in data){
        chaine_post += encodeURIComponent(property) + '='+ encodeURIComponent(data[property])+'&';
    }
    chaine_post += 'date=' + new Date();
    req.open("POST", url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send(chaine_post);
}

function Xhr(){
    let obj = null;
    try { obj = new ActiveXObject("Microsoft.XMLHTTP");}
    catch(Error) { try { obj = new ActiveXObject("MSXML2.XMLHTTP");}
    catch(Error) { try { obj = new XMLHttpRequest();}
    catch(Error) { alert(' Impossible de créer l\'objet XMLHttpRequest')}
        }
    }
    return obj;
}