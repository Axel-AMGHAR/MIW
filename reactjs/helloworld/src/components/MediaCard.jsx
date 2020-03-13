import React from 'react'

const MediaCard = (props) => 
<div>
    <h3>{props.titre}</h3>
    <p>{props.body}</p>
    <img src={props.img_url}></img>
</div>;

export default MediaCard