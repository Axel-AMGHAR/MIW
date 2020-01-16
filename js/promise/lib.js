/**
* TO DO
*
* each()
* first()/last() element of NodeList
* text() without parameter should give only the textcontent and not the html content
* see text(el) with a parameter
* see textContent js
* finish after() and before()
* css() handle the case to convert background-color into backgroundColor
* see conputed style ( when the css is in other file)
*/

/*??
each : function(func){
    func(index);
}*/

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
        /** If we want to create an element **/
        let regex = /\//
        if (!regex.test(selector))
            return console.error('Missing character /')
        let element = document.createElement('span');
        element.innerHTML = selector;
        return element.children[0];
    } else{
        /** If we want to select one or more elements **/
        return (document.querySelectorAll(selector).length == 1)?document.querySelector(selector):document.querySelectorAll(selector);
    }  
}

/** Node **/

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
    *   Get the css value of a Node
    * @param  {String} arguments[0] - a css property
    * @return {String} - the css value
    *
    *   Set one or more css properties of a Node
    * @param {Object} arguments[0] - Object{ property: new_value }
    * @return {Node}
    *
    *   Set one css value of a Node
    * @param {String} argument[0] - a css property
    * @param {String} argument[0] - the new value   
    * @return {Node}
    */
    css : function(){
        if (typeof arguments[0] == 'object')
            for (let item_obj in arguments[0])
                this.style[item_obj] = arguments[0][item_obj];
        else if (arguments.length == 2)
            this.style[arguments[0]] = arguments[1];
        else if (arguments.length == 1){
            if (this.style[arguments[0]] == undefined)
                return console.error('Argument : [' + arguments[0] + '] doesn\'t exist');
            return this.style[arguments[0]];
        } else
            console.error('0 or more than 2 arguments');
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
    },
    /**
    *   Add a node or a text after this Node
    *
    * @param  {String|Node} element    
    * @return {Node}   
    */
    after_ : function(element){
        this.after(element);
        return this;
    }
});

/** NodeList **/

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
    append_ : function(element){
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
    prepend_ : function(element){
        for (let item of this){
            item.prepend(element);
        }
        return this;
    },
    /**
    *   Submit a NodeList
    *  
    * @return {NodeList}
    */
    submit : function(){
        for (let item of this){
            item.submit();
        }
        return this;
    }
});