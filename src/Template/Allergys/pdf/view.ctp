<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS ALERGICOS DE <?= $allergy->patient->first_name. ' ' .$allergy->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Polen</td>
			<td><?= $allergy->pollen ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Polvo</td>
			<td><?= $allergy->dust ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Clima</td>
			<td><?= $allergy->weather ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Comida</td>
			<td><?= $allergy->food ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Bebidas</td>
			<td><?= $allergy->drink ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Medicamentos</td>
			<td><?= $allergy->medication ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Otros</td>
			<td><?= $allergy->others ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $allergy->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $allergy->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->


