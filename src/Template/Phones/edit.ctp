<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone $phone
 */

foreach ($rs as $r)
{
    $sing = $r->singularname;
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2><?= __('Telefone de ' . $sing) ?></h2>
    </div>
    <div class="panel-body"> 
        <?= $this->Form->create($phone) ?>
        <div class="form-group">
        <?php
        echo $this->Form->control('countrycode', ['options' => ['55' => '+55  Brasil - BR',
                '1' => '+1  Estados Unidos (EUA) - US',
                '54' => '+54  Argentina - AR',
                '52' => '+52  México - MX',
                '49' => '+49  Alemanha - DE',
                '61' => '+61  Austrália - AU',
                '43' => '+43  Áustria - AT',
                '32' => '+32  Bélgica - BE',
                '591' => '+591  Bolívia - BO',
                
                '56' => '+56  Chile - CL',
                '86' => '+86  China - CN',
                '65' => '+65  Cingapura - SG',
                '57' => '+57  Colômbia - CO',
                '82' => '+82  Coreia do Sul - KR',
                '45' => '+45  Dinamarca - DK',
                '593' => '+593  Equador - EC',
                '34' => '+34  Espanha - ES',
                '33' => '+33  França - FR',
                '852' => '+852  Hong Kong - HK',
                '36' => '+36  Hungria - HU',
                '91' => '+91  India - IN',
                '62' => '+62  Indonésia - ID',
                '44' => '+44  Inglaterra (Reino Unido) - GB',
                '353' => '+353  Irlanda - IE',
                '354' => '+354  Islândia - IS',
                '972' => '+972  Israel - IL',
                '39' => '+39  Itália - IT',
                '81' => '+81  Japão - JP',
                '47' => '+47  Noruega - NO',
                '64' => '+64  Nova Zelândia - NZ',
                '31' => '+31  Países Baixos - NL',
                '507' => '+507  Panamá - PA',
                '595' => '+595  Paraguai - PY',
                '51' => '+51  Peru - PE',
                
                '351' => '+351  Portugal - PT',
                '7' => '+7  Rússia - RU',
                '41' => '+41  Suiça - CH',
                '597' => '+597  Suriname - SR',
                '886' => '+886  Taiwan - TW',
                '90' => '+90  Turquia - TR',
                '598' => '+598  Uruguai - UY'
            ], 'label' => 'Código de área Internacional', 'class' => 'form-control']);
        echo $this->Form->control('areacode', ['label' => 'Código de Área Local', 'class' => 'form-control']);
        echo $this->Form->control('number', ['label' => 'Número', 'class' => 'form-control']);
        echo $this->Form->control('extension', ['label' => 'Ramal', 'class' => 'form-control']);
        echo $this->Form->control('type', ['options' => ['1' => 'Comercial', '0' => 'Residencial', '2' => 'Móvel'], 'label' => 'Tipo de Telefone', 'class' => 'form-control']);      
        ?>
    </div>
        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" ><i class="fa fa-arrow-circle-right"></i>Alterar</button></div>
        </div>
    </div>
</div>
