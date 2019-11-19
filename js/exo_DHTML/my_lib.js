const log = (to_log) => { console.log(to_log);}
const _id = (id)         => { return document.getElementById(id); };
const _cl = (my_class)   => { return document.getElementsByClassName(my_class); };
const _tn = (tag_name)   => { return document.getElementsByTagName(tag_name); };
const _n  = (name)       => { return document.getElementsByName(name); };
const _   = (selecteurs) => { return document.querySelectorAll(selecteurs); };
const _cf = ()           => { return document.createDocumentFragment; };

/*
** Créer un noeud elem, si le deuxième param est présent, le noeud elem sera ajouté à celui-ci
*/
const _ce = (elem, node_ins) => {
    let element = document.createElement(elem);
    if(node_ins){
        node_ins.appendChild(element);
        return node_ins;
    } else
        return element;
}

/*
** Créer un noeud texte dont la value est txt, si le deuxième param est présent, le noeud texte sera ajouté à celui-ci
*/
const _ct = (text, node_ins) => {
    let element_txt = _ce('div');
    element_txt.textContent = text;
    if(node_ins)
        node_ins.appendChild(element_txt);
    return element_txt;
}

/*
** Créer un noeud node lui ajoute les attributs , si le deuxième param est présent, le noeud texte sera ajouté à celui-ci
** attribut : object ; style : object;
*/
const _cn = (node, attribut, style, node_ins) => {
    let element = _ce(node);
    for(const property in attribut){
        element.setAttribute(property,attribut[property]);
    }
    for(let property in style){
        element.style[property] = style[property];
    }
    if(node_ins)
        node_ins.appendChild(element);
    return element;
}

const _dn = (node) => { node.remove(); }

/*
** Exemple d'utilisation pour le _each (juste pour voir si ça marche)
*/
const test = (style, value) => {
    let my_div = _ce('div');
    my_div.style[style] = value;
    log(my_div);
}

/*
** parcours un abjet et appelle une fonction pour chaque element
*/
const _each = (object,my_funtion) => {
    for (const property in object){
        my_funtion(property,object[property]);
    }
}