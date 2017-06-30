     
<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS DE Estrés DE <?= $pstres->patient->first_name. ' ' .$pstres->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Horas de Estudio Diaras</td>
			<td><?= $pstres->studyhours ?></td>
            </tr>
            <tr>
			<td>Días de estudio a la semana</td>
			<td><?= $pstres->studydays ?></td>
            </tr>
            <tr>
			<td>Estrés</td>
			<td><?= $pstres->stress ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Estrés antes de las evaluaciones</td>
			<td><?= $pstres->beforeevaluations ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Estrés durante las evaluaciones</td>
			<td><?= $pstres->duringevaluations ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Unidad de apoyo</td>
			<td><?= $pstres->supportunit ? 'SI' : 'NO' ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $pstres->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $pstres->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

    

               