<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS PATOLOGICOS DE <?= $pathological->patient->first_name. ' ' .$pathological->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Intervención quirúrgica</td>
			<td><?= $pathological->surgicalinterven ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de intervención</td>
			<td><?= $pathological->typeintervention ?></td>
            </tr>
            <tr>
			<td>Enfermedades venereas</td>
			<td><?= $pathological->venerealdiseases ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de enfermedad venerea</td>
			<td><?= $pathological->typevenereal ?></td>
            </tr>
            <tr>
			<td>Enfermedades conjuntas</td>
			<td><?= $pathological->diasesjoint ?></td>
            </tr>
            <tr>
			<td>Tuberculosis</td>
			<td><?= $pathological->tuberculosis ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Zoonosis</td>
			<td><?= $pathological->has('zoonosi') ? $this->Html->link($pathological->zoonosi->name,
                     ['controller' => 'Zoonosis', 'action' => 'view', $pathological->zoonosi->id]) : '' ?></td>
            </tr>
            <tr>
			<td>Riesgo de enfermedades</td>
			<td><?= $pathological->diseasesrisk ?></td>
            </tr>
            <tr>
			<td>Otras cardiopatías</td>
			<td><?= $pathological->othercardiopatia ?></td>
            </tr>
            <tr>
			<td>Tratamiento</td>
			<td><?= $pathological->treatment ?></td>
            </tr>
            <tr>
			<td>Colon irritable</td>
			<td><?= $pathological->irritablecolon ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Peptica</td>
			<td><?= $pathological->peptica ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Estreñimiento</td>
			<td><?= $pathological->constipation ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Firma</td>
			<td><?= $pathological->signature ? 'SI' : 'NO' ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $pathological->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $pathological->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->


        