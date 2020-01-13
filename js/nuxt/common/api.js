import axios from 'axios';

export async function asyncGetData(){
    try {
        const response = await axios.get('http://localhost:3001');
        const { data } = response;
        return data;
    } catch (err) {
        console.error('oh jeez');
        return [];
    }
}