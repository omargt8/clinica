<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $addiction->patient->first_name. ' ' .$addiction->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $addiction->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Fumador:</dt>
                <dd>
                    <?= $addiction->smoking ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cantidad consumida:</dt>
                <dd>
                    <?= $addiction->quantityconsumed ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tiempo inhalando nicotina:</dt>
                <dd>
                    <?= $addiction->timeinhalnicotine ?>
                    &nbsp;
                </dd>
                <br>
                
                <dt>Fumador pasivo:</dt>
                <dd>
                    <?= $addiction->passivesmoker ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Familiar fumador:</dt>
                <dd>
                    <?= $addiction->parientssmoke ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>


                <dt>Alcoholismo:</dt>
                <dd>
                    <?= $addiction->alcoholism ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tiempo consumiendo:</dt>
                <dd>
                    <?= $addiction->timeintake ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Cantidad:</dt>
                <dd>
                    <?= $addiction->quantity ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Coalcoholico:</dt>
                <dd>
                    <?= $addiction->coalcoholic ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Adicción a drogas:</dt>
                <dd>
                    <?= $addiction->drugaddiction ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de droga:</dt>
                <dd>
                    <?= $addiction->type ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Violencia:</dt>
                <dd>
                    <?= $addiction->violence ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de violencia:</dt>
                <dd>
                    <?= $addiction->typeviolence ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $addiction->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $addiction->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        