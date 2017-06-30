<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $lifestyle->patient->first_name. ' ' .$lifestyle->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $lifestyle->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Ejercicio:</dt>
                <dd>
                    <?= $lifestyle->workshop ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Deportes:</dt>
                <dd>
                    <?= $lifestyle->sport ? 'SI' : 'NO' ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tipo de deporte:</dt>
                <dd>
                    <?= $lifestyle->type ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Frecuencia:</dt>
                <dd>
                    <?= $lifestyle->frequency ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $lifestyle->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $lifestyle->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        