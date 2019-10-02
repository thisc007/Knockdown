<?php
$this->layout = false;

echo $this->Form->control('states_id', ['options' => $states,'empty'=> 'Sem Estado/Distrito', 'label' => 'Estado', 'class' => 'form-control']);