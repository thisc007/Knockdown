<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Championshipsponsor $championshipsponsor
 */
?>
<div class="panel panel-default">
    <div class="panel-heading"> 
        <h2><?= __('Vincular Patrocinador') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($championshipsponsor) ?>
        <div class="form-group">
            <?php
            echo $this->Form->hidden('championships_id', ['value' => $championship]);
            echo $this->Form->control('sponsors_id', ['options' => $sponsors, 'label' => 'Patrocinador', 'class' => 'form-control']);
            echo $this->Form->control('type', ['label' => 'Tipo', 'class' => 'form-control', 'options' => ['0' => 'Patrocinador', '1' => 'Apoiador', '2' => 'Parceria']]);
            ?>
        </div>

        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>
        </div>
    </div>
</div>