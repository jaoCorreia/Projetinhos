<?php
include_once(__DIR__."/../../controller/ConsoleController.php");
include_once(__DIR__."/../../controller/EtarioController.php");
include_once(__DIR__."/../../controller/GeneroController.php");

$consoleCont = new ConsoleController();
$consoles = $consoleCont->listar();

$etarioCont = new EtarioController();
$etarios = $etarioCont->listar();

$generoCont = new GeneroController();
$generos = $generoCont->listar();

?>

<?php
include_once(__DIR__."/../include/header.php");
?>

<h3 class="text-center"><?php echo ($jogo && $jogo->getId() > 0 ? 'Alterar ':'Inserir ')?>Jogo</h3>

<a  href="listar.php">
<button  type="submit" class="col-md-2 btn btn-secondary">Voltar</button></a>

<form method="POST" action="" class="row g-3" style="padding: 10px;">



    <div class="mb-3 col-md-6">

        <label for="inpNome" class="form-label">Nome:</label>

        <input class="form-control" type="text" name="nome" id="inpNome" 
               value="<?php echo ($jogo ? $jogo->getNome():'');?>">
    </div>

  
    <div  class="mb-3 col-md-6">

    <label  class="form-label" for="inpAno">Ano de lançamento:</label>
        
        <input  class="form-control" type="number" name="ano" id="inpAno" min="0" 
               value="<?php echo ($jogo ? $jogo->getAno():'');?>">
               
    </div>

    <div  class="mb-3 col-md-6">
        <label class="form-label" for="inpPreco">Preço:</label>

        <input class="form-control" type="number" name="preco" id="inpPreco" min="0" step=".01" 
               value="<?php echo ($jogo ? $jogo->getPreco():'');?>">
    </div>

    <div class="mb-3 col-md-2">
        <label for="inpConsole" class="form-label">Console:</label>
        <select  class="form-select form-select-md" name="console" id="inpConsole">

            <option value="">---Selecione---</option>
            <?php foreach($consoles as $co):?>
                <option value=  "<?=$co->getId()?>" 
                <?php if($jogo && $jogo->getConsole() && $jogo->getConsole()->getId() == $co->getId())
                            echo 'selected';?>   >
                    <?= $co->getNome()?>
                    <?php if($co->getFabricante()) echo "(".$co->getFabricante().")"?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <div  class="mb-3 col-md-2">
        <label for="inpEtario" class="form-label">Classificação Etária:</label>
        <select class="form-select form-select-md" name="etario" id="inpEtario">

            <option value="">---Selecione---</option>
            <?php foreach($etarios as $et):?>
                <option value=  "<?=$et->getId()?>" 
                <?php if($jogo && $jogo->getEtario() && $jogo->getEtario()->getId() == $et->getId())
                            echo 'selected';?>   >
                    <?= $et->getNome()?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <div  class="mb-3 col-md-2">
        <label for="inpGenero" class="form-label">Gênero:</label>
        <select class="form-select form-select-md" name="genero" id="inpGenero">

            <option value="">---Selecione---</option>
            <?php foreach($generos as $ge):?>
                <option value=  "<?=$ge->getId()?>" 
                <?php if($jogo && $jogo->getGenero() && $jogo->getGenero()->getId() == $ge->getId())
                            echo 'selected';?>   >
                    <?= $ge->getNome()?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <button  type="submit" class="col-md-6 btn btn-success">Gravar</button>
    

    <button type="reset" class=" col-md-6 btn btn-danger">Limpar</button>

    <input type="hidden" name="id_jogo" value="<?php echo($jogo ? $jogo->getId(): '') ?>">
    <input type="hidden" name="submetido" value="1">

</form>

<?php if($msgErros): ?>
<div class="col-md-12">
        <?=$msgErros?>
        </div>

<?php endif;?>
 



<?php
include_once(__DIR__."/../include/footer.php");
?>