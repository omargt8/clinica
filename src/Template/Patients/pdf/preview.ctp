
<?php $fecha = date("d") .  "/" . date("m") . "/" . date("Y") . " " . date("G") . ":" . date("i") . ":" . date("s"); ?>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
                <h3>UNIVERSIDAD SALVADOREÑA ALBERTO MASFERRER</h3>
                <h3>CLINICA EMPRESARIAL</h3>
                <h3>EXPEDIENTE CLINICO DE <?= $patient->first_name. ' ' .$patient->last_name ?> </h3>
                <h3>REPORTE GENERADO POR <?= $current_user['full_name'] . ' ' . $fecha ?> </h3>
            </div>
        </div>
        <br>
<div style="text-align:left;">
        <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="margin: 0 auto;" WIDTH="80%">
			<tbody>
            <tr>
			<td>Carnet</td>
			<td><?= $patient->carnet ?></td>
            </tr>
            <tr>
			<td>Edad</td>
			<td><?= $patient->age ?></td>
            </tr>
            <tr>
			<td>Genero</td>
			<td>
            <?php
            if($patient->gender == 'female')
            {
                echo 'Femenino';
            }
            else
            {
                echo 'Masculino';
            }
            ?>
            </td>
            </tr>
            <tr>
			<td>Ingreso</td>
			<td><?= $patient->income ?></td>
            </tr>
            <tr>
			<td>Facultad</td>
			<td>
                <?= $patient->faculty->name ?>
            </td>
            </tr>
            <tr>
			<td>Carrera</td>
			<td>
                <?= $patient->career->name ?>          
            </td>
            </tr>
            <tr>
			<td>Estado Civil</td>
			<td><?= $patient->marital_status ?></td>
            </tr>
            <tr>
			<td>Ocupación</td>
			<td><?= $patient->occupation ?></td>
            </tr>
            <tr>
			<td>Departamento</td>
			<td><?= $patient->department ?></td>
            </tr>
            <tr>
			<td>Municipio</td>
			<td><?= $patient->town ?></td>
            </tr>
            <tr>
			<td>Hijos</td>
			<td><?= $patient->children ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Transporte</td>
			<td><?= $patient->transport ?></td>
            </tr>
            <tr>
			<td>Dinero Mensual</td>
			<td>$<?= $patient->money ?></td>
            </tr>
            <tr>
			<td>Creado</td>
			<td><?= $patient->created->nice() ?></td>
            </tr>
            <tr>
			<td>Modificado</td>
			<td><?= $patient->modified->nice() ?></td>
            </tr>
            <!--Adicciones-->
            <?php if($addiction): ?>
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
            <?php endif; ?>
            <!--Fin adicciones-->
            <!--Alergias-->
            <?php if($allergy): ?>
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
            <!--Fin Alergias-->
            <?php endif; ?>
            <!--Eathabits-->
            <?php if($eathabit): ?>
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
            <tr>
			<td>Bebidas energéticas</td>
			<td><?= $eathabit->energydrinks ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Tipo de Aceite</td>
			<td><?= $eathabit->typeoil ?></td>
            </tr>
            <?php endif; ?>
            <!--Fin Eathabits-->
            <!--Immunizations-->
            <?php if($immunization): ?>
            <tr>
			<td>Vacunas Completas</td>
			<td><?= $immunization->vaccines ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Pendientes</td>
			<td><?= $immunization->pending ?></td>
            </tr>
            <tr>
			<td>Prevención sexual</td>
			<td><?= $immunization->sexualprevention ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Preservativo</td>
			<td><?= $immunization->condom ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
            <tr>
			<td>Edad de Inicio</td>
			<td><?= $immunization->ageonset ?></td>
            </tr>
            <tr>
			<td>Planificando</td>
			<td><?= $immunization->planning ? 'SI' : 'NO' ?></td>
            </tr>
            <tr>
			<td>Protocolo de inyección</td>
			<td><?= $immunization->injectionprotocol ?></td>
            </tr>
            <?php endif; ?>
            <!--Fin Immunizations-->
            <!--Inheritances-->
            <?php if($inheritance): ?>
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
            <?php endif; ?>
            <!--Fin Inheritances-->
            <!--Lifestyles-->
            <?php if($lifestyle): ?>
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
            <?php endif; ?>
            <!--Fin Lifestyles-->
            <!--Nonpathologicals-->
            <?php if($nonpathological): ?>
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
            <!--Fin Nonpathologicals-->
            <?php endif; ?>
            <?php if($patient->gender == 'female'): ?>
            <?php if($obstetric): ?>
            <!--Obstetrics-->
            <tr>
			<td>Menarquía</td>
			<td><?= $obstetric->menarche ?></td>
            </tr>
            <tr>
			<td>Ritmo menstrual</td>
			<td><?= $obstetric->menstrualrhit ? 'SI' : 'NO' ?></td>
            </tr>
			<td>F.U.M</td>
			<td>
            <?php if($obstetric->fum != NULL): ?>
            <?= $obstetric->fum->nice() ?>
            <?php endif; ?>
            </td>
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
			<td>
            <?php if($obstetric->fpp != NULL): ?>
            <?= $obstetric->fpp->nice() ?>
            <?php endif; ?>
            </td>
            </tr>
            <tr>
			<td>F.U.P</td>
			<td>
            <?php if($obstetric->fup != NULL): ?>
            <?= $obstetric->fup->nice() ?>
             <?php endif; ?>
            </td>
            </tr>
            <tr>
			<td>Embarazada</td>
			<td><?= $obstetric->pregnant ? 'SI' : 'NO'  ?></td>
            </tr>
            <tr>
			<td>En control</td>
			<td><?= $obstetric->treatment ? 'SI' : 'NO'  ?></td>
            </tr>
            <?php endif; ?>
            <?php endif; ?>
            <!--Fin Obstetrics-->
            <!--Pathologicals-->
            <?php if($pathological): ?>
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
			<td><?= $pathological->zoonosi->name ?>
            </td>
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
            <?php endif; ?>
            <!--Fin Pathologicals-->
            <!--Pstress-->
            <?php if($pstres): ?>
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
            <?php endif; ?>
            <!--Fin Pstress-->
            <!--Symptoms-->
            <?php if($symptom): ?>
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
			<td>Tipo de sangre</td>
			<td><?= $symptom->blood ?></td>
            </tr>
			<td>Exploración</td>
			<td> <?= $symptom->exploration ?></td>
            </tr>
			<td>Diagnostico</td>
			<td><?= $symptom->diagnostic ?></td>
            </tr>
            <?php endif; ?>
            <!--Fin Symptoms-->
			</tbody>
        </table>
</div>
        </div>
    </div>     
</div>


        