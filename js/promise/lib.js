function extend(objDest,objSourc){
    for(var i in objSourc){objDest[i]=objSourc[i]}
}	

function $(selector){
    let first_character = selector.substr(0,1);
    if (first_character == '.'){
        let my_class =  document.getElementsByClassName(selector.substr(1,selector.length));
        if (my_class.length == 1 )
            return my_class[0];
        else 
            return my_class;
    } else if ( first_character == '#'){

    } else if (first_character == '<'){
        // Si on veut créer un élément
        const attributes = [];
        const regex = /\w+/;
        const element = selector.match(regex)[0];
        let element_created = document.createElement(element);
        // setAttribute("name", "helloButton");
        return element_created;
    } else {
        let my_element = document.getElementsByTagName(selector);
        if (my_element.length == 1 )
            return my_element[0];
        else 
            return my_element;
    }
}

extend(Node.prototype,{
    html : function(text){
        this.innerHTML = text;
        return this;
    },
    append : function(element){
        return this;
    }
});