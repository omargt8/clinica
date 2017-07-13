<br>
<div class="row">   
    <div class = " well col-md-12">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $patient->first_name. ' ' .$patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $patient->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
            </div>
        </div>
        <br>

        <div class="col-md-6">
            <dt>Carnet:</dt>
            <dd>
                <?= $patient->carnet ?>
                &nbsp;
            </dd>
            <br>

            <dt>Edad:</dt>
            <dd>
                <?= $patient->age ?>
                &nbsp;
            </dd>
            <br>

            <dt>Genero:</dt>
            <dd>
                <?php if($patient->gender == 'male'): ?>
                    Masculino
                <?php else: ?>
                    Femenino
                <?php endif; ?>
                &nbsp;
            </dd>
            <br>

            <dt>Ingreso:</dt>
            <dd>
                <?= $patient->income ?>
                &nbsp;
            </dd>
            <br>

            <dt>Facultad:</dt>
            <dd>
                <?= $patient->faculty->name ?>
                    &nbsp;
            </dd>
            <br>

            <dt>Carrera:</dt>
            <dd>
                <?= $patient->career->name ?>
                    &nbsp;
            </dd>
            <br>

            <dt>Estado Civil:</dt>
            <dd>
                <?= $patient->marital_status ?>
                &nbsp;
            </dd>
            <br>

            <dt>Ocupación:</dt>
            <dd>
                <?= $patient->occupation ?>
                &nbsp;
            </dd>
            <br>
        </div>

        <div class="col-md-6">
            <dt>Departamento:</dt>
            <dd>
                <?= $patient->department ?>
                &nbsp;
            </dd>
            <br>

            <dt>Municipio:</dt>
            <dd>
                <?= $patient->town ?>
                &nbsp;
            </dd>
            <br>

            <dt>Hijos:</dt>
            <dd>
                <?= $patient->children ? 'SI' : 'NO' ?>
                &nbsp;
            </dd>
            <br>

            <dt>Tipo de transporte:</dt>
            <dd>
                <?= $patient->transport ?>
                &nbsp;
            </dd>
            <br>

            <dt>Dinero mensual:</dt>
            <dd>
                <?= $patient->money ?>
                &nbsp;
            </dd>
            <br>

            <dt>Creado:</dt>
            <dd>
                <?= $patient->created->nice() ?>
                &nbsp;
            </dd>
            <br>

            <dt>MOdificado:</dt>
            <dd>
                <?= $patient->modified->nice() ?>
                &nbsp;
            </dd>
            <br>
        </div>
    </div>     
</div>


        