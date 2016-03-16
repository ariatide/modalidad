
<div>
<?php echo Yii::app()->user->getFlash('error'); ?>
</div>


<form action="<?php  echo Yii::app()->createUrl('busqueda/realizarBusquedaPorNombre'); ?>">

<table>
	<tr>
		<td>Nombre:</td>
		<td><input type="text" name="nombre" /> </td>
	</tr>
	<tr>
		<td>Apellidos:</td>
		<td><input type="text" name="apellidos" /> </td>
	</tr>
	<tr>
		<td>Titulo:</td>
		<td><input type="text" name="titulo" /> </td>
	</tr>
	<tr>
		<td colspan="2"> <input type="submit"value="Buscar" /> </td>
	</tr>
</table>


</form>
