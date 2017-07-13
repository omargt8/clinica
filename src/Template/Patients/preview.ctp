<html>
<?= $this->Html->css('grid3.css') ?>
<body>
    <br>
		<?= $this->Flash->render() ?>
    <br>
    <div class = "well">
	<h3>Visualizar datos de:</h3>
	<?php if(isset($current_user['role']) and $current_user['role'] === 'admin') : ?>
        <h2><?= h($patient->first_name) ?> (<?= h($patient->carnet) ?>)</h2>
		<?= $this->Html->link('Generar PDF', ['action' => 'preview', $patient->id, '_ext' => 'pdf'], ['class' => 'btn btn-sm btn-success']); ?>
		<?= $this->Html->link('Ver', ['action' => 'preview'], ['class' => 'btn btn-small btn-info disabled', 'disabled']) ?>
		<?= $this->Html->link('Editar', ['action' => 'preedit', $patient->id], ['class' => 'btn btn-small btn-info']) ?>
	<?php else : ?>
        <h2><?= h($patient->carnet) ?></h2>
	<?php endif; ?>
    </div>
    <br>
	<main>
		<section class="thumbnail-grid flex">
			<a href="#" class="flex-item">
				<figure class="i1">
					<figcaption>
                        <?= $this->Html->link('Datos Personales', ['action' => 'view', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>

            <?php if($allergy): ?>
			<a href="#" class="flex-item">
				<figure class="i2">
					<figcaption>
                        <?= $this->Html->link('Datos alergicos', ['controller' => 'Allergys', 'action' => 'view', $allergy->id]) ?>
                    </figcaption>
				</figure>
			</a>

            <?php else: ?>
			<a href="#" class="flex-item">
				<figure class="i2">
					<figcaption>
                        <?= $this->Html->link('Datos alergicos', ['controller' => 'Allergys', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php endif; ?>




            <?php if($eathabit): ?>
			<a href="#!" class="flex-item">
				<figure class="i3">
					<figcaption>
                        <?= $this->Html->link('Habitos Alimenticios', ['controller' => 'Eathabits', 'action' => 'view', $eathabit->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i3">
					<figcaption>
                        <?= $this->Html->link('Habitos Alimenticios', ['controller' => 'Eathabits', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>




            <?php if($immunization): ?>
			<a href="#!" class="flex-item">
				<figure class="i4">
					<figcaption>
                        <?= $this->Html->link('Inmunizaciones', ['controller' => 'Immunizations', 'action' => 'view', $immunization->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i4">
					<figcaption>
                        <?= $this->Html->link('Inmunizaciones', ['controller' => 'Immunizations', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>


            <?php if($inheritance): ?>
			<a href="#!" class="flex-item">
				<figure class="i5">
					<figcaption>
                        <?= $this->Html->link('Enfermedades Hereditarias', ['controller' => 'Inheritances', 'action' => 'view', $inheritance->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i5">
					<figcaption>
                        <?= $this->Html->link('Enfermedades Hereditarias', ['controller' => 'Inheritances', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>



            <?php if($lifestyle): ?>
			<a href="#!" class="flex-item">
				<figure class="i6">
					<figcaption>
                        <?= $this->Html->link('Estilos de vida', ['controller' => 'Lifestyles', 'action' => 'view', $lifestyle->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i6">
					<figcaption>
                        <?= $this->Html->link('Estilos de vida', ['controller' => 'Lifestyles', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>



            <?php if($nonpathological): ?>
			<a href="#!" class="flex-item">
				<figure class="i7">
					<figcaption>
                        <?= $this->Html->link('Datos no Patologicos', ['controller' => 'Nonpathologicals', 'action' => 'view', $nonpathological->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i7">
					<figcaption>
                        <?= $this->Html->link('Datos no Patologicos', ['controller' => 'Nonpathologicals', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>





            <?php if($obstetric): ?>
			<a href="#!" class="flex-item">
				<figure class="i8">
					<figcaption>
                        <?= $this->Html->link('Datos Obstetricos', ['controller' => 'Obstetrics', 'action' => 'view', $obstetric->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php elseif($patient->gender == 'female'): ?>
			<a href="#!" class="flex-item">
				<figure class="i8">
					<figcaption>
                        <?= $this->Html->link('Datos Obstetricos', ['controller' => 'Obstetrics', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>



            <?php if($pathological): ?>
			<a href="#!" class="flex-item">
				<figure class="i9">
					<figcaption>
                        <?= $this->Html->link('Datos Patologicos', ['controller' => 'Pathologicals', 'action' => 'view', $pathological->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php elseif($pat): ?>
			<a href="#!" class="flex-item">
				<figure class="i9">
					<figcaption>
                        <?= $this->Html->link('Datos Patologicos', ['controller' => 'Pathologicals', 'action' => 'viewzoo', $pat->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i9">
					<figcaption>
                        <?= $this->Html->link('Datos Patologicos', ['controller' => 'Pathologicals', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>



            <?php if($addiction): ?>
			<a href="#!" class="flex-item">
				<figure class="i10">
					<figcaption>
                        <?= $this->Html->link('Adicciones', ['controller' => 'Addictions', 'action' => 'view', $addiction->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i10">
					<figcaption>
                        <?= $this->Html->link('Adicciones', ['controller' => 'Addictions', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>



            <?php if($pstres): ?>
			<a href="#!" class="flex-item">
				<figure class="i11">
					<figcaption>
                        <?= $this->Html->link('Estres', ['controller' => 'Pstress', 'action' => 'view', $pstres->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
			<a href="#!" class="flex-item">
				<figure class="i11">
					<figcaption>
                        <?= $this->Html->link('Estres', ['controller' => 'Pstress', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>



            <?php if($symptom): ?>
			<a href="#!" class="flex-item">
				<figure class="i12">
					<figcaption>
                        <?= $this->Html->link('Sintomas', ['controller' => 'Symptoms', 'action' => 'view', $symptom->id]) ?>
                    </figcaption>
				</figure>
			</a>
			<?php else: ?>
				<figure class="i12">
					<figcaption>
                        <?= $this->Html->link('Sintomas', ['controller' => 'Symptoms', 'action' => 'add2', $patient->id]) ?>
                    </figcaption>
				</figure>
			</a>
            <?php endif; ?>
		</section>
        <br><br>
	</main>
</body>
</html>