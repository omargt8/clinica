<script type="text/javascript">
    /**
     * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
     * Suma los valores de los cuadros de texto
     */
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


    function calcularIMC()
    {
        var valor1=verificar("valor1");
        var valor2=verificar("valor2");
        // realizamos la suma de los valores y los ponemos en la casilla del
        // formulario que contiene el total
        document.getElementById("total").value=parseFloat(valor1)/ (parseFloat(valor2)*parseFloat(valor2))
    }
 
    /**
     * Funcion para verificar los valores de los cuadros de texto. Si no es un
     * valor numerico, cambia de color el borde del cuadro de texto
     */
    function verificar(id)
    {
        var obj=document.getElementById(id);
        if(obj.value=="")
            value="0";
        else
            value=obj.value;
        if(validate_importe(value,1))
        {
            // marcamos como erroneo
            obj.style.borderColor="#808080";
            return value;
        }else{
            // marcamos como erroneo
            obj.style.borderColor="#f00";
            return 0;
        }
    }
 
    /**
     * Funcion para validar el importe
     * Tiene que recibir:
     *  El valor del importe (Ej. document.formName.operator)
     *  Determina si permite o no decimales [1-si|0-no]
     * Devuelve:
     *  true-Todo correcto
     *  false-Incorrecto
     */
    function validate_importe(value,decimal)
    {
        if(decimal==undefined)
            decimal=0;
 
        if(decimal==1)
        {
            // Permite decimales tanto por . como por ,
            var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
        }else{
            // Numero entero normal
            var patron=new RegExp("^([0-9])*$")
        }
 
        if(value && value.search(patron)==0)
        {
            return true;
        }
        return false;
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
    </div>
</div> 