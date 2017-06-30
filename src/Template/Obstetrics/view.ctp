<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $obstetric->patient->first_name. ' ' .$obstetric->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $obstetric->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Menarquía:</dt>
                <dd>
                    <?= $obstetric->menarche ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Ritmo menstrual:</dt>
                <dd>
                    <?= $obstetric->menstrualrhit ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>F.U.M:</dt>
                <dd>
                    <?= $obstetric->fum->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Hijos:</dt>
                <dd>
                    <?= $obstetric->children ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cantidad de hijos:</dt>
                <dd>
                    <?= $obstetric->cantchildren ?>
                    &nbsp;
                </dd>
                <br>

                <dt>F.P.P:</dt>
                <dd>
                    <?= $obstetric->fpp->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>F.U.P:</dt>
                <dd>
                    <?= $obstetric->fup->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Embarazada:</dt>
                <dd>
                    <?= $obstetric->pregnant ? 'SI' : 'NO'  ?>
                    &nbsp;
                </dd>
                <br>

                <dt>En control:</dt>
                <dd>
                    <?= $obstetric->treatment ? 'SI' : 'NO'  ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $obstetric->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $obstetric->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        