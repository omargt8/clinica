<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>ESTILO DE VIDA DE <?= $lifestyle->patient->first_name. ' ' .$lifestyle->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Ejercicio</td>
			<td><?= $lifestyle->workshop ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Deportes</td>
			<td><?= $lifestyle->sport ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Deporte</td>
			<td><?= $lifestyle->type ?></td>
            </tr>
            <tr>
			<td>Frecuencia de Deportes</td>
			<td><?= $lifestyle->frequency ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $lifestyle->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $lifestyle->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->



        