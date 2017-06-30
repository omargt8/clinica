<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Presencia de Adicciones</h2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($addiction, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('smoking', ['label' => 'Fumador']); 
            ?>
            
                <label>Cantidad Diaria</label>
                    <div class = "row">
                        <div class = "col-xs-4">
                            <?php
                                echo $this->Form->input('quantityconsumed1', ['options' => ['1' => '1',
                                    '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6',
                                    '7' => '7', '8' => '8', '9' => '9'], 'label' => false, 'empty' => '(Seleccione)']);
                            ?>
                        </div>
                        <div class = "col-xs-4">
                        <?php
                                echo $this->Form->input('quantityconsumed2', ['options' => ['cigarros' => 'Cigarros',
                                    'cajetillas' => 'Cajetillas'], 'label' => false, 'empty' => '(Seleccione)']);
                        ?>
                        </div>
                    </div>
                <?php
                echo $this->Form->input('timeinhalnicotine', ['label' => 'Tiempo inhalando nicotina']);
               ?>

            <?php
                echo $this->Form->input('passivesmoker', ['label' => 'Fumador pasivo']); 
                echo $this->Form->input('parientssmoke', ['label' => 'Familiar fumador']); 
            ?>

            <?php
                echo $this->Form->input('alcoholism', ['label' => 'Alcoholismo']);
            ?>

                <?php
                    echo $this->Form->input('timeintake', ['label' => 'Tiempo consumiendo']); 
                    echo $this->Form->input('quantity', ['label' => 'Cantidad']); 
                ?>
            
            <?php
                echo $this->Form->input('coalcoholic', ['label' => 'Coalcoholico']);
                echo $this->Form->input('drugaddiction', ['label' => 'Adiccion a drogas']);
            ?>
                <?php
                    echo $this->Form->input('type', ['options' => ['marihuana' => 'Marihuana', 'extasis' => 'Extasis',
                     'crack' => 'Crack', 'metanfetamina de cristal' => 'Metanfetamina de cristal', 'heroina' => 'Heroina',
                     'lsd' => 'LSD', 'metilfenidato' => 'Metilfenidato', 'pegamento' => 'Pegamento', 'quimicos' => 'Químicos',
                     'cocaina' => 'Cocaína', 'otro' => 'Otro'], 'label' => 'Tipo de droga', 'empty' => '(Seleccione)']);
                ?>

             <?php
                echo $this->Form->input('violence', ['label' => 'Violencia']);
            ?>
                <?php
                    echo $this->Form->input('typeviolence', ['options' => ['intrafamiliar' => 'Intrafamiliar', 'violencia social' =>
                     'Violencia social', 'violencia fisica' => 'Violencia física', 'violencia verbal' => 'Violencia verbal',
                      'violencia psicologica' => 'Violencia psicologica', 'violencia sexual' => 'Violencia sexual',
                       'otra' => 'Otra'], 'label' => 'Tipo de violencia', 'empty' => '(Seleccione)']);
                ?>
        </fieldset>
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 