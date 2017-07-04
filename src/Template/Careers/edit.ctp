<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Editar Carrera</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($career, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('name', ['label' => '* Nombre de la nueva Carrera']);
            ?>
        </fieldset>
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 