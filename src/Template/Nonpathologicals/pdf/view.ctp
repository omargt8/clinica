<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS NO PATOLOGICOS DE <?= $nonpathological->patient->first_name. ' ' .$nonpathological->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Tipo de agua</td>
			<td><?= $nonpathological->water ?></td>
            </tr>
            <tr>
			<td>Casa</td>
			<td><?= $nonpathological->house ?></td>
            </tr>
            <tr>
			<td>Piso</td>
			<td><?= $nonpathological->floor ?></td>
            </tr>
            <tr>
			<td>Techo</td>
			<td><?= $nonpathological->ceiling ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $nonpathological->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $nonpathological->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->

