<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
                <h2><?= $nonpathological->patient->first_name. ' ' .$nonpathological->patient->last_name ?></h2>
                <?= $this->Html->link('Generar PDF', ['action' => 'view', $nonpathological->id, '_ext' => 'pdf']); ?>
            <?php endif; ?>
        </div>   
    

                <dt>Tipo de agua:</dt>
                <dd>
                    <?= $nonpathological->water ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Casa:</dt>
                <dd>
                    <?= $nonpathological->house ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Piso:</dt>
                <dd>
                    <?= $nonpathological->floor ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Techo:</dt>
                <dd>
                    <?= $nonpathological->ceiling ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $nonpathological->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $nonpathological->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        