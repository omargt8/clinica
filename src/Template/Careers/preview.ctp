<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <?= $this->Flash->render() ?>
            <?php if(isset($fac['name'])): ?>
                <h2>Carreras <?= $fac->faculty->name ?></h2>
            <?php else: ?>
                <h2>Esta facultad no tiene carreras aún</h2>
            <?php endif; ?>
        </div>


        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th>Nombre </th>
                <th>Facultad </th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($careers as $career): ?>
            <tr>
                <td><?= h($career->name) ?></td>
                <td><?= $career->faculty->name ?></td>
                <td>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $career->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink('Borrar', ['action' => 'trash', $career->id], ['confirm' =>
                    'Eliminar Carrera?', 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>

        </div>
    </div>
</div>

