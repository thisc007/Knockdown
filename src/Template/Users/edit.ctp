<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */


?>
<script>
    $(document).ready(function () {
        $('#bornd').mask('00/00/0000');
    });
    $(document).ready(function () {
        $('#enrolld').mask('00/00/0000');
    });
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
        <h2><?= __('Editar Usuário') ?></h2>
    </div>
    <div class="panel panel-body">
        <?= $this->Form->create($user, ['autocomplete' => 'off']) ?>
        <div class="form-group">
            <?php
            //echo $utype . ' aaaaaaaaaaaa';
            echo $this->Form->control('firstname', ['label' => 'Primeiro Nome', 'class' => 'form-control']);
            echo $this->Form->control('nickname', ['label' => 'Apelido', 'class' => 'form-control']);
            echo $this->Form->control('lastname', ['label' => 'Último Sobrenome', 'class' => 'form-control']);
            echo $this->Form->control('email', ['label' => 'E-mail', 'class' => 'form-control']);
            echo $this->Form->control('gender', ['label' => 'Gênero', 'class' => 'form-control', 'options' => ['0' => 'Masculino', '1' => 'Feminino', '2' => 'Outro']]);

            echo $this->Form->control('bornd', ['id' => 'bornd', 'empty' => true, 'label' => 'Data de Nascimento', 'class' => 'form-control']);
            echo $this->Form->control('weight', ['label' => 'Peso(Kg)', 'class' => 'form-control']);
            echo $this->Form->control('height', ['label' => 'Altura(em centímetros)', 'class' => 'form-control']);
            echo $this->Form->control('enrolld', ['id' => 'enrolld', 'label' => 'Data de Matrícula na academia', 'class' => 'form-control']);
            echo $this->Form->control('borncity', ['label' => 'Cidade de Nascimento', 'class' => 'form-control']);

            echo $this->Form->control('countries_id', ['options' => $countries, 'empty' => 'Escolha', 'label' => 'País', 'class' => 'form-control', 'onchange' => 'state(this.value)', 'required' => true]);
            echo '<div id="state"></div>';
            ?>
        </div>
        <div class="checkbox">
            <?php
            echo $this->Form->control('active', ['label' => 'Ativo']);
            echo $this->Form->control('annuity', ['label' => 'Anuidade paga']);
            ?>
        </div>

        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" disabled="disabled"><i class="fa fa-arrow-circle-right"></i>Atualizar</button></div>
        </div>
    </div>
</div>