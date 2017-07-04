<style type="text/css">


/* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 30px auto 0;
	padding: 14px 15px;
	color: #fff;
	font-size:14px;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	letter-spacing: .08em;
	border-radius: 0;
	text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
	transition: all 1s ease;
}
a.animated-button:link:after, a.animated-button:visited:after {
	content: "";
	position: absolute;
	height: 0%;
	left: 50%;
	top: 50%;
	width: 150%;
	z-index: -1;
	-webkit-transition: all 0.75s ease 0s;
	-moz-transition: all 0.75s ease 0s;
	-o-transition: all 0.75s ease 0s;
	transition: all 0.75s ease 0s;
}
a.animated-button:link:hover, a.animated-button:visited:hover {
	color: #FFF;
	text-shadow: none;
}
a.animated-button:link:hover:after, a.animated-button:visited:hover:after {
	height: 450%;
}
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 30px auto 0;
	padding: 14px 15px;
	color: #fff;
	font-size:14px;
	border-radius: 0;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	letter-spacing: .08em;
	text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
	transition: all 1s ease;
}

/* Victoria Buttons */
a.animated-button.victoria-four {
	border: 2px solid #D24D57;
    font-size: 10px;
    color: black;
}
a.animated-button.victoria-four:after {
	background: #D24D57;
	opacity: .5;
	-moz-transform: translateY(-50%) translateX(-50%) rotate(90deg);
	-ms-transform: translateY(-50%) translateX(-50%) rotate(90deg);
	-webkit-transform: translateY(-50%) translateX(-50%) rotate(90deg);
	transform: translateY(-50%) translateX(-50%) rotate(90deg);
}
a.animated-button.victoria-four:hover:after {
	opacity: 1;
	height: 600% !important;
}
</style>

<br>
<?= $this->Flash->render() ?>
<br>
<div class="jumbotron text-center">
  <div class="container">
    <h2>Opciones Avanzadas</h2>
    <p style="color:#888;">Selecciona la opción que quieras cambiar</p>
    
  </div>
</div>

<div class="container"> 
  <!-- Example row of columns -->
  
  <div class="row">
    <div class="col-md-12 text-center">
      <h2 style="color: blue" >SELECCIONE</h2>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <?= $this->Html->link('Actualizar Antiguo Ingreso', ['controller' => 'Patients', 'action' => 'update'], ['class' => 'btn btn-sm animated-button victoria-four']) ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <?= $this->Html->link('Deshabilitar Usuarios', ['controller' => 'Users', 'action' => 'block'], ['class' => 'btn btn-sm animated-button victoria-four']) ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <?= $this->Html->link('Habilitar Usuarios', ['controller' => 'Users', 'action' => 'unblock'], ['class' => 'btn btn-sm animated-button victoria-four']) ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <?= $this->Html->link('Ver Facultades', ['controller' => 'Faculties', 'action' => 'index'], ['class' => 'btn btn-sm animated-button victoria-four']) ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <?= $this->Html->link('Ver Carreras', ['controller' => 'Careers', 'action' => 'index'], ['class' => 'btn btn-sm animated-button victoria-four']) ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <?= $this->Html->link('Zoonosis', ['controller' => 'Zoonosis', 'action' => 'index'], ['class' => 'btn btn-sm animated-button victoria-four']) ?>
    </div>
  </div>
</div>