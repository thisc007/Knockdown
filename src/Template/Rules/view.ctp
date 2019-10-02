<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rule $rule
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style='text-transform:uppercase'><?= h($rule->name) ?></h2>
            </div>
            <div class="panel-body">

                <p><strong><?= __('Nome: ') ?></strong><?= h($rule->name) ?></p>
                <p><strong><?= __('Tipo: ') ?></strong><?php 
                        switch($rule->type) 
                        {
                            case 0:
                                echo 'Falta';
                                $sig = '-';
                                break;
                            case 1:
                                echo 'Pontuação';
                                $sig = '+';
                                break;
                            case 2:
                                echo 'Desclassificatório';
                                $sig = '';
                                break;
                        }
                        ?> </p>
                <p><strong><?= __('Valor: ') ?></strong><?php if ($sig != '') 
                    echo $sig . $this->Number->format($rule->value) . ' ponto(s)';?></p>
            </div>
            <div class="panel-footer"        
                 <p><strong><?= __('Descrição: ') ?></strong></p>
                     <?= $this->Text->autoParagraph(h($rule->description)); ?>
            </div>
        </div>
    </div>
</div>