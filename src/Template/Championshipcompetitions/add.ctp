<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Championshipcompetition $championshipcompetition
 */
?>
<div class="panel panel-default">
    <div class="panel-heading"> 
        <h2><?= __('Vincular competição') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($championshipcompetition) ?>
        <div class="form-group">
            <?php
            echo $this->Form->hidden('championships_id', ['value' => $championships]);
            echo $this->Form->control('competitions_id', ['options' => $competitions, 'label' => 'Competição', 'class' => 'form-control']);
            ?>
        </div>

        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>
        </div>
    </div>
</div>
