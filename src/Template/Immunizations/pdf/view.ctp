<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>INMUNICACIONES DE <?= $immunization->patient->first_name. ' ' .$immunization->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Vacunas Completas</td>
			<td><?= $immunization->vaccines ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Pendientes</td>
			<td><?= $immunization->pending ?></td>
            </tr>
            <tr>
			<td>Prevención sexual</td>
			<td><?= $immunization->sexualprevention ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Preservativo</td>
			<td><?= $immunization->condom ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
            <tr>
			<td>Edad de Inicio</td>
			<td><?= $immunization->ageonset ?></td>
            </tr>
            <tr>
			<td>Planificando</td>
			<td><?= $immunization->planning ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Protocolo de inyección</td>
			<td><?= $immunization->injectionprotocol ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $immunization->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $immunization->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->
