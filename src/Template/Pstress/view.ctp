<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $pstres->patient->first_name. ' ' .$pstres->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $pstres->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Horas de estudio diarias:</dt>
                <dd>
                    <?= $pstres->studyhours ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Días de estudio a la semana:</dt>
                <dd>
                    <?= $pstres->studydays ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Stress:</dt>
                <dd>
                    <?= $pstres->stress ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Stress antes de las evaluaciones:</dt>
                <dd>
                    <?= $pstres->beforeevaluations ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Stress durante de las evaluaciones:</dt>
                <dd>
                    <?= $pstres->duringevaluations ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Unidad de apoyo:</dt>
                <dd>
                    <?= $pstres->supportunit ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $pstres->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $pstres->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        