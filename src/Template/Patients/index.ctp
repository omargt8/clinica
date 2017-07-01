<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Lista de Pacientes</h2>
            <?= $this->Flash->render() ?>
        </div>

        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('carnet', ['Carnet']) ?></th>
                <th><?= $this->Paginator->sort('first_name', ['Nombre']) ?></th>
                <th><?= $this->Paginator->sort('last_name', ['Apellidos']) ?></th>
                <th><?= $this->Paginator->sort('faculty', ['Facultad']) ?></th>
                <th><?= $this->Paginator->sort('career', ['Carrera']) ?></th>
                <th><?= $this->Paginator->sort('age', ['Edad']) ?></th>
                <th><?= $this->Paginator->sort('income', ['Ingreso']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?= h($patient->carnet) ?></td>
                <!--Solo lo puede ver un usuario administrador-->
                <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <td><?= h($patient->first_name) ?></td>
                <td><?= h($patient->last_name) ?></td>
                <?php else : ?>
                <td>------------</td>
                <td>------------</td>
                <?php endif; ?>
                <td><?= h($patient->faculty) ?></td>
                <td><?= h($patient->career) ?></td>
                <td><?= h($patient->age) ?></td>
                <td><?= h($patient->income) ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'preview', $patient->id], ['class' => 'btn btn-sm btn-info']) ?>

                    <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                    <?= $this->Html->link('Editar', ['action' => 'preedit', $patient->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $patient->id], ['confirm' =>
                    'Eliminar Paciente?', 'class' => 'btn btn-sm btn-danger']) ?>
                    <?php else : ?>
                    <?= $this->Html->link('Editar', ['action' => 'index'], ['class' => 'btn btn-sm btn-default disabled']) ?>
                    <?= $this->Html->link('Borrar', ['action' => 'index'], ['class' => 'btn btn-sm btn-danger disabled']) ?>
                    <?php endif; ?>
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

