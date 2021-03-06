<script>
     function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
    function altura(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    //Punto
    if (tecla==46){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
    function peso(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

</script>

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
                echo $this->Form->input('fc', ['label' => '* FC (Frecuencia Cardiaca)']);
                echo $this->Form->input('ta', ['label' => '* TA (Tension Arterial)']);
                echo $this->Form->input('fr', ['label' => '* FR (Frecuencia Respiratoria)']);
                               echo $this->Form->input('temperature', ['type' => 'text', 'maxlength' => '2', 'label' => '* Temperatura (°C)', 'onkeypress' => 'return valida(event)']);
                echo $this->Form->input('weight', ['type' => 'text', 'maxlength' => '3', 'label' => '* Peso (kg.)', 'id' => 'valor1', 'onkeyup' => 'calcularIMC();', 'onkeypress' => 'return peso(event)']);
                echo $this->Form->input('csize', ['type' => 'text', 'maxlength' => '4', 'label' => '* Altura (mts.)', 'id' => 'valor2', 'onkeyup' => 'calcularIMC();', 'onkeypress' => 'return altura(event)']);
                echo $this->Form->input('blood', ['options' => ['A+' => 'A+','A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+',
                'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-', 'no sabe' => 'No sabe'], 'label' => 'Tipo de sangre', 'empty' => '(Seleccione)']);
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