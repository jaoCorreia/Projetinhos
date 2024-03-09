const express = require('express'); 
const path = require('path');
const lista = require('./private/Lista');
var bodyParser = require('body-parser');

const app = express(); 


//Renderizando pagina e criando rotas 


app.use( bodyParser.json()); // para suportar Json encoded bodies
app.use( bodyParser.urlencoded({
    extended: true 

})); // para suportar Url encoded bodies 



app.engine('html', require('ejs').renderFile);
app.set('view engine', 'html');
app.use('/public', express.static(path.join(__dirname, 'public'))); 
app.set('views', path.join(__dirname,'/views'));

var Lista = lista.lista;  




//HOME
app.get('/', (req,res)=>{

    res.render('index', {ListaMercado: Lista});

})

//Inserir
app.post('/', (req,res)=>{

    Lista.push(req.body.item);

   res.render('index', {ListaMercado: Lista});


})

//Deletar 

app.get('/deletar/:id', (req,res)=>{
 //   console.log(req.params.id); 

    Lista = Lista.filter((val,index)=>{
        if(index != req.params.id){
            return val;
        };
        res.redirect('/');
    });  

    // res.render('index', {ListaMercado: Lista});
  
});


app.listen(3000,()=>{
    console.log("Servidor no ar");
})