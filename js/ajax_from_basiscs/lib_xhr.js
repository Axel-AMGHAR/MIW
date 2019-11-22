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
