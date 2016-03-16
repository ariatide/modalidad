Detalle Busqueda Avanzada


<table>
	<tr>
		<td>Titulo :</td>
		<td><?php echo $proyecto->TEMA_PROYECTO ?> </td>
	</tr>
	<tr>
		<td>Modalidad :</td>
		<td><?php echo $proyecto->MODALIDAD ?> </td>
	</tr>
	
	<tr>
		<td>Nombre Postulante :</td>
		<td><?php echo $postulante->NOMBRE_POS.' '.$postulante->APEPAT_POS.' '.$postulante->APEMAT_POS ?> </td>
	</tr>
	<tr>
		<td>Carrera :</td>
		<td><?php echo $carrera->NOMBRE_CARRERA ?> </td>
	</tr>
	
	
	<?php if($proyecto->MODALIDAD == 'Tesis') { ?>
	<tr>
		<td>Aprobacion Pertinencia :</td>
		<td><?php echo $proyectoTesis->APROBACIONPERTINENCIA ?> </td>
	</tr>
	<tr>
		<td>Informe Fin Tutor :</td>
		<td><?php echo $proyectoTesis->FECHA_INFORMEFIN_TUTOR ?> </td>
	</tr>
	<tr>
		<td>Informe Final IIJP :</td>
		<td><?php echo $proyectoTesis->FECHA_INFORMEFINALIIJP ?> </td>
	</tr>
			
	<?php } else if($proyecto->MODALIDAD == 'Adscripcion') { ?>
	
	<tr>
		<td>Unidad Patrocinadora :</td>
		<td><?php echo $proyectoAdscripcion->ID_UP ?> </td>
	</tr>
	<tr>
		<td>Subscripcion Convenio :</td>
		<td><?php echo $proyectoAdscripcion->FECHA_SUBSCRIPCIONCONVENIO_ADS ?> </td>
	</tr>
	<tr>
		<td>Primera Lista de Cotejo :</td>
		<td><?php echo $proyectoAdscripcion->FECHA_INFORME1_ADS ?> </td>
	</tr>
	<tr>
		<td>Primer Informe Avance :</td>
		<td><?php echo $proyectoAdscripcion->FECHA_INFORME2_ADS ?> </td>
	</tr>
	<tr>
		<td>Informe Final :</td>
		<td><?php echo $proyectoAdscripcion->FECHA_INFORMEFIN_ADS ?> </td>
	</tr>
	<tr>
		<td>Informe Final Forma :</td>
		<td><?php echo $proyectoAdscripcion->FECHA_INFORMEFINFORMA_ADS ?> </td>
	</tr>
	<tr>
		<td>Cambio Titulo :</td>
		<td><?php echo $proyectoAdscripcion->CAMBIO_TITULO_ADS ?> </td>
	</tr>
	<tr>
		<td>Tema Anterior :</td>
		<td><?php echo $proyectoAdscripcion->TEMA_ANTERIOR_ADS ?> </td>
	</tr>
	<tr>
		<td>Tema Actual :</td>
		<td><?php echo $proyecto->TEMA_PROYECTO ?> </td>
	</tr>
	<tr>
		<td>Prorroga :</td>
		<td><?php echo $proyectoAdscripcion->PRORROGA_ADS ?> </td>
	</tr>
	
	
			
	<?php } else if($proyecto->MODALIDAD == 'Trabajo Dirigido') { ?>
			
			
	<?php } ?>
	
	
	
</table>


<div>Gestion: <?php echo $proyecto->FECHA_INSCRIP_PROY ?> </div>


