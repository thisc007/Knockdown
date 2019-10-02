<?php
$this->layout = false;
?>
<title>Supervisor - Dashboard</title>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('bootstrap-social.css') ?>
<?= $this->Html->css('metisMenu.min.css') ?>
<?= $this->Html->css('timeline.css') ?>
<?= $this->Html->css('sb-admin-2.css') ?>
<!-- <?= $this->Html->css('morris.css') ?>-->
<?= $this->Html->css('font-awesome.min.css') ?>


<!-- Bootstrap Core JavaScript -->
<?= $this->Html->script('bootstrap.min.js') ?>

<!-- Metis Menu Plugin JavaScript -->
<?= $this->Html->script('metisMenu.min.js') ?>


<!-- Morris Charts JavaScript -->
<?= $this->Html->script('raphael-min.js') ?>
<!--<?= $this->Html->script('morris.min.js') ?>
<?= $this->Html->script('morris-data.js') ?>-->


<!-- Custom Theme JavaScript -->
<?= $this->Html->script('sb-admin-2.js') ?>
<style>
    body{
        background-color: white;
    }
</style>
<div class="row">
    <div class="col-lg-12"> 
        <?= $this->Flash->render() ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8"> 
        <div class="panel panel-yellow">
            <div class="panel-heading"> 
                <h2><?= __('Alterar Senha') ?></h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($user) ?>
                <div class="form-group">
                    <?php
                    echo $this->Form->hidden('name', ['value' => $user->name]);
                    echo $this->Form->hidden('nickname', ['value' => $user->nickname]);
                    echo $this->Form->hidden('email', ['value' => $user->email]);
                    echo $this->Form->hidden('login', ['value' => $user->login]);
                    echo $this->Form->input('password', ['label' => 'Senha', 'maxlength' => 20, 'value' => '', 'type' => 'password', 'class' => 'form-control']);
                    echo $this->Form->input('passwordm', ['type' => 'password', 'label' => 'Repetir Senha', 'maxlength' => 20, 'value' => '', 'class' => 'form-control']);
                    echo $this->Form->hidden('secondaryemail', ['value' => $user->secondaryemail]);
                    // echo $this->Form->input('companies_id', ['options' => $companies, 'class'=>'form-control']);

                    echo $this->Form->hidden('active', ['value' => $user->active]);
                    ?>
                </div>
                <div class="row">
                    <?= $this->Form->end() ?>
                               
                    <div class="col-lg-12"><button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Atualizar</button></div>
                </div>
            </div>
        </div>
    </div>