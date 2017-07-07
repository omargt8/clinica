<?= $this->Html->script('jquery-ui.min')  ?>
<?= $this->Html->css('jquery-ui.min') ?>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
$(function () {
$("#fum").datepicker();
$('#fum').datepicker('option', { dateFormat: 'yy-mm-dd' });
});
$(function () {
$("#fpp").datepicker();
$('#fpp').datepicker('option', { dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0' });
});
$(function () {
$("#fup").datepicker();
$('#fup').datepicker('option', { dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0' });
});
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
             ?>
                <label for="">F.U.M (Fecha Última Menstruación)</label>
                <input type="text" id="fum" name="fum" readonly = readonly class="form-control">
            <?php
                echo $this->Form->input('children', ['label' => 'Hijos']);
            ?>
            
              <div>
              <?php
                  echo $this->Form->input('cantchildren', ['options' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
                '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'], 'label' => 'Cantidad de hijos', 'empty' => '(Seleccione)']);
               ?>
                <label for="">F.P.P (Fecha Primer Parto)</label>
                <input type="text" id="fpp" name="fpp" readonly = readonly class="form-control">
                <label for="">F.U.P (Fecha Último Parto)</label>
                <input type="text" id="fup" name="fup" readonly = readonly class="form-control">
              <?php
               ?>
              </div>

                <?php
                    echo $this->Form->input('pregnant', ['label' => 'Embarazada']);
                ?>

                <div>
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