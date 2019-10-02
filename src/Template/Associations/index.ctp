<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Association[]|\Cake\Collection\CollectionInterface $associations
 */
?>

<div class="col-lg-12 " >
    <legend>Federações</legend>
    <table class="table table-striped table-bordered dt-responsive nowrap" id="table1" cellspacing="0" width="100%">
        <thead>
            <tr>                
                <th scope="col"><?= $this->Paginator->sort('Razão') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fantasia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CNPJ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E-mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($associations as $association): ?>
                <tr>

                    <td><?= h($association->name) ?></td>
                    <td><?= h($association->alias) ?></td>
                    <td><?= h($association->cnpj) ?></td>
                    <td><?= h($association->email) ?></td>
                    <td><?php
                        if (($association->active) == 1)
                        {
                            echo 'ATIVO';
                        }
                        else
                        {
                            echo 'INATIVO';
                        }
                        ?>
                    </td>
                    <td class="actions">
                        <?php
                        echo $this->Form->button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-info btn-social-icon btn-lg', 'escape' => false, 'title' => 'Visualizar dados', 'onclick' => "location.href='" . $this->Url->build(['action' => 'view', $association->id]) . "'"]);

                        //$this->Html->link(__('Visualizar Dados'), ['action' => 'view', $company->id]) 
                        ?>&nbsp;
                        <?php
                        echo $this->Form->button('<i class="fa fa-edit"></i>', ['class' => 'btn btn-warning  btn-social-icon btn-lg  btn-social-icon btn-lg', 'title' => 'Editar', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['action' => 'edit', $association->id]) . "'"]);

                        // $this->Html->link(__('Editar'), ['action' => 'edit', $company->id]) 
                        ?> &nbsp;
                        <?php
                        if ($utype == 3)
                        {
                            echo $this->Form->button('<i class="fa fa-minus-circle"></i>', ['class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'title' => 'Excluir', 'onclick' => "var r = confirm('" . __('Está certo que quer excluir a federação {0}?', $association->name) . "');if (r == true) {location.href='" . $this->Url->build(['action' => 'delete', $association->id]) . "';}else{return false;}"]);
                            // $this->Form->postLink(__('Excluir'), ['action' => 'delete', $company->id], ['confirm' => __('Está certo que quer excluir a empresa {0}?', $company->name)]) 
                        }
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
