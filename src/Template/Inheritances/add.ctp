<?= $this->Html->script('hideinput')  ?>

<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <div class = "page-header">
            <h2>Enfermedades hereditarias</2>
        </div>
        <?= $this->Flash->render() ?>

        <?php if($search->count != 1): ?>
            <?= $this->Form->create($inheritance, ['novalidate']) ?>
            <fieldset>
                <?php
                    echo $this->Form->input('hypertension', ['label' => 'Hipertensión']);
                    echo $this->Form->input('mellitusdiabetes', ['label' => 'Diabetes Mellitus']);
                    echo $this->Form->input('cardiopathies', ['label' => 'Cardiopatías']);
                    echo $this->Form->input('nephropathy', ['label' => 'Nefropatías']);
                    echo $this->Form->input('epilpsy', ['label' => 'Epilepsia']);
                    echo $this->Form->input('bronchialasthma', ['label' => 'Asma bronquial']);
                    echo $this->Form->input('cancer', ['label' => 'Cancer', 'onchange' => 'javascript:showContent()', 'id' => 'active']);
                ?>
                <div id="content" style="display: none;">
                    <?php
                    echo $this->Form->input('typecancer', ['label' => 'Tipo de cancer']);
                    ?>
                </div>
                    <label for="textarea">Otros</label>
                <?php
                    echo $this->Form->textarea('others', ['rows' => '3']);
                ?>
                <br />
                <br />
            </fieldset>
            <?= $this->Form->button('Crear', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
</div>