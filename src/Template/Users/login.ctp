<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Knockdown - Bem-Vindo!</title>

        <!-- Bootstrap Core CSS -->
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('bootstrap-social.css') ?>
        <!-- MetisMenu CSS -->
        <?= $this->Html->css('metisMenu.min.css') ?>

        <!-- Custom CSS -->
        <?= $this->Html->css('sb-admin-3.css') ?>

        <!-- Custom Fonts -->
        <?= $this->Html->css('font-awesome.min.css') ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel">
                        <div class="panel-heading logo" align="center">
                            <?= $this->Html->image('logo.png', ['class' => 'logo', 'style' => 'width: 85px;height: auto;']) ?>
                        </div>
                        <div class="panel-body">
                            <?= $this->Flash->render() ?>
                            <?= $this->Flash->render('auth') ?>
                            <?= $this->Form->create() ?>
                            <fieldset>
                                <div class="form-group">
                                    <?= $this->Form->input('email', ['placeholder' => 'E-mail', 'autofocus', 'class' => 'form-control', 'label' => '']) ?>

                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('password', ['placeholder' => 'Senha', 'class' => 'form-control', 'label' => '']) ?>

                                </div>

                                <?php
                                echo $this->Form->button('<i class="fa fa-sign-in"></i>Entrar', ['class' => 'btn btn-lg btn-primary  btn-block btn-social', 'escape' => false/* , 'onclick' => "location.href='".$this->Url->build( [ 'controller'=>'Users','action' => 'login'])."'" */]);
                                $this->Form->end()
                                ?>


                            </fieldset>
                            <br>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <?= $this->Html->script('jquery.min.js') ?>

        <!-- Bootstrap Core JavaScript -->
        <?= $this->Html->script('bootstrap.min.js') ?>

        <!-- Metis Menu Plugin JavaScript -->
        <?= $this->Html->script('metisMenu.min.js') ?>

        <!-- Custom Theme JavaScript -->
        <?= $this->Html->script('sb-admin-2.js') ?>

    </body>

</html>
