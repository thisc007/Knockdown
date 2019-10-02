<?php
foreach($championships as $championship)
{
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style='text-transform:uppercase'><?= h($championship->title) ?></h2>
            </div>
            <div class="panel-body">

                
                <p><strong><?= __('Título: ') ?></strong><?= h($championship->title) ?></p>
                <p><strong><?= __('Período de Inscrição: ') ?></strong><?= $championship->subscriptiondateini->day . '/' . $championship->subscriptiondateini->month . '/' . $championship->subscriptiondateini->year ?> - <?= $championship->subscriptiondateend->day . '/' . $championship->subscriptiondateend->month . '/' . $championship->subscriptiondateend->year ?></p>
                <p><strong><?= __('Data do campeonato: ') ?></strong><?= $championship->championshipdate->day . '/' . $championship->championshipdate->month . '/' . $championship->championshipdate->year ?></p>

            </div>
            <div class="panel-footer">
                <p><strong><?= __('Descrição: ') ?></strong><?= $this->Text->autoParagraph(h($championship->description)); ?></p>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
