<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <?= $this->Flash->render() ?>
            <h2>Lista de Facultades</h2>
             <?= $this->Html->link('Nueva Facultad', ['action' => 'add'], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link('Ver Carreras', ['controller' => 'Careers','action' => 'index'], ['class' => 'btn btn-sm btn-info']) ?>
        </div>

        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name', ['Facultades']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($faculties as $faculty): ?>
            <tr>
                <td><?= h($faculty->name) ?></td>
                <td>
                    <?= $this->Html->link('Agregar Carrera', ['controller' => 'Careers', 'action' => 'add', $faculty->id], ['class' => 'btn btn-sm btn-success']) ?>
                    <?= $this->Html->link('Ver Carreras', ['controller' => 'Careers','action' => 'preview', $faculty->id], ['class' => 'btn btn-sm btn-success']) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $faculty->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $faculty->id], ['confirm' =>
                    'Eliminar Facultad?', 'class' => 'btn btn-sm btn-danger']) ?>
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

