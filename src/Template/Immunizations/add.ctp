<?= $this->Html->script(['backhideinput', 'hideinput'])  ?>  

<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Inmunizaciones</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($immunization, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('vaccines', ['label' => 'Vacunas', 'onchange' => 'javascript:showContent2()', 'id' => 'active2']);
            ?>
            <div id="content2" style="display: block;">
                <?php
                echo $this->Form->input('pending', ['label' => 'Pendientes']);
                ?>
            </div>
            <?php
                echo $this->Form->input('sexualprevention', ['label' => 'Prevención sexual']);
                echo $this->Form->input('condom', ['label' => 'Condon']);
                echo $this->Form->input('ageonset',  ['options' => ['10' => '10','11' => '11','12' => '12','13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17',
                            '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24',
                            '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'],'label' => 'Inicio vida sexual (años)',
                             'empty' => '(Seleccione)']);
                echo $this->Form->input('planning', ['label' => 'Planificación', 'onchange' => 'javascript:showContent()', 'id' => 'active']);

            ?>
            <div id="content" style="display: none;">
                <?php
                echo $this->Form->input('injectionprotocol', ['options' => ['mensual' => 'Mensual', 'bimensual' => 'Bimensual',
                 'trimestral' => 'Trimestral'], 'label' => 'Protocolo de inyección', 'empty' => '(Seleccione)']);
                ?>
            </div>
        </fieldset>
        <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
        
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 