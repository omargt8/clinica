<script>
function soloLetras(e) {
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toString();
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
		especiales = [8, 46, 6, 239]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

		tecla_especial = false
		for(var i in especiales) {
			if(key == especiales[i]) {
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla) == -1 && !tecla_especial){
			return false;
		  }
	}
</script>

<?php if(isset($current_user['id']) and $current_user['id'] === $user->id || $current_user['role'] === 'admin') : ?>

<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Editar Usuario</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($user, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('username', ['label' => 'Usuario']);
                echo $this->Form->input('full_name', ['label' => 'Nombre Completo','onkeypress' => 'return soloLetras(event);']);
                echo $this->Form->input('password', ['label' => 'Contraseña', 'value' => '']);
                //Comprobamos si es Usuario Admin y mostramos un select diferente
                if(isset($current_user['role']) and  $current_user['role'] === 'admin'): 
                echo $this->Form->input('role', ['options' => ['admin' =>
                'Administrador', 'views' => 'Vistas'], 'label' => 'Rol']);
                elseif(isset($current_user['role']) and  $current_user['role'] === 'views'):
                echo $this->Form->input('role', ['options' => ['admin' =>
                'Administrador', 'views' => 'Vistas'], 'label' => 'Rol', 'disabled' => 'true']);
                endif;
                echo $this->Form->input('active', ['label' => 'Activo']);
            ?>
        </fieldset>
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
        <?= $this->Form->end() ?>
    </div>
</div> 
<?php endif; ?>

<?php if(isset($current_user['id']) and $current_user['id'] != $user->id and $current_user['role'] === 'views') : ?>
    <h2>¡NO PUEDES EDITAR OTROS USUARIOS! <?= $this->Html->link($current_user['full_name'],
 ['controller' => 'Users', 'action' => 'home', $current_user['id']]) ?> </h2>
<?php endif; ?>