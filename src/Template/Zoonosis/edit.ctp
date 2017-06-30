<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Editar Zoonosis</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($zoonosi, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('name', ['label' => '* Nombre de nueva Zoonosis']);
                echo $this->Form->input('treatment', ['label' => 'Tratamiento', 'type' => 'textarea', 'rows' => '4']);
            ?>
        </fieldset>
        <br />
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 