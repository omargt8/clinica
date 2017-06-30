<!--Inicio-->

<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>HABITOS ALIMENTICIOS DE <?= $eathabit->patient->first_name. ' ' .$eathabit->patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Tiempos de comida</td>
			<td><?= $eathabit->mealtimes ?></td>
            </tr>
            <tr>
			<td>Refrigerios</td>
			<td><?= $eathabit->refreshment ?></td>
            </tr>
            <tr>
			<td>Tipo de alimentación</td>
			<td><?= $eathabit->feedingtime ?></td>
            </tr>
            <tr>
			<td>Vegetales</td>
			<td><?= $eathabit->vegetables ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
            <tr>
			<td>Cantidad de Vegetales</td>
			<td><?= $eathabit->amountvegetables ?></td>
            </tr>
            <tr>
			<td>Frutas</td>
			<td><?= $eathabit->fruits ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Cantidad de Frutas</td>
			<td><?= $eathabit->amountfruit ?></td>
            </tr>
			<td>Bebidas energéticas</td>
			<td><?= $eathabit->energydrinks ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Aceite</td>
			<td><?= $eathabit->typeoil ?></td>
            </tr>
			<td>Creado</td>
			<td><?= $eathabit->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $eathabit->modified->nice() ?></td>
            </tr>
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>

<!--Fin-->
