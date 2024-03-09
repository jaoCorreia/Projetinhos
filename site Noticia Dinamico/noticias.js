
const mongoose = require("mongoose");



const noticiasSchema = new mongoose.Schema({
    titulo: String, 
    imagem: String, 
    categoria: String,
    conteudo: String,
    slug: String,
    autor: String,
    views: Number

},{collection:"Noticias"});

module.exports = mongoose.model("Noticias", noticiasSchema);

