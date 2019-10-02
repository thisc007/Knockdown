<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition $competition
 */
?>
<div class="panel panel-default">
    <div class="panel-heading"> 
        <h2><?= __('Editar Competição') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($competition) ?>
        <div class="form-group">
            <?php
            echo $this->Form->control('name', ['label' => 'Nome', 'class' => 'form-control']);
            echo $this->Form->control('minage', ['label' => 'Idade Mínima', 'class' => 'form-control']);
            echo $this->Form->control('maxage', ['label' => 'Idade Máxima', 'class' => 'form-control']);
            echo $this->Form->control('minweight', ['label' => 'Peso Mínimo(caso não queira organização por peso, deixar zerado)', 'class' => 'form-control']);
            echo $this->Form->control('maxweight', ['label' => 'Peso Máximo(caso não queira organização por peso, deixar zerado)', 'class' => 'form-control']);
            echo $this->Form->control('mintrainingage', ['label' => 'Tempo de Treino Mínimo (anos)', 'class' => 'form-control']);
            echo $this->Form->control('maxtrainingage', ['label' => 'Tempo de Treino Máximo (anos)', 'class' => 'form-control']);
            echo $this->Form->control('value', ['label' => 'Valor de inscrição (será somado com o valor de inscrição do campeonato) ', 'class' => 'form-control']);
            echo $this->Form->control('roundnumbers', ['label' => 'Número de Rounds (somente luta)', 'class' => 'form-control']);
            echo $this->Form->control('referees', ['label' => 'Número de Árbitros Laterais', 'class' => 'form-control']);
            //echo $this->Form->control('area', ['label' => 'Razão social', 'class' => 'form-control']);
            echo $this->Form->control('type', ['label' => 'Razão social', 'class' => 'form-control', 'options' => ['0' => 'Luta', '1' => 'Formas']]);
            echo $this->Form->hidden('associations_id', ['value' => $uassociations]);
            ?>
        </div>
        <div class="checkbox">
            <?php
            
            echo $this->Form->control('thirdplace', ['label' => 'Disputa de 3º lugar (somente luta)']);
            echo $this->Form->control('recap', ['label' => 'Repescagem (somente luta)']);
            ?>
        </div>
        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>
        </div>
    </div>
</div>
