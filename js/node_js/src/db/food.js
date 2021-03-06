import mongoose from 'mongoose';

const foodShema = new mongoose.Schema({
    name: String,
    brand: String,
    bar_code: Number,
    grade: Number,
    pictures: [String],
    quantity: Number,
    ingredients: [Object]
});

export const productModel = mongoose.model('product', foodShema, 'products');

