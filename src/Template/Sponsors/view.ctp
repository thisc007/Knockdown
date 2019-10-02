<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
if ($sponsor->active)
{
    $style = "green";
}
else
{
    $style = "red";
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-<?= $style ?>">
            <div class="panel-heading">
                <h2 style='text-transform:uppercase'><?= h($sponsor->name) ?></h2>
            </div>
            <div class="panel-body">
                <div class="row" >
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="thumbnail">
                                    <?php
                                    if ($pics->isEmpty())
                                    {
                                        echo $this->Html->image('defaultprof.jpg', ['class' => 'portrait']);
                                    }
                                    else
                                    {
                                        foreach ($pics as $pi)
                                        {
                                            $desc = $pi->description;
                                            $type = $pi->type;
                                            $archive = $pi->content;
                                        }
                                        echo '<img alt="' . $desc . '" src="data:' . $type . ';base64,' . $archive . '" class="portrait" />';
                                    }
                                    ?>
                                </div>
                            </div>                    
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                echo $this->Form->button('<i class="fa fa-camera-retro"></i> Alterar Foto', ['class' => 'btn btn-link', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'files', 'action' => 'addpic', '?' => ['ctrl' => $this->request->params['controller'], 'ctrlid' => $sponsor->id]]) . "'"]);
                                ?>
                            </div>                    
                        </div>

                    </div>
                    <div class="col-lg-10">
                        <p><strong><?= __('Razão Social: ') ?></strong><?= h($sponsor->name) ?></p>
                        <p><strong><?= __('Nome Fantasia: ') ?></strong><?= h($sponsor->alias) ?></p>
                        <p><strong><?= __('CNPJ: ') ?></strong><?= h($sponsor->cnpj) ?></p>
                        <p><strong><?= __('E-mail: ') ?></strong><?= h($sponsor->email) ?></p>
                        <p><strong><?= __('Federação: ') ?></strong><?= $sponsor->has('association') ? $this->Html->link($sponsor->association->name, ['controller' => 'Associations', 'action' => 'view', $sponsor->association->id]) : '' ?></p>
                        <p><strong><?= __('Ativo: ') ?></strong><?= $sponsor->active ? __('Sim') : __('Não'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--//telefones -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="subheader"><?= __('Telefones') ?></h3>
        <h5>
            <?php
            echo $this->Form->button('<i class="fa fa-plus-circle "></i> Adicionar Telefone', ['class' => 'btn btn-primary  btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'phones', 'action' => 'add', '?' => ['controller' => 'sponsors', 'controllerid' => $sponsor->id, 'action' => 'view']]) . "'"]);
            ?>
        </h5>
        <?php if (!$phones->isEmpty()): ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" id="table2" cellspacing="0" width="100%">
                <tr>            
                    <th><?= __('Telefone') ?></th>
                    <th><?= __('Ramal') ?></th>
                    <th><?= __('Tipo') ?></th>            
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>

                <?php foreach ($phones as $phone): ?>
                    <tr>
                        <td><?= '(+' . h($phone->countrycode) . ' ' . h($phone->areacode) . ') ' . h($phone->number) ?></td>
                        <td><?= h($phone->extension) ?></td>
                        <td>
                            <?php
                            if (($phone->type) == '1')
                            {
                                echo 'Comercial';
                            }
                            else if (($phone->type) == '2')
                            {
                                echo 'Móvel';
                            }
                            else if (($phone->type) == '0')
                            {
                                echo 'Residencial';
                            }
                            ?>
                        </td>

                        <td class="actions">

                            <?php
                            echo $this->Form->button('<i class="fa fa-edit"></i> ', ['title' => 'Editar', 'class' => 'btn btn-warning  btn-social-icon btn-lg', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'phones', 'action' => 'edit', $phone->id, '?' => ['controller' => 'sponsors', 'controllerid' => $sponsor->id]]) . "'"]);

                            //$this->Html->link(__('Editar'), ['controller'=>'Companiesphones','action' => 'edit', $phone->id]) 
                            ?>&nbsp;
                            <?php
                            echo $this->Form->button('<i class="fa fa-minus-circle"></i> ', ['title' => 'Excluir', 'class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'onclick' => "var r = confirm('" . __('Você quer apagar o telefone?') . "');if (r == true) {location.href='" . $this->Url->build(['controller' => 'phones', 'action' => 'delete', $phone->id, '?' => ['controller' => 'sponsors', 'controllerid' => $sponsor->id, 'action' => 'view']]) . "';}else{return false;}"]);
                            //$this->Html->link(__('Excluir'), ['controller'=>'Companiesphones','action' => 'delete', $phone->id], ['confirm' => __('Você quer apagar o telefone?')]) 
                            ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>

<!--//Endereço -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="subheader"><?= __('Endereços') ?></h3>
        <h5>

            <?php
            echo $this->Form->button('<i class="fa fa-plus-circle"></i> Adicionar Endereço', ['class' => 'btn btn-primary  btn-social  btn-social', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'addresses', 'action' => 'add', '?' => ['controller' => 'sponsors', 'controllerid' => $sponsor->id, 'action' => 'view']]) . "'"]);
            ?>

        </h5>
        <?php if (!$addresses->isEmpty()): ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" id="table3" cellspacing="0" width="100%">
                <thead>
                    <tr>            
                        <th><?= __('Endereço') ?></th> 
                        <th><?= __('Cidade/UF') ?></th>
                        <th><?= __('CEP') ?></th>                        
                        <th><?= __('Comentário') ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($addresses as $address): ?>
                        <tr>
                            <td><?= ucwords(h($address->addressType)) . ' ' . ucwords(h($address->address)) . ', ' . h($address->number) . ' - ' . ucfirst(h($address->complement)) . ' - ' . ucfirst(h($address->district)) ?></td>
                            <td><?= ucwords(h($address->city)) . '/' . strtoupper(h($address->state)) . ' - ' . strtoupper(h($address->country)) ?></td>
                            <td><?= substr($address->zipcode, 0, 5) . '-' . substr($address->zipcode, 5, 3) ?></td>

                            <td><?= ucfirst(h($address->instructions)) ?></td>

                            <td class="actions">
                                <?php
                                echo $this->Form->button('<i class="fa fa-edit"></i> ', ['title' => 'Editar', 'class' => 'btn btn-warning  btn-social-icon btn-lg', 'escape' => false, 'onclick' => "location.href='" . $this->Url->build(['controller' => 'addresses', 'action' => 'edit', $address->id, '?' => ['controller' => 'sponsors', 'controllerid' => $sponsor->id, 'action' => 'view']]) . "'"]);

                                //$this->Html->link(__('Editar'), ['controller'=>'Companiesaddresses','action' => 'edit', $address->id]) 
                                ?>&nbsp;
                                <?php
                                echo $this->Form->button('<i class="fa fa-minus-circle"></i> ', ['title' => 'Excluir', 'class' => 'btn btn-danger btn-social-icon btn-lg', 'escape' => false, 'onclick' => "var r = confirm('" . __('Você quer apagar o endereço?') . "');if (r == true) {location.href='" . $this->Url->build(['controller' => 'addresses', 'action' => 'delete', $address->id, '?' => ['controller' => 'sponsors', 'controllerid' => $sponsor->id, 'action' => 'view']]) . "';}else{return false;}"]);
                                //$this->Html->link(__('Excluir'), ['controller'=>'Companiesaddresses','action' => 'delete', $address->id], ['confirm' => __('Você quer apagar o endereço?')]) 
                                ?>

                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>