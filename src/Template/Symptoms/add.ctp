<?= $this->Html->script('symptoms') ?>
<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Sintomas</h2>
        </div>
        <?= $this->Flash->render() ?>

        <?php if($search->count != 1): ?>
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
                    echo $this->Form->input('fc', ['label' => '* FC (Frecuencia Cardiaca)']);
                    echo $this->Form->input('ta', ['label' => '* TA (Tension Arterial)']);
                    echo $this->Form->input('fr', ['label' => '* FR (Frecuencia Respiratoria)']);
                    echo $this->Form->input('temperature', ['type' => 'text', 'maxlength' => '2', 'label' => '* Temperatura (°C)', 'onkeypress' => 'return valida(event)']);
                    echo $this->Form->input('weight', ['type' => 'text', 'maxlength' => '3', 'label' => '* Peso (kg.)', 'id' => 'valor1', 'onkeyup' => 'calcularIMC();', 'onkeypress' => 'return peso(event)']);
                    echo $this->Form->input('csize', ['type' => 'text', 'maxlength' => '4', 'label' => '* Altura (mts.)', 'id' => 'valor2', 'onkeyup' => 'calcularIMC();', 'onkeypress' => 'return altura(event)']);
                    echo $this->Form->input('imc', ['label' => 'IMC', 'id' => 'total', 'readonly' => 'readonly']);
                    echo $this->Form->input('blood', ['options' => ['A+' => 'A+','A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+',
                    'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-', 'no sabe' => 'No sabe'], 'label' => 'Tipo de sangre', 'empty' => '(Seleccione)']);
                    echo $this->Form->input('exploration', ['type' => 'textarea', 'rows' => '3', 'label' => '* Exploración']);
                    echo $this->Form->input('diagnostic', ['type' => 'textarea', 'rows' => '3', 'label' => '* Diagnóstico']);
                ?>
            </fieldset>
            <br />
            <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br />
                <br />
            <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
</div> 