import mongoose from 'mongoose';

const commentShema = new mongoose.Schema({
    date: Date,
    title: String,
    text: String,
    food_code: Number
});

export const commentModel = mongoose.model('comment', commentShema, 'comments');

