<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Championship $championship
 */
?>
<script> 
    $(document).ready(function () {
        $('#subsdateini').mask('00/00/0000');
    });
    $(document).ready(function () {
        $('#subsdateend').mask('00/00/0000');
    });
    $(document).ready(function () {
        $('#champdate').mask('00/00/0000');
    });
    </script>
<div class="panel panel-default">
    <div class="panel-heading"> 
        <h2><?= __('Editar Campeonato') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($championship) ?>
        <div class="form-group">
        <?php
        echo $this->Form->control('title', ['label' => 'Título', 'class' => 'form-control']);
            echo $this->Form->control('description', ['label' => 'Descrição', 'class' => 'form-control']);
            echo $this->Form->control('value', ['label' => 'Valor de inscrição', 'class' => 'form-control']);
            echo $this->Form->hidden('associations_id', ['value' => $uassociations,]);
            echo $this->Form->control('subsdateini', ['id' => 'subsdateini', 'empty' => true, 'label' => 'Data de inscrições (Início)', 'class' => 'form-control']);
            echo $this->Form->control('subsdateend', ['id' => 'subsdateend', 'empty' => true, 'label' => 'Data de inscrições (final)', 'class' => 'form-control']);
            echo $this->Form->control('champdate', ['id' => 'champdate', 'empty' => true, 'label' => 'Data do campeonato', 'class' => 'form-control']);
            
        ?>
    </div>

        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Atualizar</button></div>
        </div>
    </div>
</div>