<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
             <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $allergy->patient->first_name. ' ' .$allergy->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $allergy->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Polen:</dt>
                <dd>
                    <?= $allergy->pollen ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Polvo:</dt>
                <dd>
                    <?= $allergy->dust ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Clima:</dt>
                <dd>
                    <?= $allergy->weather ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Comida:</dt>
                <dd>
                    <?= $allergy->food ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Bebidas:</dt>
                <dd>
                    <?= $allergy->drink ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Medicamentos:</dt>
                <dd>
                    <?= $allergy->medication ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Otros:</dt>
                <dd>
                    <?= $allergy->others ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $allergy->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $allergy->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        