<?= $this->Html->script(['hideinput', 'hideinput2']) ?>  
<?= $this->Html->css('check') ?>
<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <?= $this->Flash->render() ?>
                <div class = "page-header">
                    <h2>Datos patológicos</2>
                </div>
    </div>

        <div class = "col-md-12">
            <?= $this->Form->create($pathological, ['novalidate']) ?>

            <div class="row">

            <!-- Campos de la izquierda  -->
                <div class="col-md-6">
                    <fieldset>
                        <?php
                        echo $this->Form->input('diasesjoint', ['options' => ['ninguna' => 'Ninguna',
                          'miembros superiores' => 'Miembros superiores', 'miembros inferiores' => 'Miembros inferiores',
                           'ambos' => 'Ambos'], 'label' => '* Enfermedades conjuntas', 'empty' => '(Seleccione)']);
                        echo $this->Form->input('zoonosis_id', ['options' => $zoonosis, 'label' => '* Zoonosis', 'empty' => '(Seleccione)']);
                           echo $this->Form->input('diseasesrisk', ['options' => ['ninguna' => 'Ninguna',
                          'asma bronquial' => 'Asma bronquial', 'sindrome convulsivo' => 'Sindrome convulsivo',
                           'arritmias cardiacas' => 'Arritmias cardiacas'], 'label' => '* Riesgo de enfermedades','empty' => '(Seleccione)']);
                        ?>
                            <label for="othercardipatia">Otras cardiopatias</label>
                        <?php
                            echo $this->Form->textarea('othercardiopatia', ['rows' => '3']);
                        ?>
                        <label for="treatment">Tratamiento</label>
                        <?php
                            echo $this->Form->textarea('treatment', ['rows' => '3']);
                        ?>
                    </fieldset>
                </div>

                <!-- Campos de la derecha  -->
                <div class="col-md-6">
                    <fieldset>
                       <?php
                             echo $this->Form->input('surgicalinterven', ['label' => 'Intervenciones quirúrgicas',
                             'onchange' => 'javascript:showContent()', 'id' => 'active']);
                        ?>
                        <div id="content" style="display: none;">
                                <label for="typeintervention">Tipo de intervención</label>
                            <?php   
                                echo $this->Form->textarea('typeintervention', ['rows' => '3']);
                            ?>
                        </div>
                         <?php
                            echo $this->Form->input('venerealdiseases', ['label' => 'Enfermedades venereas',
                             'onchange' => 'javascript:showContent2()', 'id' => 'active2']);
                        ?>

                        <div id="content2" style="display: none;">
                        <?php   
                                echo $this->Form->input('typevenereal', ['label' => 'Tipo de enfermedad venerea']);
                        ?>
                        </div>
                        <?php
                        
                            echo $this->Form->input('tuberculosis', ['label' => 'Tuberculosis']);
                            echo $this->Form->input('irritablecolon', ['label' => 'Colon irritable']);
                            echo $this->Form->input('peptica', ['label' => 'Peptica']);
                            echo $this->Form->input('constipation', ['label' => 'Estreñimiento']);
                            echo $this->Form->input('signature', ['label' => 'Firma (De acuerdo con la información proporcionada)']);
                        ?>
                    </fieldset>
                </div>

            <div class = "col-md-6 col-md-offset-3">
            <br />
            <br />
                <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> 
</br></br>