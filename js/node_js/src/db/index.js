import mongoose from "mongoose";

const connect = () => {
    mongoose.connect("mongodb://localhost:27017/yuka-miw", {
        autoReconnect: true,
        useNewUrlParser: true
    });
};

export let db;

export default () => {
    return new Promise((resolve, reject) => {
        //code asynchrone 
        db = mongoose.connection;
        db.on('connecting', () => {
            console.log('Connextion to Mongo');
        });

        db.on('error', (err) => {
            mongoose.disconnect;
            reject(err);
            throw new Error(err);
        });

        db.once('open', () => {
            console.log('Connecté à Mongo!');
            resolve();
        });

        db.on('disconnected', () => {
            setTimeout( () => {
                try{
                    connect();
                } catch(e){
                    throw new Error('Cannot reconnect');
                } 
            },5000);
        });
        connect();
    });
}
