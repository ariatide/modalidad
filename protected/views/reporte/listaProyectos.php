

<table>
	<tr>
		<th>Tema</th>
		<th>Carrera</th>
		<th>Modalidad</th>	
		<th>Postulante</th>
		<th>Tutor</th>
	</tr>
<?php foreach($proyectos as $proyecto): ?>
	<tr>
		<td><?php echo $proyecto->TEMA_PROYECTO; ?></td>
		<td><?php echo $proyecto->POSTULANTE->CARRERA->NOMBRE_CARRERA; ?></td>
		<td><?php echo $proyecto->MODALIDAD; ?></td>
		<td><?php echo $proyecto->POSTULANTE->NOMBRE_POS.' '.$proyecto->POSTULANTE->APEPAT_POS.' '.$proyecto->POSTULANTE->APEMAT_POS; ?></td>
		<td><?php echo $proyecto->TUTOR->DOCENTE->NOMBRE_DOCENTE; ?></td>
	</tr>
<?php endforeach ?>
</table>
