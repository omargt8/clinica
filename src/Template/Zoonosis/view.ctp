<br>
<div class="well col-md-12">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
                <h2>Zoonosis</h2>
        </div>   
    

                <dt>Nombre zoonosi:</dt>
                <dd>
                    <?= $zoonosi->name ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Tratamiento:</dt>
                <dd>
                    <?= $zoonosi->treatment ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Creado:</dt>
                <dd>
                    <?= $zoonosi->created->nice() ?>
                    &nbsp;
                </dd>
                <br>

                <dt>Modificado:</dt>
                <dd>
                    <?= $zoonosi->modified->nice() ?>
                    &nbsp;
                </dd>
                <br>   
        </div>
    </div>


        