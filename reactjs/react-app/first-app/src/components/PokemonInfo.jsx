import React, { useState, useEffect } from 'react';
import axios from 'axios';

const PokemonInfo = ({url}) => {
    const [pokemonInfo, setPokemonInfo] = useState(null);

    useEffect(()=>{
        axios.get(url).then(({data})=>{
            setPokemonInfo(data);
        });
    }, [url]);

    if(pokemonInfo != null)
        return (<>
            <div>Taille : {pokemonInfo.height } </div>

            </>)
    else
        return (<>
            <div>Pas de poquémouns </div>
            </>)
};

export default PokemonInfo;
