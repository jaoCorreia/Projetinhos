let mongoose = require("mongoose");

const teste = new mongoose.Schema({
    nome: String
})

module.exports = mongoose.model('Teste', teste);