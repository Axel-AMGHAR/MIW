import express from "express";
import routes from "./routes";
import InitDB from "./db";
import bodyParser from "body-parser";

export default async () => {
    try {
        const app = express();
        await InitDB();
        app.use(bodyParser.urlencoded({extended: true}));
        routes(app);
        app.listen(process.env.PORT, () => {
            console.log(process.env.PORT + process.env.NODE_ENV);
        });
    } catch (e) {
        console.error(e);
    }
};
