function surface(object){
    if (typeof object === "object"){
        let forme = object.forme;
        if (forme == 'carre'){
            if (object.cote !== undefined && typeof object.cote === 'number' && object.cote > 0){
                let cote = object.cote;
                return cote*cote;
            } else
                return -1;
        } else if(forme == 'rectangle'){
            if (object.long !== undefined && object.larg !== undefined && typeof object.long === 'number' && typeof object.larg === 'number' && object.long > 0 && object.larg > 0){
                let long = object.long;
                let larg = object.larg;
                return long*larg;
            } else
                return -1;
        } else if (forme == 'cercle'){
            if (object.rayon !== undefined && typeof object.rayon === 'number' && object.rayon > 0){
                let rayon = object.rayon;
                return rayon*rayon*3.14;
            } else
                return -1;
        } else 
            return -1;
    } else
        return -1;
}