<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <?= $this->Flash->render() ?>
            <h2>Lista de Facultades Borradas</h2>
            <?= $this->Html->link('Facultades', ['action' => 'add'], ['class' => 'btn btn-sm btn-info disabled', 'disabled']) ?>
            <?= $this->Html->link('Carreras', ['controller' => 'Careers','action' => 'indexrecycle'], ['class' => 'btn btn-sm btn-info']) ?>
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
                    <?= $this->Html->link('Restautar', ['action' => 'untrash', $faculty->id], ['class' => 'btn btn-block btn-default']) ?>
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

