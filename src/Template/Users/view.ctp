<?php if(isset($current_user['id']) and $current_user['id'] === $user->id || $current_user['role'] === 'admin') : ?>

<div class="well">
<h2><?= $user->username ?></h2>
    <br>
    <dl>
        <dt>Usuario:</dt>
        <dd>
            <?= $user->username ?>
            &nbsp;
        </dd>
        <br>

         <dt>Nombre Completo:</dt>
        <dd>
            <?= $user->full_name ?>
            &nbsp;
        </dd>
        <br>

         <dt>Rol:</dt>
        <dd>
            <?= $user->role ?>
            &nbsp;
        </dd>
        <br>

         <dt>Habilitado:</dt>
        <dd>
            <?= $user->active ? 'SI' : 'NO' ?>
            &nbsp;
        </dd>
        <br>
<?php endif; ?>
<?php if(isset($current_user['id']) and $current_user['id'] != $user->id and $current_user['role'] === 'views') : ?>
    <h2>¡NO PUEDES VER DATOS DE  OTROS USUARIOS! <?= $this->Html->link($current_user['full_name'],
 ['controller' => 'Users', 'action' => 'home', $current_user['id']]) ?> </h2>
<?php endif; ?>

        