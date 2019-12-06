onload = function () {
    
    Object.prototype.log = function (){
        console.log(this);
    }
    
    Object.prototype.alert = function (){
        alert(this);
    }

    String.prototype.right = function (n){
        return this.substr(this.length-n,this.length);
    };

    String.prototype.capitalize = function (){
        return this.substr(0,1).toUpperCase() + this.substr(1,this.length).toLowerCase();
    };

    String.prototype.trim = function (){
        let reg_space_right = /^\s+/;
        let reg_space_left = /\s+$/;
        let string_trim = this.split(reg_space_right)[1];
        string_trim = string_trim.split(reg_space_left)[0];
        return string_trim;
    };
    
    Array.prototype.merge = function (tab){
        tab_o = this;  
        tab.forEach( function (element){
            tab_o.push(element);
        });
    };
    
    Number.prototype.puissance = function (n){
        let value_end = Number(this);
        for (i=1; i<n; i++){
            value_end *= Number(this);
        }
        return value_end;
    };

    Node.prototype.change_id = function (id){
        this.id = id;
    };

    Node.prototype.css = function (object){
        let node = this;
        Object.keys(object).forEach(function (item) {
            node.style[item] = (item,object[item]);
        })
    };
    
    Object.prototype.extends = function(object){
        for ( let i in object){
            this[i] = object[i];
        }
    };
    
    String.prototype.extends({
        left : function (n){
            return this.substr(0,n);
        }
    });
}