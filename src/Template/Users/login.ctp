<?= $this->Html->css('login')  ?>
<?= $this->Flash->render('auth') ?>
 <?= $this->Flash->render() ?>

<div class="login">
	<h1>Ingrese sus datos</h1>
    <?= $this->Form->create() ?>

        <?= $this->Form->input('username', ['placeholder' => 'Usuario', 'label' => false, 'required']) ?>
        <?= $this->Form->input('password', ['placeholder' => 'Contraseña', 'label' => false, 'required']) ?>
        <?= $this->Form->button('Ingresar', ['class' => 'btn btn-primary btn-block btn-large'])  ?>

    <?= $this->Form->end() ?>
</div>