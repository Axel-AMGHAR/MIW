Object.prototype.log = function() { console.log(this); };

const _id = (id)         => { return document.getElementById(id); };
const _cl = (my_class)   => { return document.getElementsByClassName(my_class); };
const _tn = (tag_name)   => { return document.getElementsByTagName(tag_name); };
const _n  = (name)       => { return document.getElementsByName(name); };
const _   = (selecteurs) => { return document.querySelectorAll(selecteurs); };
const _cf = ()           => { return document.createDocumentFragment; };
const _ce = (elem, node_ins) => {
    let element = document.createElement(elem);
    if(node_ins)
        node_ins.appendChild(element);
    else 
        return element;
}

