<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $pat->patient->first_name. ' ' .$pat->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $pat->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Intervención quirúrgica:</dt>
                <dd>
                    <?= $pat->surgicalinterven ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de intervención:</dt>
                <dd>
                    <?= $pat->typeintervention ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Enfermedad venerea:</dt>
                <dd>
                    <?= $pat->venerealdiseases ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de enfermedad venerea:</dt>
                <dd>
                    <?= $pat->typevenereal ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Enfermedades conjuntas:</dt>
                <dd>
                    <?= $pat->diasesjoint ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tuberculosis:</dt>
                <dd>
                    <?= $pat->tuberculosis ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de zoonosis:</dt>
                <dd>
                    <?= $pat->has('zoonosi') ? $this->Html->link($pat->zoonosi->name,
                     ['controller' => 'Zoonosis', 'action' => 'view', $pat->zoonosi->id]) : '' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Riesgo de enfermedades:</dt>
                <dd>
                    <?= $pat->diseasesrisk ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Otras cardiopatías:</dt>
                <dd>
                    <?= $pat->othercardiopatia ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tratamiento:</dt>
                <dd>
                    <?= $pat->treatment ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Colon irritable:</dt>
                <dd>
                    <?= $pat->irritablecolon ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Peptica:</dt>
                <dd>
                    <?= $pat->peptica ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Estreñimiento:</dt>
                <dd>
                    <?= $pat->constipation ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Firma:</dt>
                <dd>
                    <?= $pat->signature ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $pat->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $pat->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>