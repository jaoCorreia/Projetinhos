const express = require('express'); 

const mongoose = require('mongoose');

var bodyParser = require('body-parser');

const path = require('path'); 

const app = express(); 

const Noticias = require("./noticias");



mongoose.connect('mongodb+srv://joao:fZyYE9gcSfDrxQl3@cluster0.akn9gdv.mongodb.net/FozCritica?retryWrites=true&w=majority&appName=Cluster0').then(()=>{
    console.log('Conectado no mongo');

}).catch((err)=>{
    console.log(err.message);
})






//i5vxwvSCQDTZZusu

app.use( bodyParser.json()); // le arquivos json 

app.unsubscribe(bodyParser.urlencoded({ //le arquivos url 
    extended : true
}));


app.engine('html', require('ejs').renderFile); 

app.set('view engine', 'html'); 
app.use('/public', express.static(path.join(__dirname, 'public'))); 
app.set('views', path.join(__dirname,  '/views')); 


app.get('/', (req,res)=>{
   
    if(req.query.busca == null){
        //Encontrando dados do mongodb

        Noticias.find({}).then((noticias) => {
            // Imprimindo os documentos

            noticias = noticias.map((val)=>{
                return{
                titulo : val.titulo,
                categoria: val.categoria,
                conteudo: val.conteudo,
                descricao: val.conteudo.substring(0,100),
                slug : val.slug,
                imagem : val.imagem
                }

            })

            res.render('index',{n:noticias, numNoticias: noticias.length});
          });
       
          /*
        Noticias.findOneAndUpdate(
            {
            titulo : "Como estudar bem"//Buscando registro 
            },
            {   //Atualizacao
                conteudo: "lentesque semper accumsan ligula. Fusce porta felis sed enim accumsan hendrerit. placerat"
            },
            {
                new: true, //retorna o doc atualizado
                runValidators: true //validando antes de atualizar
            }).then((noticias) => {
                // Imprimindo os documentos
                console.log(noticias);
              }) .catch(err => {
                console.error(err)
              });
            */
    }else{
       res.render('busca',{});
    }

})


//com slug voce consegue pegar os dados do get

app.get('/:slug', (req,res)=>{
   Noticias.findOneAndUpdate({slug: req.params.slug}, {$inc : {views : 1}}, {new: true, runValidators: true}).then(resposta=>{
        if(resposta != null){
            res.render('single',{noti : resposta});
        }
    }).catch(err=>{
           // console.error(err);
    })

})





app.listen(3000,()=>{
    console.log("no ar"); 
});
