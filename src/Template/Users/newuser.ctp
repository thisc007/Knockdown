<?php
$this->layout = false;
//echo 'teste';
?><?= $this->Html->css('base.css') ?>
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('bootstrap-social.css') ?>
<?= $this->Html->css('metisMenu.min.css') ?>
<?= $this->Html->css('timeline.css') ?>
<?= $this->Html->css('sb-admin-2.css') ?>
<!-- <?= $this->Html->css('morris.css') ?>-->
<?= $this->Html->css('font-awesome.min.css') ?>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


<!-- jQuery -->
<?= $this->Html->script('jquery.min.js') ?>


<!-- Bootstrap Core JavaScript -->
<?= $this->Html->script('bootstrap.min.js') ?>

<!-- Metis Menu Plugin JavaScript -->
<?= $this->Html->script('metisMenu.min.js') ?>


<!-- Morris Charts JavaScript -->

<!--<?= $this->Html->script('raphael-min.js') ?>
<?= $this->Html->script('morris.min.js') ?>
<?= $this->Html->script('morris-data.js') ?>-->


<!-- Custom Theme JavaScript -->
<?= $this->Html->script('sb-admin-2.js') ?>
<?= $this->Html->script('jquery.mask.js') ?>

<!--VALIDADORES -->
<?= $this->Html->script('valida_cpf_cnpj.js') ?>


<!-- CHARTS -->
<?= $this->Html->script('highcharts.js') ?>
<?= $this->Html->script('exporting.js') ?>
<?= $this->Html->css('bootstrap-datetimepicker.min.css') ?>
<script> 
$(document).ready(function(){
  $('#bornd').mask('00/00/0000');
  });
</script>

    <div class="panel panel-yellow">
    <div class="panel-heading"> 
        <h2><?= __('Adicionar Usuário') ?></h2>
    </div>
    <div class="panel-body">
        <?= $this->Form->create($user) ?>
        <div class="form-group">
            <?php
            echo $this->Form->control('firstname', ['label' => 'Primeiro Nome', 'class' => 'form-control']);            
            echo $this->Form->control('lastname', ['label' => 'Último Nome', 'class' => 'form-control']);
            echo $this->Form->control('email', ['label' => 'E-mail', 'class' => 'form-control']);
            echo $this->Form->control('gender', ['label' => 'Sexo (gênero)', 'class' => 'form-control', 'options' => [0 => 'Masculino', 1 => 'Feminino', 2 => 'Outro']]);            
            echo $this->Form->control('academies_id', ['label' => 'Academia', 'class' => 'form-control', 'options' => $academies]);
            //echo $this->Form->control('borndate', ['label' => 'Data de Nascimento', 'class' => 'form-control','empty' => true]);
echo $this->Form->control('bornd', ['id'=>'bornd','label' => 'Data de Nascimento', 'class' => 'form-control','empty' => true,]);            
            echo $this->Form->control('password', ['label' => 'Senha', 'maxlength' => 20,'class' => 'form-control']);
            echo $this->Form->control('password1', ['type' =>'password', 'maxlength' => 20, 'label' => 'Confirmar Senha', 'class' => 'form-control']);
            echo $this->Form->control('borncity', ['label' => 'Cidade de Nasc.', 'class' => 'form-control']);
            echo $this->Form->control('countries_id', ['options' => $countries, 'empty' => true, 'label' => 'País de Nasc.', 'class' => 'form-control']);
                                                     
            ?>
        </div>
        <div class="checkbox">
            <?php
            echo $this->Form->input('active', ['label' => 'Ativo']);
            ?>
        </div>
        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>
        </div>
    </div>
</div>
<script>
jQuery(function ($) {
        $("#bornd").datetimepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            language: 'pt-BR',
            minView: 2,
            dateonly: true
        });
    })
</script>