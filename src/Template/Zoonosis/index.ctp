<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Administración de  Zoonosis</h2>
                <?= $this->Flash->render() ?>
                <?= $this->Html->link('Crear Nueva', ['action' => 'add'], ['class' => 'btn btn-sm btn-success']) ?>               
        </div>

        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', ['ID']) ?></th>
                <th><?= $this->Paginator->sort('name', ['Nombre']) ?></th>
                <th><?= $this->Paginator->sort('created', ['Creada']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($zoonosis as $zoonosi): ?>
            <tr>
                <td><?= h($zoonosi->id) ?></td>
                <td><?= h($zoonosi->name) ?></td>
                <td><?= h($zoonosi->created) ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $zoonosi->id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $zoonosi->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $zoonosi->id], ['confirm' =>
                    'Eliminar Zoonosis?', 'class' => 'btn btn-sm btn-danger']) ?>
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

