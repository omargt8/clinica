<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Sintomas</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($symptom, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('asthenia', ['label' => 'Astenia']);
                echo $this->Form->input('adynamia', ['label' => 'Adinamia']);
                echo $this->Form->input('anorexy', ['label' => 'Anorexia']);
                echo $this->Form->input('fever', ['label' => 'Fiebre']);
                echo $this->Form->input('headache', ['label' => 'Dolor de cabeza']);
                echo $this->Form->input('consultation', ['type' => 'textarea', 'rows' => '3', 'label' => '* Consulta']);
                echo $this->Form->input('ccondition', ['type' => 'textarea', 'rows' => '3', 'label' => '* Condición']);
                echo $this->Form->input('fc', ['label' => '* FC']);
                echo $this->Form->input('ta', ['label' => '* TA']);
                echo $this->Form->input('fr', ['label' => '* FR']);
                echo $this->Form->input('temperature', ['label' => '* Temperatura (°C)']);
                echo $this->Form->input('weight', ['label' => '* Peso (kg.)']);
                echo $this->Form->input('csize', ['label' => '* Altura (mts.)']);
                echo $this->Form->input('blood', ['options' => ['A+' => 'A+','A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+',
                'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'], 'label' => 'Tipo de sangre', 'empty' => '(Seleccione)']);
                echo $this->Form->input('exploration', ['type' => 'textarea', 'rows' => '3', 'label' => '* Exploración']);
                echo $this->Form->input('diagnostic', ['type' => 'textarea', 'rows' => '3', 'label' => '* Diagnóstico']);
            ?>
        </fieldset>
        <br />
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 