
<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Hábitos alimenticios</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($eathabit, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('mealtimes', ['options' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
                '6' => '6', '7' => '7', '8' => '8', '9' => '9'], 'label' => '* Tiempos de Comida', 'empty' => '(Seleccione)']);
                echo $this->Form->input('refreshment', ['options' => ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
                '6' => '6'], 'label' => '* Refrigerios', 'empty' => '(Seleccione)']);
                echo $this->Form->input('feedingtime', ['options' => ['hipercalorico' => 'Hipercalórico', 'normacalorico' => 'Normacalórico',
                 'hipocalorico' => 'Hipocalórico'], 'label' => '* Tipo de alimentación', 'empty' => '(Seleccione)']);
                echo $this->Form->input('vegetables', ['label' => 'Vegetales', 'onchange' => 'javascript:showContent()', 'id' => 'active']); 
            ?>
            
              <?php
                  echo $this->Form->input('amountvegetables', ['options' => ['5 tazas al dia' => '5 Tazas al día', '3 tazas al dia '
                   => '3 Tazas al día', 'menos de 1 taza al dia' => 'Menos de 1 Taza al día'], 'label' => 'Tazas de Vegetales',
                    'empty' => '(Seleccione)']);  
               ?>

                <?php
                    echo $this->Form->input('fruits', ['label' => 'Frutas', 'onchange' => 'javascript:showContent2()', 'id' => 'active2']);
                ?>

                <?php
                  echo $this->Form->input('amountfruit', ['options' => ['2 tazas al dia' => '2 Tazas al día', '1 tazas al dia '
                   => '1 Tazas al día', 'menos de 1 taza al dia' => 'Menos de 1 Taza al día'], 'label' => 'Tazas de Frutas',
                'empty' => '(Seleccione)']);  
                ?>
            
            <div> 
            <?php
                echo $this->Form->input('energydrinks', ['label' => 'Bebidas energéticas']);
                echo $this->Form->input('typeoil', ['options' => ['canola' => 'Canola', 'oliva'
                   => 'Oliva', 'girasol' => 'Girasol', 'maiz' => 'Máiz', 'mezcla' => 'Mezcla', 'manteca'
                   => 'Manteca', 'margarina' => 'Margarina', 'otro' => 'Otro'], 'label' => '* Tipo de Aceite',
                    'empty' => '(Seleccione)']); 
            ?>
        </fieldset>
        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
        <?= $this->Form->end() ?>
        <br />
        <br />
    </div>
</div> 