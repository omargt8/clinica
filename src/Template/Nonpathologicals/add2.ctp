<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Datos no patológicos</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($nonpathological, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('water', ['options' => ['potable' => 'Potable', 'pozo' => 'Pozo',
                 'cantarera' => 'Cantarera', 'otros' => 'Otros'], 'label' => '* Agua',
                   'empty' => '(Seleccione)']);
                echo $this->Form->input('house', ['options' => ['concreto' => 'Concreto', 'bloque' => 'Bloque',
                 'ladrillo' => 'Ladrillo', 'bahareque' => 'Bahareque', 'otros' => 'Otros'], 'label' => '* Casa',
                   'empty' => '(Seleccione)']);
                echo $this->Form->input('floor', ['options' => ['tierra' => 'Tierra', 'cemento' => 'Cemento',
                 'ceramica' => 'Cerámica', 'ladrillo' => 'Ladrillo', 'otros' => 'Otros'], 'label' => '* Piso',
                   'empty' => '(Seleccione)']);
                echo $this->Form->input('ceiling', ['options' => ['duralita con encielado' => 'Duralita con encielado',
                 'duralita sin encieladao' => 'Duralita sin encielado', 'teja' => 'Teja', 'lamina' => 'Lamina', 'plafon' => 'Plafón',
                 'otro' => 'Otro'], 'label' => '* Techo',
                   'empty' => '(Seleccione)']);
            ?>
        </fieldset>
        <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 