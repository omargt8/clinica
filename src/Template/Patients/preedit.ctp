<html>
<?= $this->Html->css('grid3.css') ?>
<body>
    <br>
    <div class = "well">
		<h3>Editar datos de:</h3>
        <h2><?= h($patient->first_name) ?> (<?= h($patient->carnet) ?>)</h2>
		<?= $this->Html->link('Ver', ['action' => 'preview', $patient->id], ['class' => 'btn btn-small btn-info']) ?>
		<?= $this->Html->link('Editar', ['action' => 'preedit'], ['class' => 'btn btn-small btn-info disabled', 'disabled']) ?>
    </div>
    <br>
	<main>
		<section class="thumbnail-grid flex">
			<a href="#" class="flex-item">
				<figure class="i1">
					<figcaption>
                        <?= $this->Html->link('Datos Personales', ['action' => 'edit', $patient->id]) ?>
                    </figcaption>
				</figure>

             <?php if($allergy): ?>
			<a href="#" class="flex-item">
				<figure class="i2">
					<figcaption>
                        <?= $this->Html->link('Datos alergicos', ['controller' => 'Allergys', 'action' => 'edit', $allergy->id]) ?>
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
                        <?= $this->Html->link('Habitos Alimenticios', ['controller' => 'Eathabits', 'action' => 'edit', $eathabit->id]) ?>
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
                        <?= $this->Html->link('Inmunizaciones', ['controller' => 'Immunizations', 'action' => 'edit', $immunization->id]) ?>
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
                        <?= $this->Html->link('Enfermedades Hereditarias', ['controller' => 'Inheritances', 'action' => 'edit', $inheritance->id]) ?>
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
                        <?= $this->Html->link('Estilos de vida', ['controller' => 'Lifestyles', 'action' => 'edit', $lifestyle->id]) ?>
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
                        <?= $this->Html->link('Datos no Patologicos', ['controller' => 'Nonpathologicals', 'action' => 'edit', $nonpathological->id]) ?>
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
                        <?= $this->Html->link('Datos Obstetricos', ['controller' => 'Obstetrics', 'action' => 'edit', $obstetric->id]) ?>
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
                        <?= $this->Html->link('Datos Patologicos', ['controller' => 'Pathologicals', 'action' => 'edit', $pathological->id]) ?>
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
                        <?= $this->Html->link('Adicciones', ['controller' => 'Addictions', 'action' => 'edit', $addiction->id]) ?>
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
                        <?= $this->Html->link('Estres', ['controller' => 'Pstress', 'action' => 'edit', $pstres->id]) ?>
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
                        <?= $this->Html->link('Sintomas', ['controller' => 'Symptoms', 'action' => 'edit', $symptom->id]) ?>
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