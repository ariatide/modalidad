﻿<form action="<?php  echo Yii::app()->createUrl('busqueda/realizarBusquedaAvanzada'); ?>">

<table>
	<tr>
		<td>Texto a Buscar </td>
		<td><input type="text" name="consulta" /> </td>
	</tr>
	<tr>
		<td colspan="2"> <input type="submit"value="Buscar" /> </td>
	</tr>
</table>


</form>
