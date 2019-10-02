<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
foreach ($rs as $r)
{
    $sing = $r->singularname;
}
?>
<script>
    function state(a)
    {
        //alert('a = ' +  a);
        $.ajax(
                {
                    url: '<?php echo $this->Url->build(['controller' => 'states', 'action' => 'ajaxstate']) ?>/' + a,
                    success: function (result)
                    {
                        document.getElementById('state').innerHTML = result;

                        document.getElementById('btnx').disabled = false;
                        //alert('a = ' + result);
                    }
                });
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><?= __('Endereço de ' . $sing) ?></h2>
    </div>
    <div class="panel-body">
        <?= $this->Form->create($address) ?>
        <div class="form-group">
            <?php
            echo $this->Form->control('address', ['label' => 'Endereço', 'class' => 'form-control']);
            echo $this->Form->control('number', ['label' => 'Número', 'class' => 'form-control']);
            echo $this->Form->control('complement', ['label' => 'Complemento', 'class' => 'form-control']);
            echo $this->Form->control('instructions', ['label' => 'Instruções adicionais', 'class' => 'form-control']);
            echo $this->Form->control('district', ['label' => 'Bairro', 'class' => 'form-control']);
            echo $this->Form->control('city', ['label' => 'Cidade', 'class' => 'form-control']);
            echo $this->Form->control('countries_id', ['options' => $countries, 'empty' => 'Escolha', 'label' => 'País', 'class' => 'form-control', 'onchange' => 'state(this.value)', 'required' => true]);
            echo '<div id="state"></div>';

            echo $this->Form->control('zipcode', ['label' => 'CEP', 'class' => 'form-control']);

            echo $this->Form->hidden('controller', ['value' => $controller]);
            echo $this->Form->hidden('controllerid', ['value' => $controllerid]);
            ?>
        </div>
        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" disabled="disabled"><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>
        </div>
    </div>
</div>