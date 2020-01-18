/**
*   My lib
*   Version 1.0
*
*** Summary
* 
** General
*   $(selector)         - Select an element | create an element
*
** Node
*   val()               - Return the value of a node | Set the value of a Node with text
*   html()              - Return html content of a node | Replace the content of a Node with html/text
*   text()              - Return only the textContent (without html) of a Node | Replace the text of a Node
*   css()               - Get the css value of a Node | Set one or more css properties of a Node | Set one css value of a Node
*   append_(element)    - Add a node or a text at the end of a Node
*   prepend_(element)   - Add a node or a text at the start of a Node   
*   after_(element)     - Add a node or a text after this Node
*   before_(element)    - Add a node or a text before this Node
*
** NodeList
*   val(new_value)      - Set the value of a NodeList with text | Set the value of a NodeList with text
*   html(html)          - Replace the content of a NodeList with html/text | Replace the content of a NodeList with the return of a function(index)
*   text(text)          - Replace the text of a Node with another text | Replace the content of a Node with the return of a function(index)
*   css()               - Set one or more css properties for each Nodes | Set one css value for each Nodes
*   append_(element)    - Add a node or a text at the end of a NodeList
*   prepend_(element)   - Add a node or a text at the start of a NodeList
*   after_(element)     - Add a node or a text after each Node
*   before_(element)    - Add a node or a text before each Node
*   first()             - Return the first element of a NodeList
*   last()              - Return the last element of a NodeList
*   submit()            - Submit a NodeList
*   each(function)      - Apply a function for each Node
*
** Inplementing functions
*   is_one_arg(args, function_name) - Verify that there is only one argument
*   extend(objDest,objSourc)        - Copy functions to a prototype
*
**/

/**
*   Select an element
* @param  {String} selector 
* @return {Node}
*
*   Create an element
* @param  {String} selector - an html node(in string)
* @return {Node|NodeList}
*/
function $(selector){
    if (!is_one_arg(arguments, arguments.callee.name))return;

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
    *   Return the value of a node
    * @return {String}
    *
    *   Set the value of a Node with text
    *
    * @param  {String} arguments[0]
    * @return {Node}
    */
    val : function(){
        if (arguments[0]){
            this.value = arguments[0];
            return this;
        } else
            return this.value;
    },
    /**
    *   Return html content of a node
    * @return {String}
    *
    *   Replace the content of a Node with html/text
    *
    * @param  {Node|NodeList|String} arguments[0]
    * @return {Node}
    */
    html : function(){
        if (arguments[0]){
            this.innerHTML = arguments[0];
            return this;
        } else
            return this.innerHTML;

    },
    /**
    *   Return only the textContent (without html) of a Node
    * @return {String} textContent
    *
    *  Replace the text of a Node
    * @param  {String} arguments[0]
    * @return {Node}
    */
    text : function(){
        if (arguments[0]){
            this.textContent = arguments[0];
            return this;
        }
        else 
            return this.textContent;
    },
    /**
    *   Get the css value of a Node
    * @param  {String} arguments[0] - a css property 
    * @return {String} - the css value
    *
    *   Set one or more css properties of a Node
    * @param {Object} arguments[0] - Object{ property: new_value } ex: background-color
    * convert it to backgroundColor automatiquely
    * @return {Node}
    *
    *   Set one css value of a Node
    * @param {String} argument[0] - a css property
    * @param {String} argument[0] - the new value   
    * @return {Node}
    */
    css : function(){
        if (typeof arguments[0] == 'object'){
            for (let item_obj in arguments[0]){
                const match = /-/.exec(item_obj);
                if (match)
                    item_obj = item_obj.replace(item_obj.substr(match.index,2), item_obj.substr(match.index+1,1).toUpperCase());

                this.style[item_obj] = arguments[0][item_obj];
            }
        } else if (arguments.length == 2){
            const match = /-/.exec(arguments[0]);
            if (match)
                arguments[0] = arguments[0].replace(arguments[0].substr(match.index,2), arguments[0].substr(match.index+1,1).toUpperCase());
            this.style[arguments[0]] = arguments[1];
        } else if (arguments.length == 1){
            if (window.getComputedStyle(this,null).getPropertyValue(arguments[0]).length != 0)
                return window.getComputedStyle(this,null).getPropertyValue(arguments[0]);
            else {
                const match = /-/.exec(arguments[0]);
                if (match)
                    arguments[0] = arguments[0].replace(arguments[0].substr(match.index,2), arguments[0].substr(match.index+1,1).toUpperCase());
                if (this.style[arguments[0]] == undefined)
                    return console.error('Argument : [' + arguments[0] + '] doesn\'t exist');
                return this.style[arguments[0]];
            }
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
        if (!is_one_arg(arguments, arguments.callee.name))return;

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
        if (!is_one_arg(arguments, arguments.callee.name))return;

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
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.after(element);
        return this;
    },
    /**
    *   Add a node or a text before this Node
    *
    * @param  {String|Node} element    
    * @return {Node}   
    */
    before_ : function(element){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.before(element);
        return this;
    }
});

/** NodeList **/

extend(NodeList.prototype,{
    /**
    *   Set the value of a NodeList with text
    * @param  {String} new_value
    * @return {NodeList}
    *
    *   Set the value of a NodeList with text
    * @param  {function} new_value - function(currentIndex)
    * we can put different informations in function of index
    * @return {NodeList}
    */
    val : function(new_value){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.forEach(function(currentValue, currentIndex){
            if(typeof html === 'function')
                currentValue.value = new_value(currentIndex);
            else
                currentValue.value = new_value;
            return this;
        });
    },
    /**
    *   Replace the content of a NodeList with html/text
    * @param  {Node|NodeList|String} html
    * @return {NodeList}
    *
    *   Replace the content of a NodeList with the return of a function(index)
    * @param  {function} html - function(currentIndex)
    * we can put different informations in function of index
    * @return {NodeList}
    */
    html : function(html){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.forEach(function(currentValue, currentIndex){
            if(typeof html === 'function')
                currentValue.innerHTML = html(currentIndex);
            else 
                currentValue.innerHTML = html;
        });
        return this;
    },
    /**
    *  Replace the text of a Node with another text
    * @param  {String} text
    * @return {NodeList}
    *
    *   Replace the content of a Node with the return of a function(index)
    * @param  {function} html - function(currentIndex)
    * we can put different informations in function of index
    * @return {NodeList}
    */
    text : function(text){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.forEach(function(currentValue, currentIndex){
            if(typeof text === 'function'){
                currentValue.textContent = text(currentIndex);
            } else 
                currentValue.textContent = text;
        });
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
        for (let item of this){
            if (typeof arguments[0] == 'object'){
                for (let item_obj in arguments[0]){
                    const match = /-/.exec(item_obj);
                    if (match)
                        item_obj = item_obj.replace(item_obj.substr(match.index,2), item_obj.substr(match.index+1,1).toUpperCase());
                    item.style[item_obj] = arguments[0][item_obj];
                }
            } else if (arguments.length == 2){
                const match = /-/.exec(arguments[0]);
                if (match)
                    arguments[0] = arguments[0].replace(arguments[0].substr(match.index,2), arguments[0].substr(match.index+1,1).toUpperCase());
                item.style[arguments[0]] = arguments[1];
            } else 
                console.error('0 or more than 2 arguments : ');
        }
        return this;
    },
    /**
    *   Add a node or a text at the end of a NodeList
    *
    * @param  {String|Node} element
    * @return {NodeList}
    */
    append_ : function(element){
        if (!is_one_arg(arguments, arguments.callee.name))return;

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
        if (!is_one_arg(arguments, arguments.callee.name))return;

        for (let item of this){
            item.prepend(element);
        }
        return this;
    },
    /**
    *   Add a node or a text after each Node
    *
    * @param  {String|Node} element    
    * @return {Node}   
    */
    after_ : function(element){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.forEach(function(currentValue){
            currentValue.after(element)
        });
        return this;
    },
    /**
    *   Add a node or a text before each Node
    *
    * @param  {String|Node} element    
    * @return {Node}   
    */
    before_ : function(element){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.forEach(function(currentValue){
            currentValue.before(element)
        });
        return this;
    },
    /**
    *   Return the first element of a NodeList
    *
    * @return {Node}
    */
    first : function(){
        return this[0];
    },
    /**
    *   Return the last element of a NodeList
    *
    * @return {Node}
    */
    last : function(){
        return this[this.length-1];
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
    },
    /**
    *   Apply a function for each Node
    *
    * @param {function} my_function - function(currentValue,currentIndex)
    * @return {NodeList}
    */
    each : function(my_function){
        if (!is_one_arg(arguments, arguments.callee.name))return;

        this.forEach(function(currentValue, currentIndex){
            my_function(currentValue, currentIndex);
        });
        return this;
    }
});


/** Function only for implementing the lib **/

/**
*   Verify that there is only one argument
*
* @param {Array} args  -  Tab of arguments
*/
function is_one_arg(args, function_name){
    if(args.length == 1)
        return true;
    else{
        console.error(`Function [${function_name}] : Veillez mettre un et un seul argument`);
        return false;
    }
}

/**
*   Copy functions to a prototype 
*
* @param {Object} objDest  -  the prototype where we want to add functions
* @param {Object} objSourc -  list of functions
*/
function extend(objDest,objSourc){
    for(var i in objSourc){objDest[i]=objSourc[i]}
}