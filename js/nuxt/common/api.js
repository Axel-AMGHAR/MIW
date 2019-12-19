import axios from 'axios';

export async function asyncGetData(){
    try {
        const response = axios.get('http://localhost:3001/get');
        return response;
    } catch (err) {
        console.error('oh jeez');
        return [];
    }
}