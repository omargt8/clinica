<?= $this->Flash->render(); ?>
<?php echo $this->Form->create('Users'); ?>
     <?php
         echo $this->html->image('unblock.png', ['align' => 'center', 'width' => '550']);
     ?>
<?php echo $this->Form->end(); ?>