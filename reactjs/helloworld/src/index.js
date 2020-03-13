import React from 'react';
import ReactDOM from 'react-dom';
import HelloWorld from './components/HelloWorld';
import MediaCard from './components/MediaCard';

ReactDOM.render(<HelloWorld/>, document.querySelector('#root'));
ReactDOM.render(<MediaCard titre="my_title" body="loraefgpe gaepignapeog" img_url="https://i.ibb.co/60wg0rw/gift.png"/>, document.querySelector('#root2'));