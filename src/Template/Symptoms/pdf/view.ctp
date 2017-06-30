<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>SINTOMAS DE <?= $symptom->patient->first_name. ' ' .$symptom->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Astenia</td>
			<td><?= $symptom->asthenia ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Adinamia</td>
			<td><?= $symptom->adynamia ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Anorexia</td>
			<td><?= $symptom->anorexy ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Fiebre</td>
			<td><?= $symptom->fever ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Dolor de cabeza</td>
			<td><?= $symptom->headache ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Consulta</td>
			<td><?= $symptom->consultation ?></td>
            </tr>
            <tr>
			<td>Condición</td>
			<td><?= $symptom->ccondition ?></td>
            </tr>
            <tr>
			<td>FC</td>
			<td><?= $symptom->fc ?></td>
            </tr>
            <tr>
			<td>TA</td>
			<td><?= $symptom->ta ?></td>
            </tr>
            <tr>
			<td>FR</td>
			<td><?= $symptom->fr ?></td>
            </tr>
            <tr>
			<td>Temperatura</td>
			<td><?= $symptom->temperature ?></td>
            </tr>
            <tr>
			<td>Peso</td>
			<td><?= $symptom->weight ?></td>
            </tr>
            <tr>
			<td>Altura</td>
			<td><?= $symptom->csize ?></td>
            </tr>
            <tr>
			<td>I.M.C</td>
			<td><?= $symptom->imc ?></td>
            </tr>
            <tr>
			<td>Tipo de Sangre</td>
			<td><?= $symptom->blood ?></td>
            </tr>
			<td>Exploración</td>
			<td> <?= $symptom->exploration ?></td>
            </tr>
			<td>Diagnostico</td>
			<td><?= $symptom->diagnostic ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $symptom->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $symptom->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->

