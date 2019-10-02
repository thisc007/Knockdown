

<div class="panel panel-yellow">
    <div class="panel-heading"> 
        <h2><?= __('Enviar Arquivo') ?></h2>
    </div>
    <div class="panel-body">
<?= $this->Form->create($archive,['enctype'=>'multipart/form-data','method'=>'POST']) ?>
        <div class="form-group">
        <?php
        //echo $this->Form->input('name');       
        echo $this->Form->hidden('controller',['value'=>$ctrl]);
        echo $this->Form->hidden('controllerId',['value'=>$ctrlid]);
        //echo $this->Form->hidden('MAX_FILE_SIZE',['value'=>'32000000']);
        echo $this->Form->input('userfile',['type'=>'file', 'label'=>'Arquivo (MÁX.: 700KB)', 'class' => 'form-control']);
        //echo $this->Form->input('description', ['label' => 'Descrição', 'class' => 'form-control']);
        echo $this->Html->image('preloader.gif',['id'=>'waiting', 'style'=>'position: absolute;top: 160px;left: 675px;display: none;']);
        ?> 
        
    </div>
        <div class="row">
            <?= $this->Form->end() ?>
            <div class="col-lg-12"><button class='btn btn-danger btn-social' onclick="history.go(-1);return false;"><i class="fa fa-arrow-circle-left"></i>Voltar </button>&nbsp;&nbsp;
                <button id="btnx" class="btn btn-social btn-success" onclick="document.getElementById('waiting').style.display='block'"><i class="fa fa-arrow-circle-right"></i>Inserir</button></div>            
        </div>
    </div>
</div>