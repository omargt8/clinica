
<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Estilo de vida</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($lifestyle, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('workshop', ['label' => 'Ejercicio']);
                echo $this->Form->input('sport', ['label' => 'Deportes']);
            ?>
                <?php
                echo $this->Form->input('type', ['options' => ['futbol' => 'Futbol', 'basquetbol' => 'Basquetbol',
                 'atletismo' => 'Atletismo', 'caminata' => 'Caminata', 'aerobicos' => 'aeróbicos', 'tenis' => 'Tenis',
                  'softbol' => 'Softbol', 'boleibol' => 'Boleibol', 'otros' => 'Otros'], 'label' => 'Tipo de deportes',
                   'empty' => '(Seleccione)']);
                echo $this->Form->input('frequency', ['options' => ['1 dia a la semana' => '1 día a la semana',
                 '2 dias a la semana' => '2 días a la semana', '3 dias a la semana'
                  => '3 días a la semana', '4 dias a la semana' => '4 días a la semana',
                  '5 dias a la semana' => '5 días a la semana', '6 dias a la semana' => '6 días a la semana',
                  'todos los dias de la semana' => 'Todos los días de la semana'], 'label' => 'Frecuencia', 'empty' => '(Seleccione)']);
                  ?>
        </fieldset>
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 