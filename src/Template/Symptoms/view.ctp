<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $symptom->patient->first_name. ' ' .$symptom->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $symptom->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Astenia:</dt>
                <dd>
                    <?= $symptom->asthenia ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Adinamia:</dt>
                <dd>
                    <?= $symptom->adynamia ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Anorexia:</dt>
                <dd>
                    <?= $symptom->anorexy ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Fiebre:</dt>
                <dd>
                    <?= $symptom->fever ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Dolor de cabeza:</dt>
                <dd>
                    <?= $symptom->headache ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Consulta:</dt>
                <dd>
                    <?= $symptom->consultation ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Condición:</dt>
                <dd>
                    <?= $symptom->ccondition ?>
                    &nbsp;
                </dd>
                <br>

                <dt>FC:</dt>
                <dd>
                    <?= $symptom->fc ?>
                    &nbsp;
                </dd>
                <br>

                <dt>TA:</dt>
                <dd>
                    <?= $symptom->ta ?>
                    &nbsp;
                </dd>
                <br>

                <dt>FR:</dt>
                <dd>
                    <?= $symptom->fr ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Temperatura:</dt>
                <dd>
                    <?= $symptom->temperature ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Peso:</dt>
                <dd>
                    <?= $symptom->weight ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Altura:</dt>
                <dd>
                    <?= $symptom->csize ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Índice de Masa Corporal:</dt>
                <dd>
                    <?= $symptom->imc ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de sangre:</dt>
                <dd>
                    <?= $symptom->blood ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Exploración:</dt>
                <dd>
                    <?= $symptom->exploration ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Diagnostico:</dt>
                <dd>
                    <?= $symptom->diagnostic ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $symptom->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $symptom->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        