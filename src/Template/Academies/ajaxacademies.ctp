<?php
$this->layout = false;

echo $this->Form->control('academies_id', ['options' => $academies, 'empty'=> 'Sem Academia', 'label' => 'Academia', 'class' => 'form-control']);