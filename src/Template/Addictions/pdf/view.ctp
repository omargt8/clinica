<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>DATOS DE ADICCIONES DE <?= $addiction->patient->first_name. ' ' .$addiction->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Fumador</td>
			<td><?= $addiction->smoking ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Cantidad Consumida</td>
			<td><?= $addiction->quantityconsumed ?></td>
            </tr>
            <tr>
			<td>Tiempo inhalando nicotina</td>
			<td><?= $addiction->timeinhalnicotine ?></td>
            </tr>
            <tr>
			<td>Fumador Pasivo</td>
			<td><?= $addiction->passivesmoker ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Familiar Fumador</td>
			<td><?= $addiction->parientssmoke ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Alcoholismo</td>
			<td><?= $addiction->alcoholism ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tiempo consumiendo</td>
			<td><?= $addiction->timeintake ?></td>
            </tr>
            <tr>
			<td>Cantidad</td>
			<td><?= $addiction->quantity ?></td>
            </tr>
            <tr>
			<td>Coalcoholico</td>
			<td><?= $addiction->coalcoholic ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Adicción a drogas</td>
			<td><?= $addiction->drugaddiction ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de drogas</td>
			<td><?= $addiction->type ?></td>
            </tr>
            <tr>
			<td>Violencia</td>
			<td><?= $addiction->violence ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Violencia</td>
			<td><?= $addiction->typeviolence ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $addiction->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $addiction->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->

