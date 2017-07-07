<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Alergias</h2>
        </div>
        <?= $this->Flash->render() ?>

        <?php if($search->count != 1): ?>
            <?= $this->Form->create($allergy, ['novalidate']) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('pollen', ['label' => 'Polen']);
                        echo $this->Form->input('dust', ['label' => 'Polvo']);
                        echo $this->Form->input('weather', ['label' => 'Clima']);
                        echo $this->Form->input('food', ['label' => 'Comida']);
                        echo $this->Form->input('drink', ['label' => 'Bebidas']);
                        echo $this->Form->input('medication', ['label' => 'Medicamentos']);
                        echo $this->Form->input('others', ['label' => 'Otros', 'type' => 'textarea' , 'rows' => '3']);
                    ?>
                    <br />
                    <br />
                </fieldset>
                <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
</div> 