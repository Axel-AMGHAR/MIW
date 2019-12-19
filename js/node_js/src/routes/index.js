import { productModel } from '../db/food';
import { commentModel } from '../db/comment';

export default (app) => {
    app.get('/', async (req, resp) => {
        try {
            const products = await productModel.find();
            if (products)
                resp.status(200).json(products);
            else 
                resp.status(404).json({
                    'error': true,
                    'message': 'Error requesting products'
                });
        } catch (err){
            console.log(err.message);
            return res.status(500).json({
                'error': true,
                'message': 'Error requesting products'
            });
        }
    });

    app.get('/product/:bar_code', async (req, resp) => {
        const barCode = req.params.bar_code;
        try {
            const products = await productModel.findOne({bar_code:barCode});
            if (products)
                resp.status(200).json(products);
            else 
                resp.status(404).json({
                    'error': true,
                    'message': 'Error requesting products'
                });
        } catch (err){
            return resp.status(500).json({
                'error': true,
                'message': `Error requesting products ${bar_code}`
            });
        }
    });

    app.post('/product', async (req, res) => {
        try{
            const {
                name,
                brand,
                bar_code,
                grade,
                quantity,
                pictures,
                ingredients
            } = req.body;

            const request = new productModel ({
                name,
                brand,
                bar_code,
                grade,
                quantity,
                pictures,
                ingredients
            });
            const inserted = await request.save();

            if (inserted && inserted._id){
                return res.json(inserted);
            } else {
                res.status(500).json({
                    status: 'fail',
                    message: 'Le produit n\'a pas pu être inséré'
                });
            }
        } catch(err){
            return res.status(500).json({
                error: true,
                message: 'Error inserting new product'
            });
        }
    });

    app.get('/comment/:food_code', async (req, res) => {
        const foodCode = req.params.food_code;
        try {
            const comments = await commentModel.find({food_code:foodCode});
            if(comments)
                res.status(200).json(comments);
            else 
                res.status(404).json({
                    'error': true,
                    'message': 'Error requesting comments'
                });
        }catch(err){
            return res.status(500).json({
                'error': true,
                'message': `Error requesting comments of ${foodCode}`
            });
        }
    });

    app.post('/comment', async (req, res) => {
        try{
            const {
                date,
                title,
                text,
                food_code
            } = req.body;

            const request = new commentModel ({
                date,
                title,
                text,
                food_code
            });
            const inserted = await request.save();

            if (inserted && inserted._id){
                return res.json(inserted);
            } else {
                res.status(500).json({
                    status: 'fail',
                    message: 'Le commentaire n\'a pas pu être inséré'
                });
            }
        } catch(err){
            return res.status(500).json({
                error: true,
                message: 'Error inserting new comment'
            });
        }
    });

    app.get('/commentaire/:comment_id', async (req, res) => {
        const commentId = req.params.comment_id;
        try {
            const comment = await commentModel.find({_id:commentId});
            if(comment)
                res.status(200).json(comment);
            else 
                res.status(404).json({
                    'error': true,
                    'message': 'Error requesting comment'
                });
        }catch(err){
            
            return res.status(500).json({
                'error': err,
                'message': `Error requesting comment of ${commentId}`
            });
        }
    });
    
}