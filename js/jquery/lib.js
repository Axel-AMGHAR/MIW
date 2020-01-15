function $(selector){
    let first_character = selector.substr(0,1);
    console.log(first_character);
    if (first_character == '.'){
        console.log( selector.substr(1,selector.length));
        return document.getElementsByClassName(selector.substr(1,selector.length));
    } else if ( first_character == '#'){
        
    } else {
        
    }
}