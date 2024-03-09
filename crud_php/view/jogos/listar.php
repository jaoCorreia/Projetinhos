<?php
include_once(__DIR__."/../../controller/JogoController.php");
include_once(__DIR__."/../../controller/ConsoleController.php");

$jogoCont = new JogoController();
$jogos = $jogoCont->listar();
$console =  new Console();

?>

<?php
include_once(__DIR__."/../include/header.php");
?>

<h3>Listagem de jogos</h3>

<div>
    <a   href="inserir.php">
<button  type="submit" class="col-md-2 btn btn-secondary">Inserir</button></a>
</div>

<table class="table" border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Preço</td>
            <td>Ano</td>
            <td>Console</td>
            <td>Classificação Etária</td>
            <td>Gênero</td>
            <td></td>
            <td></td>
        </tr>
    </thead>

    <tbody>
        <?php foreach($jogos as $j):?>
            <tr>
                <td> <?= $j->getId() ?></td>
                <td> <?= $j->getNome() ?></td>
                <td> <?= $j->getPreco() ?></td>
                <td> <?= $j->getAno() ?></td>
                <td> <?= $j->getConsole() ?>
                    <?php //if($j->getConsole()->getFabricante()) echo " (".$j->getConsole()->getFabricante().")"?>
            </td>
                <td> <?= $j->getEtario()->getNome() ?></td>
                <td> <?= $j->getGenero()->getNome() ?></td>
                <td>
                    <a href="alterar.php?id=<?=$j->getId()?>">
                        <img src="../../img/btn_editar.png">
                    </a>
                </td>
                <td>
                    <a href="excluir.php?id=<?=$j->getId()?>"
                       onclick="return confirm('confirma a exclusão?');">
                        <img src="../../img/btn_excluir.png">
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>

</table>

<?php
include_once(__DIR__."/../include/footer.php");
?>