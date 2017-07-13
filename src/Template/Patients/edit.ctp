
<?= $this->Html->script(['ajax']) ?>

<script type="text/javascript">

/**
*Funcion para trabajar con las carreras por Ajax
*/
function myFunction(str)
{
loadDoc("q="+str,"procphp",function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  });
}

/**
 * Funcion que se ejecuta al seleccionar una opcion del primer select
 */

function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function soloLetras(e) {
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toString();
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
		especiales = [8, 46, 6, 239]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

		tecla_especial = false
		for(var i in especiales) {
			if(key == especiales[i]) {
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla) == -1 && !tecla_especial){
			return false;
		  }
	}

function cargarSelect2(valor)
{
    /**
     * Este array contiene los valores sel segundo select
     * Los valores del mismo son:
     *  - hace referencia al value del primer select. Es para saber que valores
     *  mostrar una vez se haya seleccionado una opcion del primer select
     *  - value que se asignara
     *  - texto que se asignara
     */
    var arrayValores=new Array(
        // http://www.elsalvadormipais.com/municipios-de-el-salvador-por-departamentos

        // Municipios de Ahuachapan
        new Array('Ahuachapan',"Ahuachapan","Ahuachapan"),
        new Array('Ahuachapan',"Apaneca","Apaneca"),
        new Array('Ahuachapan',"Atiquizaya","Atiquizaya"),
        new Array('Ahuachapan',"Concepcion de Ataco","Concepcion de Ataco"),
        new Array('Ahuachapan',"El Refugio","El refugio"),
        new Array('Ahuachapan',"Guaymango","Guaymango"),
        new Array('Ahuachapan',"Jujutla","Jujutla"),
        new Array('Ahuachapan',"San Francisco Menendez","San Francisco Menendez"),
        new Array('Ahuachapan',"San Lorenzo","San Lorenzo"),
        new Array('Ahuachapan',"San Pedro Puxtla","San Pedro Puxtla"),
        new Array('Ahuachapan',"Tacuba","Tacuba"),
        new Array('Ahuachapan',"Turin","Turin"),
        // Municipios de Santa Ana
        new Array('Santa Ana',"Candelaria de la Frontera","Candelaria de la Frontera"),
        new Array('Santa Ana',"Coatepeque","Coatepeque"),
        new Array('Santa Ana',"El Congo","El Congo"),
        new Array('Santa Ana',"El Porvenir","El Porvenir"),
        new Array('Santa Ana',"Masahuat","Masahuat"),
        new Array('Santa Ana',"Metapan","Metapan"),
        new Array('Santa Ana',"San Antonio Pajonal","San Antonio Pajonal"),
        new Array('Santa Ana',"San Sebastian Salitrillo","San Sebastian Salitrillo"),
        new Array('Santa Ana',"Santa Ana","Chalchuapa"),
        new Array('Santa Ana',"Santa Rosa Guachipilin","Santa Rosa Guachipilin"),
        new Array('Santa Ana',"Santiago de la Frontera","San Antonio de la Frontera"),
        new Array('Santa Ana',"Texistepeque","Texistepeque"),
        new Array('Santa Ana',"Chalchuapa","Chalchuapa"),
        // Municipios de Sonsonate
        new Array('Sonsonate',"Acajutla","Acajutla"),
        new Array('Sonsonate',"Armenia","Armenia"),
        new Array('Sonsonate',"Caluco","Caluco"),
        new Array('Sonsonate',"Cuisnahuat","Cuisnahuat"),
        new Array('Sonsonate',"Izalco","Izalco"),
        new Array('Sonsonate',"Juayua","Juayua"),
        new Array('Sonsonate',"Nahuizalco","Nahuizalco"),
        new Array('Sonsonate',"Nahuilingo","Nahuilingo"),
        new Array('Sonsonate',"Salcoatitan","Salcoatitan"),
        new Array('Sonsonate',"San Antonio del Monte","San Antonio del Monte"),
        new Array('Sonsonate',"San Julian","San Julian"),
        new Array('Sonsonate',"Santa Catarina Masahuat","Santa Catarina Masahuat"),
        new Array('Sonsonate',"Santa Isabel Ishuatan","Santa Isabel Ishuatan"),
        new Array('Sonsonate',"Santo Domingo Guzman","Santo Domingo Guzman"),
        new Array('Sonsonate',"Sonsonate","Sonsonate"),
        new Array('Sonsonate',"Sonzacate","Sonzacate"),
        // Municipios de San Salvador
        new Array('San Salvador',"Apopa","Apopa"),
        new Array('San Salvador',"Aguilares","Aguilares"),
        new Array('San Salvador',"Ayutuxtepeque","Ayutuxtepeque"),
		new Array('San Salvador',"Cuscatancingo","Cuscatancingo"),
		new Array('San Salvador',"Ciudad Delgado","Ciudad Delgado"),
		new Array('San Salvador',"El Paisnal","El Paisnal"),
		new Array('San Salvador',"Guazapa","Guazapa"),
		new Array('San Salvador',"Ilopango","Ilopango"),
		new Array('San Salvador',"Mejicanos","Mejicanos"),
		new Array('San Salvador',"Nejapa","Nejapa"),
		new Array('San Salvador',"Panchimalco","Panchimalco"),
		new Array('San Salvador',"Rosario de Mora","Rosario de Mora"),
		new Array('San Salvador',"San Marcos","San Marcos"),
		new Array('San Salvador',"San Martin","San Martin"),
		new Array('San Salvador',"San Salvador","San Salvador"),
		new Array('San Salvador',"Santiago Texacuangos","Santiago Texacuangos"),
		new Array('San Salvador',"Santo Tomas","Santo Tomas"),
		new Array('San Salvador',"Soyapango","Soyapango"),
		new Array('San Salvador',"Tonacatepeque","Tonacatepeque"),
        // Municipios de Chalatenango
        new Array('Chalatenango',"Agua Caliente","Agua Caliente"),
        new Array('Chalatenango',"Arcatao","Arcatao"),
        new Array('Chalatenango',"Azacualpa","Azacualpa"),
        new Array('Chalatenango',"Chalatenango","Chalatenango"),
        new Array('Chalatenango',"Comalapa","Comalapa"),
        new Array('Chalatenango',"Citala","Citala"),
        new Array('Chalatenango',"Concepcion Quezaltepeque","Concepcion Quezaltepeque"),
        new Array('Chalatenango',"Dulce Nombre de Maria","Dulce Nombre de Maria"),
        new Array('Chalatenango',"El Carrizal","El Carrizal"),
        new Array('Chalatenango',"El Paraiso","El Paraiso"),
        new Array('Chalatenango',"La Laguna","La Laguna"),
        new Array('Chalatenango',"La Palma","La Palma"),
        new Array('Chalatenango',"La Reina","La Reina"),
        new Array('Chalatenango',"Las Vueltas","Las Vueltas"),
        new Array('Chalatenango',"Nueva Concepcion","Nueva Concepcion"),
        new Array('Chalatenango',"Nueva Trinidad","Nueva Trinidad"),
        new Array('Chalatenango',"Nombre de Jesus","Nombre de Jesus"),
        new Array('Chalatenango',"Ojos de Agua","Ojos de Agua"),
        new Array('Chalatenango',"Patonico","Patonico"),
        new Array('Chalatenango',"San Antonio de la Cruz","San Antonio de la Cruz"),
        new Array('Chalatenango',"San Antonio de los Ranchos","San Antonio de los Ranchos"),
        new Array('Chalatenango',"San Fernando","San Fernando"),
        new Array('Chalatenango',"San Francisco Lempa","San Francisco Lempa"),
        new Array('Chalatenango',"San Francisco Morazan","San Francisco Morazan"),
        new Array('Chalatenango',"San Ignacio","San Ignacio"),
        new Array('Chalatenango',"San Isidro Labrador","San Isidro Labrador"),
        new Array('Chalatenango',"San Jose Cancasque","San Jose Cancasque"),
        new Array('Chalatenango',"San Jose las Flores","San Jose las Flores"),
        new Array('Chalatenango',"San Luis del Carmen","San Luis del Carmen"),
        new Array('Chalatenango',"San Miguel de Mercedes","San Miguel de Mercedes"),
        new Array('Chalatenango',"San Rafael","San Rafael"),
        new Array('Chalatenango',"Santa Rita","Santa Rita"),
        new Array('Chalatenango',"Tejutla","Tejutla"),
        // Municipios de Cuscatlan
        new Array('Cuscatlan',"Candelaria","Candelaria"),
        new Array('Cuscatlan',"Cojutepeque","Cojutepeque"),
        new Array('Cuscatlan',"El Carmen","El Carmen"),
        new Array('Cuscatlan',"El Rosario","El Rosario"),
        new Array('Cuscatlan',"Monte San Juan","Monte San Juan"),
        new Array('Cuscatlan',"Oratorio de Concepcion","Oratorio de Concepcion"),
        new Array('Cuscatlan',"San Bartolome Perulapia","San Bartolome Perulapia"),
        new Array('Cuscatlan',"San Cristobal","San Cristobal"),
        new Array('Cuscatlan',"San Jose Guayabal","San Jose Guayabal"),
        new Array('Cuscatlan',"San Pedro Perulapan","San Pedro Perulapan"),
        new Array('Cuscatlan',"San Rafael Cedros","San Rafael Cedros"),
        new Array('Cuscatlan',"San Ramon","San Ramon"),
        new Array('Cuscatlan',"Santa Cruz Analquito","Santa Cruz Analquito"),
        new Array('Cuscatlan',"Santa Cruz Michapa","Santa Cruz Michpa"),
        new Array('Cuscatlan',"Suchitoto","Suchitoto"),
        new Array('Cuscatlan',"Tenancingo","Tenancingo"),
        // Municipios de La Libertad
        new Array('La Libertad',"Antiguo Cuscatlan","Antiguo Cuscatlan"),
        new Array('La Libertad',"Chiltiupan","Chiltiupan"),
        new Array('La Libertad',"Ciudad Arce","Ciudad Arce"),
        new Array('La Libertad',"Colon","Colon"),
        new Array('La Libertad',"Comosagua","Comasagua"),
        new Array('La Libertad',"Huizucar","Huizucar"),
        new Array('La Libertad',"Jayaque","Jayaque"),
        new Array('La Libertad',"Jicalapa","Jicalapa"),
        new Array('La Libertad',"La Libertad","La Libertad"),
        new Array('La Libertad',"Santa Tecla","Santa Tecla"),
        new Array('La Libertad',"Nuevo Cuscatlan","Nuevo Cuscatlan"),
        new Array('La Libertad',"San Juan Opico","San Juan Opico"),
        new Array('La Libertad',"Quezaltepeque","Quezaltepeque"),
        new Array('La Libertad',"Sacacoyo","Sacacoyo"),
        new Array('La Libertad',"San Jose Villanueva","San Jose Villanueva"),
        new Array('La Libertad',"San Matias","San Matias"),
        new Array('La Libertad',"San Pablo Tacachico","San Pablo Tacachico"),
        new Array('La Libertad',"Talnique","Talnique"),
        new Array('La Libertad',"Tamanique","Tamanique"),
        new Array('La Libertad',"Teotepeque","Teotepeque"),
        new Array('La Libertad',"Tepecoyo","Tepecoyo"),
        new Array('La Libertad',"Zaragoza","Zaragoza"),
        // Municipios de San Vicente
        new Array('San Vicente',"Apastepeque","Apastepeque"),
        new Array('San Vicente',"Guadalup","Guadalupe"),
        new Array('San Vicente',"San Cayetano Istepeque","San Cayetano Istepeque"),
        new Array('San Vicente',"San Esteban Catarina","San Esteban Catarina"),
        new Array('San Vicente',"San Ildefonso","San Ildefonso"),
        new Array('San Vicente',"San Lorenzo","San Lorenzo"),
        new Array('San Vicente',"San Sebastian","San Sebastian"),
        new Array('San Vicente',"San Vicente","San Vicente"),
        new Array('San Vicente',"Santa Clara","Santa Clara"),
        new Array('San Vicente',"Santo Domingo","Santo Domingo"),
        new Array('San Vicente',"Tecoluca","Tecoluca"),
        new Array('San Vicente',"Tepetitan","Tepetitan"),
        new Array('San Vicente',"Verapaz","Verapaz"),
        // Municipios de Cabañas
        new Array('Cabañas',"Cinquera","Cinquera"),
        new Array('Cabañas',"Dolores","Dolores"),
        new Array('Cabañas',"Guacotecti","Guacotecti"),
        new Array('Cabañas',"Ilobasco","Ilobasco"),
        new Array('Cabañas',"Jutiapa","Jutiapa"),
        new Array('Cabañas',"San Isidro","San Isidro"),
        new Array('Cabañas',"Sensuntepeque","Sensuntepeque"),
        new Array('Cabañas',"Tejutepeque","Tejutepeque"),
        new Array('Cabañas',"Victoria","Victoria"),
        // Municipios de La Paz
        new Array('La Paz',"Cuyultitan","Cuyultitan"),
        new Array('La Paz',"El Rosario","El Rosario"),
        new Array('La Paz',"Jerusalen","Jerusalen"),
        new Array('La Paz',"Mercedes la Ceiba","Mercedes la Ceiba"),
        new Array('La Paz',"Olocuilta","Olocuilta"),
        new Array('La Paz',"Paraiso de Osorio","Paraiso de Osorio"),
        new Array('La Paz',"San Antonio Masahuat","San Antonio Masahuat"),
        new Array('La Paz',"San Emigdio","San Emigdio"),
        new Array('La Paz',"San Francisco Chinameca","San Francisco Chinameca"),
        new Array('La Paz',"San Juan Nonualco","San Juan Nonualco"),
        new Array('La Paz',"San Juan Talpa","San Juan Talpa"),
        new Array('La Paz',"San Juan Tepezontes","San Juan Tepezontes"),
        new Array('La Paz',"San Luis Talpa","San Luis Talpa"),
        new Array('La Paz',"San Luis la Herradura","San Luis la Herradura"),
        new Array('La Paz',"San Miguel Tepezontes","San Miguel Tepezontes"),
        new Array('La Paz',"San Pedro Masahuat","San Pedro Masahuat"),
        new Array('La Paz',"San Pedro Nonualco","San Pedro Nonualco"),
        new Array('La Paz',"San Rafael Obrajuelo","San Rafael Obrajuelo"),
        new Array('La Paz',"Santa Maria Ostuma","Santa Maria Ostuma"),
        new Array('La Paz',"Santiago Nonualco","Santiago Nonualco"),
        new Array('La Paz',"Tapalhuaca","Tapalhuaca"),
        new Array('La Paz',"Zacatecoluca","Zacatecoluca"),
        // Municipios de Usulutan
        new Array('Usulutan',"Alegria","Alegria"),
        new Array('Usulutan',"Berlin","Berlin"),
        new Array('Usulutan',"California","California"),
        new Array('Usulutan',"Concepcion Batres","Concepcion Batres"),
        new Array('Usulutan',"El triunfo","El triunfo"),
        new Array('Usulutan',"Ereguayquin","Ereguayquin"),
        new Array('Usulutan',"Estanzuelas","Estanzuelas"),
        new Array('Usulutan',"Jiquilisco","Jiquilisco"),
        new Array('Usulutan',"Jucuapa","Jucuapa"),
        new Array('Usulutan',"jucuaran","jucuaran"),
        new Array('Usulutan',"Mercedes Umaña","Mercedes Umaña"),
        new Array('Usulutan',"Nueva Granada","Nueva Granada"),
        new Array('Usulutan',"Ozatlan","Ozatlan"),
        new Array('Usulutan',"Puerto el Triunfo","Puerto el Triunfo"),
        new Array('Usulutan',"San Agustin","San Agustin"),
        new Array('Usulutan',"San Beunaventura","San Beunaventura"),
        new Array('Usulutan',"San Dionisio","San Dionisio"),
        new Array('Usulutan',"San Francisco Javier","San Francisco Javier"),
        new Array('Usulutan',"Santa Elena","Santa Elena"),
        new Array('Usulutan',"Santa Maria","Santa Maria"),
        new Array('Usulutan',"Santiago de Maria","Santiago de Maria"),
        new Array('Usulutan',"Tecapan","Tecapan"),
        new Array('Usulutan',"Usulutan","Usulutan"),
        // Municipios de Usulutan
        new Array('San Miguel',"Carolina","Carolina"),
        new Array('San Miguel',"Chapeltique","Chapeltique"),
        new Array('San Miguel',"Chinameca","Chinameca"),
        new Array('San Miguel',"Chirilagua","Chirilagua"),
        new Array('San Miguel',"Ciudad Barrios","Ciudad Barrios"),
        new Array('San Miguel',"Comacaran","Comacaran"),
        new Array('San Miguel',"El Transito","El Transito"),
        new Array('San Miguel',"Lolotique","Lolotique"),
        new Array('San Miguel',"Moncagua","Moncagua"),
        new Array('San Miguel',"Nueva Guadalupe","Nueva Guadalupe"),
        new Array('San Miguel',"Nuevo Eden de San Juan","Nuevo Eden de San Juan"),
        new Array('San Miguel',"Quelepa","Quelepa"),
        new Array('San Miguel',"San Antonio del Mosco","San Antonio del Mosco"),
        new Array('San Miguel',"San Gerardo","San Gerardo"),
        new Array('San Miguel',"San Jorge","San Jorge"),
        new Array('San Miguel',"San Luis de la Reina","San Luis de la Reina"),
        new Array('San Miguel',"San Miguel","San Miguel"),
        new Array('San Miguel',"San Rafael Oriente","San Rafael Oriente"),
        new Array('San Miguel',"Sesori","Sesori"),
        new Array('San Miguel',"Uluazapa","Uluazapa"),
        // Municipios de Morazan
        new Array('Morazan',"Arambala","Arambala"),
        new Array('Morazan',"Cacaopera","Cacaopera"),
        new Array('Morazan',"Chilanga","Chilanga"),
        new Array('Morazan',"Corinto","Corinto"),
        new Array('Morazan',"Delicias de Concepcion","Arambala"),
        new Array('Morazan',"El Divisadero","El Divisadero"),
        new Array('Morazan',"El Rosario","El Rosario"),
        new Array('Morazan',"Gualococti","Gualococti"),
        new Array('Morazan',"Guatajiagua","Guatajiagua"),
        new Array('Morazan',"Joateca","Joateca"),
        new Array('Morazan',"Jocoaitique","Jocoaitique"),
        new Array('Morazan',"Jocoro","Jocoro"),
        new Array('Morazan',"Lolotiquillo","Lolotiquillo"),
        new Array('Morazan',"Meanguera","Meanguera"),
        new Array('Morazan',"Osicala","Osicala"),
        new Array('Morazan',"Perquin","Perquin"),
        new Array('Morazan',"San Carlos","San Carlos"),
        new Array('Morazan',"San Fernando","San Fernando"),
        new Array('Morazan',"San Francisco Gotera","San Francisco Gotera"),
        new Array('Morazan',"San Isidro","San Isidro"),
        new Array('Morazan',"San Simon","San Simon"),
        new Array('Morazan',"Sensembra","Sensembra"),
        new Array('Morazan',"Sociedad","Sociedad"),
        new Array('Morazan',"Torola","Torola"),
        new Array('Morazan',"Yamabal","Yamabal"),
        new Array('Morazan',"Yoloaiquin","Yoloaiquin"),
        // Municipios de La Union
        new Array('La Union',"Anamoros","Anamoros"),
        new Array('La Union',"Bolivar","Bolivar"),
        new Array('La Union',"Concepcion de Oriente","Concepcion de Oriente"),
        new Array('La Union',"Conchagua","Conchagua"),
        new Array('La Union',"El Carmen","El Carmen"),
        new Array('La Union',"El Sauce","El Sauce"),
        new Array('La Union',"Intipuca","Intipuca"),
        new Array('La Union',"La Union","La Union"),
        new Array('La Union',"Lislique","Lislique"),
        new Array('La Union',"Meanguera del Golfo","Meanguera del Golfo"),
        new Array('La Union',"Nueva Esparta","Nueva Esparta"),
        new Array('La Union',"Pasaquina","Pasaquina"),
        new Array('La Union',"Poloros","Poloros"),
        new Array('La Union',"San Alejo","San Alejo"),
        new Array('La Union',"San Jose","San Jose"),
        new Array('La Union',"Santa Rosa de Lima","Santa Rosa de Lima"),
        new Array('La Union',"Yayantique","Yayantique"),
        new Array('La Union',"Yucuaiquin","Yucuaiquin")
    );
    if(valor==0)
    {
        // desactivamos el segundo select
        document.getElementById("select2").disabled=true;
    }else{
        // eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select2").options.length=0;
 
        // añadimos los nuevos valores al select2
        document.getElementById("select2").options[0]=new Option("(Seleccione)", "");
        for(i=0;i<arrayValores.length;i++)
        {
            // unicamente añadimos las opciones que pertenecen al id seleccionado
            // del primer select
            if(arrayValores[i][0]==valor)
            {
                document.getElementById("select2").options[document.getElementById("select2").options.length]=new Option(arrayValores[i][2], arrayValores[i][1]);
            }
        }
 
        // habilitamos el segundo select
        document.getElementById("select2").disabled=false;
    }
}
 
</script>
<div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <?= $this->Flash->render() ?>
                <div class = "page-header">
                    <h2>Editar Paciente</h2>
                 </div>
    </div>

        <div class = "col-md-12">
            <?= $this->Form->create($patient, ['validate']) ?>

            <div class="row">

            <!-- Campos de la izquierda  -->
                <div class="col-md-6">
                    <fieldset>
                        <?php
                            echo $this->Form->input('carnet', ['label' => '* Carnet', 'type' => 'text', 'maxlength' => '6',
                            'onkeypress' => 'return valida(event)']);
                            echo $this->Form->input('first_name', ['label' => '* Nombre', 'onkeypress' => 'return soloLetras(event);']);
                            echo $this->Form->input('last_name', ['label' => '* Apellidos', 'onkeypress' => 'return soloLetras(event);']);
                            echo $this->Form->input('age', ['options' => ['14' => '14', '15' => '15', '16' => '16', '17' => '17',
                            '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24',
                            '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'],'label' => '* Edad (años)',
                             'empty' => '(Seleccione)']);
                            echo $this->Form->input('gender', ['options' => ['male' =>
                            'Masculino', 'female' => 'Femenino'], 'label' => '* Genero', 'empty' => '(Seleccione)']);
                            echo $this->Form->input('marital_status', ['options' => ['soltero' =>
                            'Soltero', 'casado' => 'Casado', 'acompañado' => 'Acompañado', 'divorciado' => 'Divorciado',
                            'viudo' => 'Viudo'], 'label' => '* Estado Familiar', 'empty' => '(Seleccione)']);
                            echo $this->Form->input('occupation', ['label' => '* Ocupacion', 'onkeypress' => 'return soloLetras(event);']);
                            echo $this->Form->input('income', ['options' => ['nuevo ingreso' =>
                            'Nuevo ingreso', 'antiguo ingreso' => 'Antiguo ingreso'], 'label' => '* Ingreso a la Universidad', 'empty' => '(Seleccione)']);
                        ?>
                    </fieldset>
                </div>

                <!-- Campos de la derecha  -->
                <div class="col-md-6">
                    <fieldset>
                        <?php
                            echo $this->Form->input('department', ['options' => ['Ahuachapan' => 'Ahuachapan', 'Santa Ana' => 'Santa Ana',
                            'Sonsonate' => 'Sonsonate', 'Chalatenango' => 'Chalatenango', 'San Salvador' => 'San Salvador',
                            'La Libertad' => 'La Libertad', 'Cuscatlan' => 'Cuscatlan', 'Cabañas' => 'Cabañas',
                            'La Paz' => 'La Paz', 'San Vicente' => 'San Vicente', 'Usulutan' => 'Usulutan',
                            'San Miguel' => 'San Miguel', 'Morazan' => 'Morazan', 'La union' => 'La union'],
                            'label' => '* Departamento', 'empty' => '(Seleccione)', 'id' => 'select1', 'onchange' => 'cargarSelect2(this.value);']);
                            echo $this->Form->input('town', ['options' => [],
                            'label' => '* Municipio', 'id' => 'select2', 'empty' => '(Seleccione)', 'required']);
                            echo $this->Form->input('children', ['options' => ['1' =>
                            'SI', '0' => 'NO'], 'label' => '* Hijos', 'empty' => '(Seleccione)', 'required']);
                             echo $this->Form->input('transport', ['options' => ['Carro' =>
                            'Carro', 'Motocicleta' => 'Motocicleta', 'Bus' => 'Bus', 'Microbus' => 'Microbus',
                            'Taxi' => 'Taxi', 'A pie' => 'A pie'], 'label' => '* Tipo de Transporte Utilizado', 'empty' => '(Seleccione)']);
                            echo $this->Form->input('money', ['options' => ['1 - 20' =>
                            '1 - 20', '21 - 40' => '21 - 40', '41 - 60' => '41 - 60', '61 - 80' => '61 - 80',
                            '81 - 100' => '81 - 100', 'mas de $100' => 'mas de $100'], 'label' => '* Dinero Mensual para la Universidad (Dolares EE.UU)', 'empty' => '(Seleccione)']);
                        ?>
                    </fieldset>
                </div>

            <div class = "col-md-6 col-md-offset-3">
                <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> 
</br></br>