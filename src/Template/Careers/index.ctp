<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <?= $this->Flash->render() ?>
            <h2>Lista de Carreras</h2>
        </div>

        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name', ['Carreras']) ?></th>
                <th><?= $this->Paginator->sort('faculty_id', ['Facultad']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($careers as $career): ?>
            <tr>
                <td><?= h($career->name) ?></td>
                <td>
                    <?= $career->faculty->name ?>
                </td>
                <td>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $career->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $career->id], ['confirm' =>
                    'Eliminar Carrera?', 'class' => 'btn btn-sm btn-danger']) ?>
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

