import { productModel } from '../db/food';

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
            console.log(err.message);
            return res.status(500).json({
                'error': true,
                'message': `Error requesting products ${bar_code}`
            });
        }
    });
}