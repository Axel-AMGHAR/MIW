/**
* TO DO
*
* function each pour les objets
*/

function extend(objDest,objSourc){
    for(var i in objSourc){objDest[i]=objSourc[i]}
}

/**
* select class, id or tagname or create an element 
*
* @param    selector
* @return   one or multiple nodes(HTMLCollection)    
*/
function $(selector){
    if (selector.substr(0,1) == '<'){
        // Si on veut créer un élément
        const regex = /\w+/g;
        const element = selector.match(regex)[0];
        let element_created = document.createElement(element);
        const attributes = selector.match(regex);
        for (let i = 1; i < attributes.length ; i+=2 )
            element_created.setAttribute(attributes[i], attributes[i+1]);
        return element_created;
    } else{
        // Si on veut selectionner un ou plusieurs elements
        return (document.querySelectorAll(selector).length == 1)?document.querySelector(selector):document.querySelectorAll(selector);

    }  
}

extend(Node.prototype,{
    /**
    * Replace the content of a node with html
    *
    * @param    html   
    * @return   the same node     
    */
    html : function(html){
        this.innerHTML = html;
        return this;
    },
    /**
    * Add text to the end of the content of a node
    *
    * @param    text   
    * @return   the same node    
    */
    text : function(text){
        this.appendChild(document.createTextNode(text));
        return this;
    },
    append : function(element){
        this.append(element);
        return this;
    },
    prepend : function(element){
        this.prepend(element);
        return this;
    }
});

extend(NodeList.prototype,{
    /**
    * Replace the content of one or more nodes with html
    *
    * @param    html   
    * @return   the same nodes     
    */
    html : function(html){
        for (let item of this){
            if (typeof html === 'string')
                item.innerHTML = html;
            else
                item.innerHTML = html.outerHTML;
        }
        return this;
    },
    /**
    * Add text to the end of the content of one ore more nodes
    *
    * @param    text   
    * @return   the same nodes    
    */
    text : function(text){
        for (let item of this)
            item.appendChild(document.createTextNode(text));
        return this;
    },
    css : function(){
        for (let item of this){
            if (typeof arguments[0] == 'object'){
                cl(Object.keys(arguments[0]).length);
                arguments[0].forEach( element => {
                    item[arguments[0]]
                });
                
            }
        }
        /*let items = [];
        for (let item of this){
            let styles = {}
            for (let argument of arguments){
                styles[argument] = item.style[argument];
            }
            items.push(styles);
        }
        return items;*/
    },
    append : function(element){
        for (let item of this){
            item.append(element);
        }
        return this;
    },
    prepend : function(element){
        for (let item of this){
            item.prepend(element);
        }
        return this;
    },
    submit : function(){
        for (let item of this){
            item.submit();
        }
        return this;
    }
});