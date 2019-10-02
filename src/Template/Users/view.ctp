<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
if ($user->active)
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
                <h2 style='text-transform:uppercase'><?php
                    echo $user->firstname . ' ';
                    if (strlen($user->nickname) > 1)
                    {
                        echo '"' . $user->nickname . '" ';
                    }
                    echo $user->lastname;
                    ?></h2>
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
                        

                    </div>
                    <div class="col-lg-10"> 
                        <p><strong><?= __('Nome: ') ?></strong><?= h($user->firstname) ?></p>
                        <p><strong><?= __('Apelido: ') ?></strong><?= h($user->nickname) ?></p>
                        <p><strong><?= __('Sobrenome: ') ?></strong><?= h($user->lastname) ?></p>
                        <p><strong><?= __('E-mail: ') ?></strong><?= h($user->email) ?></p>
                        <p><strong><?= __('Sexo: ') ?></strong><?php
                            switch ($user->gender)
                            {
                                case 0:
                                    echo "Masculino";
                                    break;
                                case 1:
                                    echo "Feminino";
                                    break;
                                case 2:
                                    echo "Outro";
                                    break;
                            }
                            ?></p>
                        <p><strong><?= __('Peso (kg): ') ?></strong><?= $this->Number->format($user->weight) ?></p>
                        <p><strong><?= __('Altura (cm): ') ?></strong><?= $this->Number->format($user->height) ?></p>
                        <p><strong><?= __('Data de Nascimento: ') ?></strong><?= $user->borndate->day . '/' . $user->borndate->month . '/' . $user->borndate->year ?></p>
                        <p><strong><?= __('Cidade de Nascimento: ') ?></strong><?= h($user->borncity) ?> - <?= h($user->state->abbreviation) ?></p>
                        <p><strong><?= __('Academia: ') ?></strong><?= $user->has('academy') ? $this->Html->link($user->academy->name, ['controller' => 'Academies', 'action' => 'view', $user->academy->id]) : '' ?></p>
                        <p><strong><?= __('Data de matrícula: ') ?></strong><?= $user->enrollment_date->day . '/' . $user->enrollment_date->month . '/' . $user->enrollment_date->year ?></p>
                        <p><strong><?= __('Ativo: ') ?></strong><?= $user->active ? __('Sim') : __('Não'); ?></p>
                        <p><strong><?= __('Anidade: ') ?></strong><?= $user->annuity ? __('Pago') : __('Não Pago'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//telefones -->
<div class="row">
    <div class="col-lg-12">
        <?php if (!$phones->isEmpty()): ?>
            <h3 class="subheader"><?= __('Telefones') ?></h3>


            <table class="table table-striped table-bordered dt-responsive nowrap" id="table2" cellspacing="0" width="100%">
                <tr>            
                    <th><?= __('Telefone') ?></th>
                    <th><?= __('Ramal') ?></th>
                    <th><?= __('Tipo') ?></th>            

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


                    </tr>

                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>

<!--//Endereço -->
<div class="row">
    <div class="col-lg-12">
        <?php if (!$addresses->isEmpty()): ?>
            <h3 class="subheader"><?= __('Endereços') ?></h3>        

            <table class="table table-striped table-bordered dt-responsive nowrap" id="table3" cellspacing="0" width="100%">
                <thead>
                    <tr>            
                        <th><?= __('Endereço') ?></th> 
                        <th><?= __('Cidade/UF') ?></th>
                        <th><?= __('CEP') ?></th>                        
                        <th><?= __('Comentário') ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($addresses as $address): ?>
                        <tr>
                            <td><?= ucwords(h($address->addressType)) . ' ' . ucwords(h($address->address)) . ', ' . h($address->number) . ' - ' . ucfirst(h($address->complement)) . ' - ' . ucfirst(h($address->district)) ?></td>
                            <td><?= ucwords(h($address->city)) . '/' . strtoupper(h($address->state)) . ' - ' . strtoupper(h($address->country)) ?></td>
                            <td><?= substr($address->zipcode, 0, 5) . '-' . substr($address->zipcode, 5, 3) ?></td>

                            <td><?= ucfirst(h($address->instructions)) ?></td>


                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>