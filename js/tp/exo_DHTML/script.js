onload = () => {
    _id('t');
    _cl('class');
    _tn('h1');
    _n('name');
    _('.class');
    _cf();
    
    let my_div =_ce('p', _ce('div'));
    my_div;
    my_div = _ct('text',my_div);
    my_div;
    _id('body').append(my_div);
    
    const attributs = {
        class: 'test',
        title: 'title'   
    };

    const style = {
        border: 'solid black 1px',
        color: 'white'   
    };
    
    my_div = _cn('div',attributs,style,my_div);
    log(my_div);
    _dn(_cl('test')[0]);
    log(my_div);

    _each(style,test);

}