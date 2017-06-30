<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Lista de Usuarios</h2>
            <?= $this->Flash->render() ?>
        </div>
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username', ['Usuario']) ?></th>
                <th><?= $this->Paginator->sort('full_name', ['Nombre Completo']) ?></th>
                <th><?= $this->Paginator->sort('role', ['Rol']) ?></th>
                <th><?= $this->Paginator->sort('active', ['Activo']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->full_name) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= $this->Number->format($user->active) ? 'SI' : 'NO' ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $user->id], ['confirm' =>
                    'Eliminar Usuario?', 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>

          <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< Anterior') ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next('Siguiente >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>

