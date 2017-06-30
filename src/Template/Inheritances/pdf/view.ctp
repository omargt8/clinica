<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>ENFERMEDADES HEREDITARIAS DE <?= $inheritance->patient->first_name. ' ' .$inheritance->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Hipertensión</td>
			<td><?= $inheritance->hypertension ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Diabetes mellitus</td>
			<td><?= $inheritance->mellitusdiabetes ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Cardiopatías</td>
			<td><?= $inheritance->cardiopathies ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Nefropatías</td>
			<td><?= $inheritance->nephropathy ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
            <tr>
			<td>Epilepsia</td>
			<td><?= $inheritance->epilpsy ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Asma Bronquial</td>
			<td><?= $inheritance->bronchialasthma ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Cancer</td>
			<td><?= $inheritance->cancer ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Cancer</td>
			<td><?= $inheritance->typecancer ?></td>
            </tr>
            <tr>
			<td>Otros</td>
			<td><?= $inheritance->others ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $inheritance->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $inheritance->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->

