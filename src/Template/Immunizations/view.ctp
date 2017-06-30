<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
             <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $immunization->patient->first_name. ' ' .$immunization->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $immunization->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Vacunas Completas:</dt>
                <dd>
                    <?= $immunization->vaccines ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Pendientes:</dt>
                <dd>
                    <?= $immunization->pending ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Prevención sexual:</dt>
                <dd>
                    <?= $immunization->sexualprevention ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Preservativo:</dt>
                <dd>
                    <?= $immunization->condom ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Edad de inicio:</dt>
                <dd>
                    <?= $immunization->ageonset ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Planificando</dt>
                <dd>
                    <?= $immunization->planning ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Protocolo de inyección:</dt>
                <dd>
                    <?= $immunization->injectionprotocol ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $immunization->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $immunization->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        