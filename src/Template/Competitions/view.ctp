<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition $competition
 */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style='text-transform:uppercase'><?= h($competition->name) ?></h2>
            </div>
            <div class="panel-body">

                <p><strong><?= __('Nome: ') ?></strong><?= h($competition->name) ?></p>
                <p><strong><?= __('Idades: ') ?></strong><?= $this->Number->format($competition->minage) ?> - <?= $this->Number->format($competition->maxage) ?> anos</p>
                <p><strong><?= __('Pesos: ') ?></strong><?= $this->Number->format($competition->minweight) ?> Kg - <?= $this->Number->format($competition->maxweight) ?>Kg</p>
                <p><strong><?= __('Tempo de Treino: ') ?></strong><?= $this->Number->format($competition->mintrainingage) ?> - <?= $this->Number->format($competition->maxtrainingage) ?> ano(s)</p>
                <p><strong><?= __('Valor de Inscrição: ') ?></strong><?= 'R$ ' . number_format($competition->value, 2, ',', '.'); ?></p>

                <p><strong><?= __('Número de Árbitros: ') ?></strong><?= $this->Number->format($competition->referees) ?></p>                
                <p><strong><?= __('Tipo: ') ?></strong><?= $competition->type ? __('Luta') : __('Forma'); ?></p>
                <p><strong><?= __('Número de Rounds (somente lutas): ') ?></strong><?= $this->Number->format($competition->roundnumbers) ?></p>
                <p><strong><?= __('Disputa de 3º lugar (somente lutas): ') ?></strong><?= $competition->thirdplace ? __('Sim') : __('Não'); ?></p>
                <p><strong><?= __('Repescagem (somente lutas): ') ?></strong><?= $competition->recap ? __('Sim') : __('Não'); ?></p>
            </div>
        </div>
    </div>
</div>
<!--//telefones -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="subheader"><?= __('Regras') ?></h3>
        <h5>
            <?php
            if ($utype == 2)
                echo $this->Form->button('<i class="fa fa-plus-circle "></i> Vincular regra', ['class' => 'btn btn-primary  btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'competitionrules', 'action' => 'add', $competition->id]) . "'"]);
            ?>
        </h5>
        <?php if (!$rules->isEmpty()): ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" id="table2" cellspacing="0" width="100%">
                <tr>            
                    <th><?= __('Regra') ?></th>                    
                    <th><?= __('Pontuação') ?></th>           
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>

                <?php foreach ($rules as $rule): ?>
                    <tr>
                        <td><?= h($rule->name) ?></td>
                        <td><?php
                            switch ($rule->type)
                            {
                                case 0:
                                    echo 'Falta (-' . $this->Number->format($rule->value) . ' ponto(s))';
                                    break;
                                case 1:
                                    echo 'Pontuação (+' . $this->Number->format($rule->value) . ' ponto(s))';
                                    break;
                                case 2:
                                    echo 'Desclassificação';
                                    break;
                            }
                            ?></td>

                        <td class="actions">
                            <?php
                            echo $this->Form->button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-info btn-social-icon btn-lg', 'escape' => false, 'title' => 'Visualizar dados', 'onclick' => "location.href='" . $this->Url->build(['controller' => 'rules', 'action' => 'view', $rule->id]) . "'"]);

                            //$this->Html->link(__('Visualizar Dados'), ['action' => 'view', $company->id]) 
                            ?>&nbsp;

                            <?php
                            if ($utype == 2)
                                echo $this->Form->button('<i class="fa fa-minus-circle"></i> ', ['title' => 'Excluir', 'class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'onclick' => "var r = confirm('" . __('Você quer apagar o patrocinador?') . "');if (r == true) {location.href='" . $this->Url->build(['controller' => 'competitionrules', 'action' => 'delete', $rule->csid]) . "';}else{return false;}"]);
                            //$this->Html->link(__('Excluir'), ['controller'=>'Companiesphones','action' => 'delete', $phone->id], ['confirm' => __('Você quer apagar o telefone?')]) 
                            ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
