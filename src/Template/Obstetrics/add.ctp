<?= $this->Html->script(['hideinput', 'hideinput2', 'jquery-ui.min'])  ?>
<?= $this->Html->css('jquery-ui.min') ?>  
<script>   
$( function() {
    $( "#fum" ).datepicker();
  } );
    $( "#fpp" ).datepicker();
  } );
    $( "#fup" ).datepicker();
  } );
</script>

<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Datos obstetricos</2>
        </div>
        <?= $this->Flash->render() ?>

        <?= $this->Form->create($obstetric, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('menarche', ['options' => ['8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12',
                '13' => '13', '14' => '14', '15' => '15', '16' => '16'], 'label' => '* Menarquía', 'empty' => '(Seleccione edad)']);
                echo $this->Form->input('menstrualrhit', ['label' => 'Ritmo menstrual']);
                echo $this->Form->input('fum', ['label' => 'F.U.M', 'id' => 'fum']);
                echo $this->Form->input('children', ['label' => 'Hijos', 'onchange' => 'javascript:showContent()', 'id' => 'active']);
            ?>
            
              <div id="content" style="display: none;">
              <?php
                  echo $this->Form->input('cantchildren', ['options' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
                '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'], 'label' => 'Cantidad de hijos', 'empty' => '(Seleccione)']);
                echo $this->Form->input('fpp', ['label' => 'F.P.P', 'id' => 'fpp']);
                echo $this->Form->input('fup', ['label' => 'F.U.P', 'id' => 'fup']);
               ?>
              </div>

                <?php
                    echo $this->Form->input('pregnant', ['label' => 'Embarazada', 'onchange' => 'javascript:showContent2()', 'id' => 'active2']);
                ?>

                <div id="content2" style="display: none;">
                <?php
                  echo $this->Form->input('treatment', ['label' => 'Control']);
                ?>
                </div
            
            <div> 
        </fieldset>
        <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <br />
            <br />
        <?= $this->Form->end() ?>
    </div>
</div> 