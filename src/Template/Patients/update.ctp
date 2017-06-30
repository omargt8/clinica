<?= $this->Flash->render(); ?>
<?php echo $this->Form->create('Patients'); ?>
    <?php echo $this->html->image('actualizacion.jpg', ['align' => 'left', 'width' => '450'])?>
     <?php
        $fecha = "Actualizado  " . date("d") .  "/" . date("m") . "/" . date("Y");
     ?>
     <h2><?php echo $fecha; ?></h2>
    <?php echo $this->html->image('actualizacion.jpg', ['align' => 'right'])?>
<?php echo $this->Form->end(); ?>