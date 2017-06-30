<?= $this->Flash->render(); ?>
<?php echo $this->Form->create('Users'); ?>
     <?php
         echo $this->html->image('block.jpg', ['align' => 'left', 'width' => '450']);
         echo $this->html->image('block.jpg', ['align' => 'left', 'width' => '450']);
     ?>
<?php echo $this->Form->end(); ?>