<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rule $rule
 */
?>
<div class="panel panel-default">
    <div class="panel-heading"> 
        <h2><?= __('Editar Regra') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($rule) ?>
        <div class="form-group">
            <?php
            echo $this->Form->control('name', ['label' => 'Nome da regra', 'class' => 'form-control']);
            echo $this->Form->control('description', ['label' => 'Descrição/Definição', 'class' => 'form-control']);
            echo $this->Form->control('type', ['label' => 'Tipo', 'class' => 'form-control', 'options' => ['0' => 'Falta', '1' => 'Pontuação','2' => 'Desclassificatório']]);
            echo $this->Form->control('value', ['label' => 'Pontuação (se for falta, considere como ponto negativo)', 'value' => '0.00','step'=>'0.01', 'min'=>"0", 'class' => 'form-control']);
            echo $this->Form->hidden('associations_id', ['value' => $uassociations])
            ?>
        </div>

        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Atualizar</button></div>
        </div>
    </div>
</div>