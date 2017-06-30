
<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS PERSONALES DE <?= $patient->first_name. ' ' .$patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Carnet</td>
			<td><?= $patient->carnet ?></td>
            </tr>
            <tr>
			<td>Edad</td>
			<td><?= $patient->age ?></td>
            </tr>
            <tr>
			<td>Genero</td>
			<td>
            <?php
            if($patient->gender == 'female')
            {
                echo 'Femenino';
            }
            else
            {
                echo 'Masculino';
            }
            ?>
            </td>
            </tr>
            <tr>
			<td>Ingreso</td>
			<td><?= $patient->income ?></td>
            </tr>
            <tr>
			<td>Facultad</td>
			<td>
                <?= $patient->has('faculty') ? $this->Html->link($patient->faculty->name,
                     ['controller' => 'Careers', 'action' => 'view', $patient->faculty->id]) : '' ?>
                    &nbsp;
            </td>
            </tr>
            <tr>
			<td>Carrera</td>
			<td>
                <?= $patient->has('career') ? $this->Html->link($patient->career->name,
                     ['controller' => 'Careers', 'action' => 'view', $patient->career->id]) : '' ?>
                    &nbsp;
            </td>
            </tr>
            <tr>
			<td>Estado Civil</td>
			<td><?= $patient->marital_status ?></td>
            </tr>
            <tr>
			<td>Ocupación</td>
			<td><?= $patient->occupation ?></td>
            </tr>
            <tr>
			<td>Departamento</td>
			<td><?= $patient->department ?></td>
            </tr>
            <tr>
			<td>Municipio</td>
			<td><?= $patient->town ?></td>
            </tr>
            <tr>
			<td>Hijos</td>
			<td><?= $patient->children ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Transporte</td>
			<td><?= $patient->transport ?></td>
            </tr>
            <tr>
			<td>Dinero Mensual</td>
			<td>$<?= $patient->money ?></td>
            </tr>
            <tr>
			<td>Creado</td>
			<td><?= $patient->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $patient->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>


        