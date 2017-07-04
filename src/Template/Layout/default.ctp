<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Clinica USAM';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'menuSide']) ?>
    <?= $this->Html->script(['jquery-3.2.0.min', 'bootstrap.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
<?php if(isset($current_user)): ?>
    <nav class="main-menu">
            <ul>

                 <li class="has-subnav">
                    <a href="/clinica/users/home">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Inicio
                        </span>
                    </a>
                </li>

                <?php if(isset($current_user['role']) and  $current_user['role'] === 'admin'): ?>
                <li>
                    <a href="/clinica/patients/add">
                        <i class="fa fa-stethoscope fa-2x"></i>
                        <span class="nav-text">
                            Crear Paciente
                        </span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="has-subnav">
                    <a href="/clinica/patients/index">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Listado de Pacientes
                        </span>
                    </a>

                <li>
                    <a href="/clinica/patients/search">
                       <i class="fa fa-search fa-2x"></i>
                        <span class="nav-text">
                            Buscar Paciente
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="/clinica/users/view/<?= $current_user['id'] ?>">
                        <i class="fa fa-user-md fa-2x"></i>
                        <span class="nav-text">
                            Ver Perfil
                        </span>
                    </a>
                </li>

                <?php if(isset($current_user['role']) and $current_user['role'] === 'admin'): ?>
                    <li class="has-subnav">
                        <a href="/clinica/users/edit/<?= $current_user['id'] ?>">
                            <i class="fa fa-medkit fa-2x"></i>
                            <span class="nav-text">
                                Editar mi Perfil
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin'): ?>
                <li>
                   <a href="/clinica/users/index2">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Usuarios
                        </span>
                    </a>
                </li>
            <?php endif; ?>

                <?php if(isset($current_user['role']) and  $current_user['role'] === 'admin'): ?>
                <li class="has-subnav">
                    <a href="/clinica/users/add">
                       <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            Crear Usuario
                        </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isset($current_user['role']) and  $current_user['role'] === 'admin'): ?>
                <li class="has-subnav">
                    <a href="/clinica/symptoms/stats">
                       <i class="fa fa-heart fa-2x"></i>
                        <span class="nav-text">
                            Estadisticas
                        </span>
                    </a>
                </li>
                <?php endif; ?>

            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin'): ?>
                <li>
                   <a href="/clinica/patients/menu">
                        <i class="fa fa-cog fa-2x"></i>
                        <span class="nav-text">
                            Configuración Avanzada
                        </span>
                    </a>
                </li>
            <?php endif; ?>


                <li>
                   <a href="/clinica/users/logout">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Cerrar Sesion
                        </span>
                    </a>
                </li>
        </nav>
    <?php endif; ?>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
