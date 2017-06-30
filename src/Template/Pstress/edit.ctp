<?= $this->Html->script('hideinput') ?>
<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Estrés</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($pstres, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('studyhours', ['options' => ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '5',
                '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', 'mas de 10 al dia' => 'Más de 10 al día'],
                 'label' => '* Horas de estudio al día', 'empty' => '(Seleccione)']);
                echo $this->Form->input('studydays', ['options' => ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4',
                 '5' => '5', '6' => '6', '7' => '7'], 'label' => '* Días de estudio a la semana', 'empty' => '(Seleccione)']);
                 echo $this->Form->input('stress', ['label' => 'Presencia de Estrés']);
            ?>
              <?php
                echo $this->Form->input('beforeevaluations', ['label' => 'Antes de las evaluaciones']);
                echo $this->Form->input('duringevaluations', ['label' => 'Durante las evaluaciones']);
               ?>
            <?php
                echo $this->Form->input('supportunit', ['label' => 'Unidad de apollo']);
            ?>
        </fieldset>
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 