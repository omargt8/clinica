<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $eathabit->patient->first_name. ' ' .$eathabit->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $eathabit->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Tiempos de comida:</dt>
                <dd>
                    <?= $eathabit->mealtimes ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Refrigerios:</dt>
                <dd>
                    <?= $eathabit->refreshment ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de alimentación:</dt>
                <dd>
                    <?= $eathabit->feedingtime ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Vegetales:</dt>
                <dd>
                    <?= $eathabit->vegetables ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cantidad de vegetales:</dt>
                <dd>
                    <?= $eathabit->amountvegetables ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Frutas?</dt>
                <dd>
                    <?= $eathabit->fruits ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cantidad de Frutas:</dt>
                <dd>
                    <?= $eathabit->amountfruit ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Bebidad energéticas:</dt>
                <dd>
                    <?= $eathabit->energydrinks ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de aceite:</dt>
                <dd>
                    <?= $eathabit->typeoil ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $eathabit->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $eathabit->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        