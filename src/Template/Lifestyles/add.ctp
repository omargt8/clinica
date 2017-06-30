<?= $this->Html->script('hideinput')  ?>    

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
                echo $this->Form->input('sport', ['label' => 'Deportes', 'onchange' => 'javascript:showContent()', 'id' => 'active']);
            ?>
            <div id="content" style="display: none;">
                <?php
                echo $this->Form->input('type', ['options' => ['futbol' => 'Futbol', 'basquetbol' => 'Basquetbol',
                 'atletismo' => 'Atletismo', 'caminata' => 'Caminata', 'aerobicos' => 'aeróbicos', 'tenis' => 'Tenis',
                  'softbol' => 'Softbol', 'boleibol' => 'Boleibol', 'otros' => 'Otros'], 'label' => 'Tipo de deportes',
                   'empty' => '(Seleccione)']);
                echo $this->Form->input('frequency', ['options' => ['150 minutos a la semana' => '150 minutos a la semana',
                 'mas de 150 minutos a la semana' => 'Mas de 150 minutos a la semana', 'menos de 150 minutos a la semana'
                  => 'Menos de 150 minutos a la semana'], 'label' => 'Frecuencia', 'empty' => '(Seleccione)']);
                  ?>
            </div>
        </fieldset>
        <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 