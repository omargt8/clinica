<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $pathological->patient->first_name. ' ' .$pathological->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $pathological->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Intervención quirúrgica:</dt>
                <dd>
                    <?= $pathological->surgicalinterven ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de intervención:</dt>
                <dd>
                    <?= $pathological->typeintervention ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Enfermedad venerea:</dt>
                <dd>
                    <?= $pathological->venerealdiseases ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de enfermedad venerea:</dt>
                <dd>
                    <?= $pathological->typevenereal ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Enfermedades conjuntas:</dt>
                <dd>
                    <?= $pathological->diasesjoint ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tuberculosis:</dt>
                <dd>
                    <?= $pathological->tuberculosis ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de zoonosis:</dt>
                <dd>
                    <?= $pathological->has('zoonosi') ? $this->Html->link($pathological->zoonosi->name,
                     ['controller' => 'Zoonosis', 'action' => 'view', $pathological->zoonosi->id]) : '' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Riesgo de enfermedades:</dt>
                <dd>
                    <?= $pathological->diseasesrisk ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Otras cardiopatías:</dt>
                <dd>
                    <?= $pathological->othercardiopatia ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tratamiento:</dt>
                <dd>
                    <?= $pathological->treatment ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Colon irritable:</dt>
                <dd>
                    <?= $pathological->irritablecolon ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Peptica:</dt>
                <dd>
                    <?= $pathological->peptica ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Estreñimiento:</dt>
                <dd>
                    <?= $pathological->constipation ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Firma:</dt>
                <dd>
                    <?= $pathological->signature ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $pathological->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $pathological->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        