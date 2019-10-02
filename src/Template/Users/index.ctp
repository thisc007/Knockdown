<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="col-lg-12" >
    <legend><?= __('Usuários') ?></legend>
    <table class="table table-striped table-bordered dt-responsive nowrap" id="table1" cellspacing="0" width="100%" >

        <thead>
            <tr>                
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>                
                <th scope="col"><?= $this->Paginator->sort('Sobrenome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E-mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Gênero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Academia') ?></th> 
                <th scope="col"><?= $this->Paginator->sort('Data de nascimento') ?></th> 
                <th scope="col"><?= $this->Paginator->sort('Ativo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Anuidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cid. Nasc') ?></th>                
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>

                    <td><?= h($user->firstname) ?></td>

                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?php
                        switch ($user->gender)
                        {
                            case 0:
                                echo 'Masc';
                                break;
                            case 1:
                                echo 'Fem';
                                break;
                            case 2:
                                echo 'Outro';
                                break;
                        }
                        ?></td>
                    <td><?= $user->has('academy') ? $this->Html->link($user->academy->name, ['controller' => 'Academies', 'action' => 'view', $user->academy->id]) : '' ?></td>
                    <td><?php 
                    $date = new DateTime($user->borndate);
                    echo date_format($date, 'd/m/Y');
                        ?></td>
                    <td><?= $user->active ? __('Sim') : __('Não') ?></td>
                    <td><?= $user->annuity ? __('Paga') : __('Não Paga') ?></td>
                    <td><?= $user->borncity . '/' . $user->state->abbreviation . '(' . $user->country->abbreviation . ')' ?></td>

                    <td class="actions">
                        <?php
                        echo $this->Form->button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-info btn-social-icon btn-lg', 'escape' => false, 'title' => 'Visualizar dados', 'onclick' => "location.href='" . $this->Url->build(['action' => 'view', $user->id]) . "'"]);

                        //$this->Html->link(__('Visualizar Dados'), ['action' => 'view', $company->id]) 
                        ?>&nbsp;
                        <?php
                        echo $this->Form->button('<i class="fa fa-edit"></i>', ['class' => 'btn btn-warning  btn-social-icon btn-lg  btn-social-icon btn-lg', 'title' => 'Editar', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['action' => 'edit', $user->id]) . "'"]);

                        // $this->Html->link(__('Editar'), ['action' => 'edit', $company->id]) 
                        ?> &nbsp;
                        <?php
                        echo $this->Form->button('<i class="fa fa-minus-circle"></i>', ['class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'title' => 'Excluir', 'onclick' => "var r = confirm('" . __('Está certo que quer excluir a federação {0}?', $user->name) . "');if (r == true) {location.href='" . $this->Url->build(['action' => 'delete', $user->id]) . "';}else{return false;}"]);
                        // $this->Form->postLink(__('Excluir'), ['action' => 'delete', $company->id], ['confirm' => __('Está certo que quer excluir a empresa {0}?', $company->name)]) 
                        ?>
                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if($utype > 0)
    {    
        echo $this->Form->button('<i class="fa fa-plus-circle"></i>&nbsp;Adicionar', ['class' => 'btn btn-success btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['action' => 'add']) . "'"]);
    }
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
