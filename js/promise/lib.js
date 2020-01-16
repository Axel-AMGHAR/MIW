/**
* TO DO
*
*  fonction each 
*/

/**
*   Copy functions to a prototype 
*
* @param {Object} objDest  -  the prototype where we want to add functions
* @param {Object} objSourc -  list of functions
*/
function extend(objDest,objSourc){
    for(var i in objSourc){objDest[i]=objSourc[i]}
}

/**
*   Select or create an element
*
* @param  {String} selector -a selector or a html element
* @return {Node|NodeList}  
*/
function $(selector){
    if (selector.substr(0,1) == '<'){
        // If we want to create an element
        const regex = /\w+/g;
        const element = selector.match(regex)[0];
        let element_created = document.createElement(element);
        const attributes = selector.match(regex);
        for (let i = 1; i < attributes.length ; i+=2 )
            element_created.setAttribute(attributes[i], attributes[i+1]);
        return element_created;
    } else{
        // If we want to select one or more elements
        return (document.querySelectorAll(selector).length == 1)?document.querySelector(selector):document.querySelectorAll(selector);

    }  
}

extend(Node.prototype,{
    /**
    *   Replace the content of a Node with html/text
    *
    * @param  {Html|String} html
    * @return {Node}
    */
    html : function(html){
        this.innerHTML = html;
        return this;
    },
    /**
    *  Add text at the end of a Node
    *
    * @param  {String} text    
    * @return {Node}   
    */
    text : function(text){
        this.appendChild(document.createTextNode(text));
        return this;
    },
    /**
    *   Add a node or a text at the end of a Node
    *
    * @param  {String|Node} element    
    * @return {Node}   
    */
    append_ : function(element){
        this.append(element);
        return this;
    },
    /**
    *   Add a node or a text at the start of a Node
    *
    * @param  {String|Node} element    
    * @return {Node}   
    */
    prepend_ : function(element){
        this.prepend(element);
        return this;
    }
});

extend(NodeList.prototype,{
    /**
    *   Replace the content of a NodeList with html/text
    *
    * @param  {Html|String} html
    * @return {NodeList}
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
    *   Add text to the end of the content of a NodeList 
    *
    * @param  {String} text
    * @return {NodeList}
    */
    text : function(text){
        for (let item of this)
            item.appendChild(document.createTextNode(text));
        return this;
    },
    /**
    *   Get the css value of a NodeList
    * @param  {String} arguments[0] - a css property
    * @return {Array} - Array of Object{ name_property: value_property } for each Nodes
    *
    *   Set one or more css properties for each Nodes
    * @param {Object} arguments[0] - Object{ property: new_value }
    * @return {NodeList}
    *
    *   Set one css value for each Nodes
    *
    * @param {String} argument[0] - a css property
    * @param {String} argument[0] - the new value   
    * @return {NodeList}
    */
    css : function(){
        let items = [];
        for (let item of this){
            if (typeof arguments[0] == 'object'){
                for (let item_obj in arguments[0])
                    item.style[item_obj] = arguments[0][item_obj];
            } else if (arguments.length == 2)
                item.style[arguments[0]] = arguments[1];
            else if (arguments.length == 1){
                if (item.style[arguments[0]] == undefined)
                    return console.error('Argument : [' + arguments[0] + '] doesn\'t exist');
                let attr_object = {};
                attr_object[arguments[0]] = item.style[arguments[0]];
                items.push(attr_object);

            } else {
                console.error('0 or more than 2 arguments : ');
                arguments.forEach( (elem) => {
                    console.error(elem);
                })
            }
        }
        if (arguments.length == 1)
            return items;
        return this;
    },
    /**
    *   Add a node or a text at the end of a NodeList
    *
    * @param  {String|Node} element
    * @return {NodeList}
    */
    append : function(element){
        for (let item of this){
            item.append(element);
        }
        return this;
    },
    /**
    *   Add a node or a text at the start of a NodeList
    *
    * @param  {String|Node} element    
    * @return {NodeList}   
    */
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

/*??
each : function(func){
    func(index);
}*/