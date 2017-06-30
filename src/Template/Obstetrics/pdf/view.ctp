<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS OBSTETRICOS DE <?= $obstetric->patient->first_name. ' ' .$obstetric->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Menarquía</td>
			<td><?= $obstetric->menarche ?></td>
            </tr>
            <tr>
			<td>Ritmo menstrual</td>
			<td><?= $obstetric->menstrualrhit ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>F.U.M</td>
			<td><?= $obstetric->fum->nice() ?></td>
            </tr>
            <tr>
			<td>Hijos</td>
			<td><?= $obstetric->children ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Cantidad de Hijos</td>
			<td><?= $obstetric->cantchildren ?></td>
            </tr>
            <tr>
			<td>F.P.P</td>
			<td><?= $obstetric->fpp->nice() ?></td>
            </tr>
            <tr>
			<td>F.U.P</td>
			<td><?= $obstetric->fup->nice() ?></td>
            </tr>
            <tr>
			<td>Embarazada</td>
			<td><?= $obstetric->pregnant ? 'SI' : 'NO'  ?></td>
            </tr>
            <tr>
			<td>En control</td>
			<td><?= $obstetric->treatment ? 'SI' : 'NO'  ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $obstetric->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $obstetric->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->



        