<script>
    function busc(e)
    {
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
        // Enter
        if (tecla==13){
            return true;
        }
        
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>
<h1> Buscar Paciente </h1>
<br>
<div class="row">
    <?php echo $this->Form->create('Patients', array('type' => 'GET')); ?>
    
    <div class="col-sm-4">
        <?php echo $this->Form->input('search', array('label' => false, 'maxlength' => '6', 'div' => false, 'autocomplet' => 'off', 'onkeypress' => 'return busc(event)')); ?>
    </div>

    <div class="col-sm-3">
        <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    </div>

    <?php echo $this->Form->end(); ?>
</div>

<div class"row">
    <?php if(!empty($search)) : ?>
        <?php if(!empty($patient)): ?>

            <?php foreach($patient as $patient): ?>
                <div class="table-responsive">

                <table class="table table-hover">

                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('carnet', ['Carnet']) ?></th>
                    <th><?= $this->Paginator->sort('first_name', ['Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('last_name', ['Apellidos']) ?></th>
                    <th><?= $this->Paginator->sort('age', ['Edad']) ?></th>
                    <th><?= $this->Paginator->sort('income', ['Ingreso']) ?></th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td><?= h($patient->carnet) ?></td>
                    <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                    <td><?= h($patient->first_name) ?></td>
                    <td><?= h($patient->last_name) ?></td>
                    <?php else : ?>
                    <td>------------</td>
                    <td>------------</td>
                    <?php endif; ?>
                    <td><?= h($patient->age) ?></td>
                    <td><?= h($patient->income) ?></td>
                    <td>
                        <?= $this->Html->link('Ver', ['action' => 'preview', $patient->id], ['class' => 'btn btn-sm btn-info']) ?>

                        <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                        <?= $this->Html->link('Editar', ['action' => 'preedit', $patient->id], ['class' => 'btn btn-sm btn-default']) ?>
                        <?= $this->Form->postLink('Borrar', ['action' => 'delete', $patient->id], ['confirm' =>
                        'Eliminar Usuario?', 'class' => 'btn btn-sm btn-danger']) ?>
                        <?php else : ?>
                        <?= $this->Html->link('Editar', ['action' => 'index'], ['class' => 'btn btn-sm btn-default disabled']) ?>
                        <?= $this->Html->link('Borrar', ['action' => 'index'], ['class' => 'btn btn-sm btn-danger disabled']) ?>
                    <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
                <?php else: ?>
                <h2>No se encontraron resultados</h2>
        <?php endif ?>
    <?php endif ?>
    </div>
</div>
