<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition[]|\Cake\Collection\CollectionInterface $competitions
 */
?>
<div class="col-lg-12 " >
    <legend><?= __('Competições') ?></legend>
    <table class="table table-striped table-bordered dt-responsive nowrap" id="table1" cellspacing="0" width="100%">
        <thead>
            <tr>                
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>

                <th scope="col"><?= $this->Paginator->sort('Valor de Inscrição') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tipo') ?></th>                
                <th scope="col"><?= $this->Paginator->sort('Número de Rounds') ?></th>              

                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitions as $competition): ?>
                <tr>                
                    <td><?= h($competition->name) ?></td>                
                    <td><?= 'R$ ' . number_format($competition->value, 2, ',', '.'); ?></td>
                    <td><?php
                        switch ($competition->type)
                        {
                            case 0:
                                echo 'Luta';
                                break;
                            case 1:
                                echo 'Forma';
                                break;
                        }
                        ?></td>                
                    <td><?= $this->Number->format($competition->roundnumbers) ?></td>
                    <td class="actions">
                        <?php
                        echo $this->Form->button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-info btn-social-icon btn-lg', 'escape' => false, 'title' => 'Visualizar dados', 'onclick' => "location.href='" . $this->Url->build(['action' => 'view', $competition->id]) . "'"]);

                        //$this->Html->link(__('Visualizar Dados'), ['action' => 'view', $company->id]) 
                        ?>&nbsp;
                        <?php
                        echo $this->Form->button('<i class="fa fa-edit"></i>', ['class' => 'btn btn-warning  btn-social-icon btn-lg  btn-social-icon btn-lg', 'title' => 'Editar', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['action' => 'edit', $competition->id]) . "'"]);

                        // $this->Html->link(__('Editar'), ['action' => 'edit', $company->id]) 
                        ?> &nbsp;
                        <?php
                        echo $this->Form->button('<i class="fa fa-minus-circle"></i>', ['class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'title' => 'Excluir', 'onclick' => "var r = confirm('" . __('Está certo que quer excluir a competição {0}?', $competition->name) . "');if (r == true) {location.href='" . $this->Url->build(['action' => 'delete', $competition->id]) . "';}else{return false;}"]);
                        // $this->Form->postLink(__('Excluir'), ['action' => 'delete', $company->id], ['confirm' => __('Está certo que quer excluir a empresa {0}?', $company->name)]) 
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    echo $this->Form->button('<i class="fa fa-plus-circle"></i>&nbsp;Adicionar', ['class' => 'btn btn-success btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['action' => 'add']) . "'"]);
    ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}}')]) ?></p>
    </div>
</div>