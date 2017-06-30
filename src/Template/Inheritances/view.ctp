<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $inheritance->patient->first_name. ' ' .$inheritance->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $inheritance->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Hipertensión:</dt>
                <dd>
                    <?= $inheritance->hypertension ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Diabetes mellitus:</dt>
                <dd>
                    <?= $inheritance->mellitusdiabetes ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cardiopatías:</dt>
                <dd>
                    <?= $inheritance->cardiopathies ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Nefropatías:</dt>
                <dd>
                    <?= $inheritance->nephropathy ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Epilepsia:</dt>
                <dd>
                    <?= $inheritance->epilpsy ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Asma Bronquial</dt>
                <dd>
                    <?= $inheritance->bronchialasthma ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cancer:</dt>
                <dd>
                    <?= $inheritance->cancer ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de cancer:</dt>
                <dd>
                    <?= $inheritance->typecancer ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Otros:</dt>
                <dd>
                    <?= $inheritance->others ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $inheritance->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $inheritance->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        