<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Championship $championship
 */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style='text-transform:uppercase'><?= h($championship->title) ?></h2>
            </div>
            <div class="panel-body">

                <p><strong><?= __('Federação: ') ?></strong><?= $championship->association->name ?></p>
                <p><strong><?= __('Título: ') ?></strong><?= h($championship->title) ?></p>
                <p><strong><?= __('Valor de Inscrição: ') ?></strong><?= 'R$ ' . number_format($championship->value, 2, ',', '.'); ?></p>
                <p><strong><?= __('Período de Inscrição: ') ?></strong><?= $championship->subscriptiondateini->day . '/' . $championship->subscriptiondateini->month . '/' . $championship->subscriptiondateini->year ?> - <?= $championship->subscriptiondateend->day . '/' . $championship->subscriptiondateend->month . '/' . $championship->subscriptiondateend->year ?></p>
                <p><strong><?= __('Data do campeonato: ') ?></strong><?= $championship->championshipdate->day . '/' . $championship->championshipdate->month . '/' . $championship->championshipdate->year ?></p>

            </div>
            <div class="panel-footer">
                <p><strong><?= __('Descrição: ') ?></strong><?= $this->Text->autoParagraph(h($championship->description)); ?></p>
            </div>
        </div>
    </div>
</div>
<!--competições -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="subheader"><?= __('Competições') ?></h3>
        <h5>
            <?php
            echo $this->Form->button('<i class="fa fa-plus-circle "></i> Adicionar competição', ['class' => 'btn btn-primary  btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'championshipcompetitions', 'action' => 'add', $championship->id]) . "'"]);
            ?>
        </h5>
        <?php if (!$sponsors->isEmpty()): ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" id="table2" cellspacing="0" width="100%">
                <tr>            
                    <th><?= __('Nome') ?></th>                    
                    <th><?= __('Tipo') ?></th>            
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>

                <?php foreach ($competitions as $competition): ?>
                    <tr>
                        <td><?= h($competition->name) ?></td>
                        <td>
                            <?php
                            if (($competition->type) == '1')
                            {
                                echo 'Forma';
                            }
                            else if (($competition->type) == '0')
                            {
                                echo 'Luta';
                            }
                            ?>
                        </td>

                        <td class="actions">

                            <?php
                            echo $this->Form->button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-info btn-social-icon btn-lg', 'escape' => false, 'title' => 'Visualizar dados', 'onclick' => "location.href='" . $this->Url->build(['controller' => 'competitions', 'action' => 'view', $competition->id]) . "'"]);

                            //$this->Html->link(__('Visualizar Dados'), ['action' => 'view', $company->id]) 
                            ?>&nbsp;
                            <?php
                            echo $this->Form->button('<i class="fa fa-minus-circle"></i> ', ['title' => 'Excluir', 'class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'onclick' => "var r = confirm('" . __('Você quer apagar a competição?') . "');if (r == true) {location.href='" . $this->Url->build(['controller' => 'championshipcompetitions', 'action' => 'delete', $competition->ccid]) . "';}else{return false;}"]);
                            //$this->Html->link(__('Excluir'), ['controller'=>'Companiesphones','action' => 'delete', $phone->id], ['confirm' => __('Você quer apagar o telefone?')]) 
                            ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
<!--Patrocinadores -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="subheader"><?= __('Patrocinadores, Apoiadores e Parceiros') ?></h3>
        <h5>
            <?php
            echo $this->Form->button('<i class="fa fa-plus-circle "></i> Adicionar patrocinador', ['class' => 'btn btn-primary  btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'championshipsponsors', 'action' => 'add', $championship->id]) . "'"]);
            ?>
        </h5>
        <?php if (!$sponsors->isEmpty()): ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" id="table2" cellspacing="0" width="100%">
                <tr>            
                    <th><?= __('Nome') ?></th>                    
                    <th><?= __('Tipo') ?></th>            
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>

                <?php foreach ($sponsors as $sponsor): ?>
                    <tr>
                        <td><?= h($sponsor->alias) ?></td>
                        <td>
                            <?php
                            if (($sponsor->type) == '1')
                            {
                                echo 'Apoio';
                            }
                            else if (($sponsor->type) == '2')
                            {
                                echo 'Parceria';
                            }
                            else if (($sponsor->type) == '0')
                            {
                                echo 'Patrocínio';
                            }
                            ?>
                        </td>

                        <td class="actions">
                            <?php
                            echo $this->Form->button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-info btn-social-icon btn-lg', 'escape' => false, 'title' => 'Visualizar dados', 'onclick' => "location.href='" . $this->Url->build(['controller' => 'sponsors', 'action' => 'view', $sponsor->id]) . "'"]);

                            //$this->Html->link(__('Visualizar Dados'), ['action' => 'view', $company->id]) 
                            ?>&nbsp;

                            <?php
                            echo $this->Form->button('<i class="fa fa-minus-circle"></i> ', ['title' => 'Excluir', 'class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'onclick' => "var r = confirm('" . __('Você quer apagar o patrocinador?') . "');if (r == true) {location.href='" . $this->Url->build(['controller' => 'championshipsponsors', 'action' => 'delete', $sponsor->csid]) . "';}else{return false;}"]);
                            //$this->Html->link(__('Excluir'), ['controller'=>'Companiesphones','action' => 'delete', $phone->id], ['confirm' => __('Você quer apagar o telefone?')]) 
                            ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>