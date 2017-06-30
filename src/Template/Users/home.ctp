<style>
    body{
        background: aliceblue;
    }
</style>



<br><br><br>
 <div class="text-center">
 <h2>Bienvenido <?= $this->Html->link($current_user['full_name'],
 ['controller' => 'Users', 'action' => 'view', $current_user['id']]) ?> </h2>
 <p><h4>
    Sistema de Administración de Expediente Clinico.
 </h4></p>
 <?php echo $this->html->image('USAM.png', ['align' => 'center'])?>
 </div>