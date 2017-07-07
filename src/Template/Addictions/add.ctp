<?= $this->Html->script(['hideinput', 'hideinput2'])  ?>
<script>
function showContent3() {
        element = document.getElementById("content3");
        active3 = document.getElementById("active3");
        if (active3.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
function showContent4() {
        element = document.getElementById("content4");
        active4 = document.getElementById("active4");
        if (active4.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Presencia de Adicciones</h2>
        </div>
        <?= $this->Flash->render() ?>

        <?php if($search->count != 1): ?>
            <?= $this->Form->create($addiction, ['novalidate']) ?>
            <fieldset>
                <?php
                    echo $this->Form->input('smoking', ['label' => 'Fumador', 'onchange' => 'javascript:showContent()', 'id' => 'active']); 
                ?>
                
                <div id="content" style="display: none;">
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
                </div>

                <?php
                    echo $this->Form->input('passivesmoker', ['label' => 'Fumador pasivo']); 
                    echo $this->Form->input('parientssmoke', ['label' => 'Familiar fumador']); 
                ?>

                <?php
                    echo $this->Form->input('alcoholism', ['label' => 'Alcoholismo', 'onchange' => 'javascript:showContent2()', 'id' => 'active2']);
                ?>

                <div id="content2" style="display: none;">
                    <?php
                        echo $this->Form->input('timeintake', ['label' => 'Tiempo consumiendo']); 
                        echo $this->Form->input('quantity', ['label' => 'Cantidad']); 
                    ?>
                </div>
                
                <?php
                    echo $this->Form->input('coalcoholic', ['label' => 'Coalcoholico']);
                    echo $this->Form->input('drugaddiction', ['label' => 'Adiccion a drogas', 'onchange' => 'javascript:showContent3()', 'id' => 'active3']);
                ?>
                <div id="content3" style="display: none;">
                    <?php
                        echo $this->Form->input('type', ['options' => ['marihuana' => 'Marihuana', 'extasis' => 'Extasis',
                        'crack' => 'Crack', 'metanfetamina de cristal' => 'Metanfetamina de cristal', 'heroina' => 'Heroina',
                        'lsd' => 'LSD', 'metilfenidato' => 'Metilfenidato', 'pegamento' => 'Pegamento', 'quimicos' => 'Químicos',
                        'cocaina' => 'Cocaína', 'otro' => 'Otro'], 'label' => 'Tipo de droga', 'empty' => '(Seleccione)']);
                    ?>
                </div>

                <?php
                    echo $this->Form->input('violence', ['label' => 'Violencia', 'onchange' => 'javascript:showContent4()', 'id' => 'active4']);
                ?>
                <div id="content4" style="display: none;">
                    <?php
                        echo $this->Form->input('typeviolence', ['options' => ['intrafamiliar' => 'Intrafamiliar', 'violencia social' =>
                        'Violencia social', 'violencia fisica' => 'Violencia física', 'violencia verbal' => 'Violencia verbal',
                        'violencia psicologica' => 'Violencia psicologica', 'violencia sexual' => 'Violencia sexual',
                        'otra' => 'Otra'], 'label' => 'Tipo de violencia', 'empty' => '(Seleccione)']);
                    ?>
                </div>
            </fieldset>
            <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br />
                <br />
            <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
</div> 