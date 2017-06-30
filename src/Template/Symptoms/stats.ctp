<style type="text/css">
  h4 { color:#576C9A;}
  h2 {text-align: center; color: red}
  a {color: #293638}
</style>
<script>
    function showContent() {
            element = document.getElementById("content");
            active = document.getElementById("active");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent2() {
            element = document.getElementById("content2");
            active = document.getElementById("active2");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent3() {
            element = document.getElementById("content3");
            active = document.getElementById("active3");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent4() {
            element = document.getElementById("content4");
            active = document.getElementById("active4");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent5() {
            element = document.getElementById("content5");
            active = document.getElementById("active5");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent6() {
            element = document.getElementById("content6");
            active = document.getElementById("active6");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent7() {
            element = document.getElementById("content7");
            active = document.getElementById("active7");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    function showContent8() {
            element = document.getElementById("content8");
            active = document.getElementById("active8");
            if (active.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
</script>

<?php echo $this->Form->create('Symptoms'); ?>
<?= $this->Flash->render(); ?>
<br>
<h2>Estadisticas de Peso</h2>
<table style="height: 165px; border-color:#CECECE;" bgcolor="#FFFFFF" border="1" rules="all" width="75%">
    <tbody>
        <tr style="text-align: center;">
        <th style="text-align: center; color:#576C9A;font-size:11px;" width="40%" scope="col">ÍNDICE MASA CORPORAL</th> <th style="text-align: center; color:#576C9A;font-size:11px;" width="60%" scope="col">CLASIFICACIÓN </th>
        </tr>
        <tr>
        <td>
        <div style="text-align: center;">&lt;16.00<br>16.00 - 16.99<br>17.00 - 18.49<br>18.50 - 24.99<br>25.00 - 29.99<br>30.00 - 34.99<br>35.00 - 40.00<br>&gt;40.00</div>
        </td>
        <td>
        <div style="text-align: center;">Infrapeso: Delgadez Severa<br>Infrapeso: Delgadez moderada<br>Infrapeso: Delgadez aceptable<br>Peso Normal<br>Sobrepeso<br>Obeso: Tipo I<br>Obeso: Tipo II<br>Obeso: Tipo III</div>
        </td>
        </tr>
    </tbody>
</table>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Delgadez Severa (<?= $total->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent()', 'id' => 'active']);
            ?>
        </div>


    <div id="content" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat as $delgadez): ?>
            <tr>
                <td><?= $delgadez->fc ?></td>
                <td><?= $delgadez->ta ?></td>
                <td><?= $delgadez->fr ?></td>
                <td><?= $delgadez->temperature ?></td>
                <td><?= $delgadez->weight ?></td>
                <td><?= $delgadez->csize ?></td>
                <td><?= $delgadez->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $delgadez->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Delgadez Moderada (<?= $total2->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent2()', 'id' => 'active2']);
            ?>
        </div>


    <div id="content2" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat2 as $delgadez2): ?>
            <tr>
                <td><?= $delgadez2->fc ?></td>
                <td><?= $delgadez2->ta ?></td>
                <td><?= $delgadez2->fr ?></td>
                <td><?= $delgadez2->temperature ?></td>
                <td><?= $delgadez2->weight ?></td>
                <td><?= $delgadez2->csize ?></td>
                <td><?= $delgadez2->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $delgadez2->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Delgadez Aceptable (<?= $total3->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent3()', 'id' => 'active3']);
            ?>
        </div>


    <div id="content3" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat3 as $delgadez3): ?>
            <tr>
                <td><?= $delgadez3->fc ?></td>
                <td><?= $delgadez3->ta ?></td>
                <td><?= $delgadez3->fr ?></td>
                <td><?= $delgadez3->temperature ?></td>
                <td><?= $delgadez3->weight ?></td>
                <td><?= $delgadez3->csize ?></td>
                <td><?= $delgadez3->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $delgadez3->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Peso Normal (<?= $total4->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent4()', 'id' => 'active4']);
            ?>
        </div>


    <div id="content4" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat4 as $peso): ?>
            <tr>
                <td><?= $peso->fc ?></td>
                <td><?= $peso->ta ?></td>
                <td><?= $peso->fr ?></td>
                <td><?= $peso->temperature ?></td>
                <td><?= $peso->weight ?></td>
                <td><?= $peso->csize ?></td>
                <td><?= $peso->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $peso->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Sobrepeso (<?= $total5->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent5()', 'id' => 'active5']);
            ?>
        </div>


    <div id="content5" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat5 as $sobrepeso): ?>
            <tr>
                <td><?= $sobrepeso->fc ?></td>
                <td><?= $sobrepeso->ta ?></td>
                <td><?= $sobrepeso->fr ?></td>
                <td><?= $sobrepeso->temperature ?></td>
                <td><?= $sobrepeso->weight ?></td>
                <td><?= $sobrepeso->csize ?></td>
                <td><?= $sobrepeso->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $sobrepeso->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Obeso: Tipo I (<?= $total6->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent6()', 'id' => 'active6']);
            ?>
        </div>


    <div id="content6" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat6 as $obeso): ?>
            <tr>
                <td><?= $obeso->fc ?></td>
                <td><?= $obeso->ta ?></td>
                <td><?= $obeso->fr ?></td>
                <td><?= $obeso->temperature ?></td>
                <td><?= $obeso->weight ?></td>
                <td><?= $obeso->csize ?></td>
                <td><?= $obeso->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $obeso->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Obeso: Tipo II (<?= $total7->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent7()', 'id' => 'active7']);
            ?>
        </div>


    <div id="content7" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat7 as $obeso2): ?>
            <tr>
                <td><?= $obeso2->fc ?></td>
                <td><?= $obeso2->ta ?></td>
                <td><?= $obeso2->fr ?></td>
                <td><?= $obeso2->temperature ?></td>
                <td><?= $obeso2->weight ?></td>
                <td><?= $obeso2->csize ?></td>
                <td><?= $obeso2->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $obeso2->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>Obeso: Tipo III (<?= $total8->count ?>) </h4>
            <?php
            echo $this->Form->input('', ['type' => 'checkbox', 'onchange' => 'javascript:showContent8()', 'id' => 'active8']);
            ?>
        </div>


    <div id="content8" style="display: block;">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th><?= $this->Paginator->sort('fc', ['fc']) ?></th>
                <th><?= $this->Paginator->sort('ta', ['ta']) ?></th>
                <th><?= $this->Paginator->sort('fr', ['fr']) ?></th>
                <th><?= $this->Paginator->sort('temperature', ['Temperatura']) ?></th>
                <th><?= $this->Paginator->sort('weight', ['Peso']) ?></th>
                <th><?= $this->Paginator->sort('csize', ['Altura']) ?></th>
                <th><?= $this->Paginator->sort('imc', ['IMC']) ?></th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pat8 as $obeso3): ?>
            <tr>
                <td><?= $obeso3->fc ?></td>
                <td><?= $obeso3->ta ?></td>
                <td><?= $obeso3->fr ?></td>
                <td><?= $obeso3->temperature ?></td>
                <td><?= $obeso3->weight ?></td>
                <td><?= $obeso3->csize ?></td>
                <td><?= $obeso3->imc ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Patients', 'action' => 'preview', $obeso3->patient_id], ['class' => 'btn btn-block btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<br>


<?php echo $this->Form->end(); ?>