<?php
include 'conexion.php';

$q=$_POST['q'];
$con=conexion();

$res=mysql_query("select * from career where faculty_id=".$q."",$con);

?>

<select id="career"><!--cuando seleccionan una carrera se ejecuta la funcion myFunction() ubicada en el archivo index.php-->

<option value="">Seleccione</option>
<?php while($fila=mysql_fetch_array($res)){ ?>
 <option value="<?php echo $fila['id']; ?>"><?php echo $fila['name']; ?></option>
<?php } ?>

</select>