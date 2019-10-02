<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Association $association
 */
?>

<div class="panel panel-default">
    <div class="panel-heading"> 
        <h2><?= __('Adicionar Federação') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($association) ?>
        <div class="form-group">
            <?php
            echo $this->Form->control('name', ['label' => 'Nome', 'class' => 'form-control']);
            echo $this->Form->control('alias', ['label' => 'Nome Fantasia', 'class' => 'form-control']);
            echo $this->Form->control('cnpj', ['label' => 'CNPJ', 'class' => 'form-control', /*'onblur' => 'seeRegister(this)'*/]);
            echo $this->Form->control('email', ['label' => 'E-mail', 'class' => 'form-control']);
            ?>
        </div>
        <div class="checkbox">
            <?php
            echo $this->Form->control('active', ['label' => 'Ativo']);
            ?>
        </div>

        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>
        </div>
    </div>
</div>