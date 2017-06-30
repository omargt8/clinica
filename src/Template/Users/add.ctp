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

<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Crear Usuario</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($user, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('username', ['label' => 'Usuario']);
                echo $this->Form->input('full_name', ['label' => 'Nombre Completo','onkeypress' => 'return soloLetras(event);']);
                echo $this->Form->input('password', ['label' => 'Contraseña']);
                echo $this->Form->input('role', ['options' => ['admin' =>
                'Administrador', 'views' => 'Vistas'], 'label' => 'Rol']);
                echo $this->Form->input('active', ['label' => 'Activo']);
            ?>
        </fieldset>
        <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
        <?= $this->Form->end() ?>
    </div>
</div> 