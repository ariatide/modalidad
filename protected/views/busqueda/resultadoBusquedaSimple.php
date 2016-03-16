

<?php if (!empty($resultados)): ?>

	<h3>Resultados para: "<?php echo CHtml::encode($terminoBusquedaUsuario); ?>"</h3>


	<?php
	$contadorResultados = 0;
	?>

	<?php foreach($resultados as $resultado): ?>

		<?php
		if($resultado->score > 0.1) {
			$contadorResultados++;
		} else {
			break;
		}
		?>

		<?php if($contadorResultados == 1): ?>
		<div>Se encontro el tema</div>
		<?php endif ?>

		<?php
		$proyecto = Proyecto::model()->find('ID_PROYECTO=:proyectoID', array(':proyectoID' => $resultado->idProyecto));
		
		?>
		
		<div>Titulo: <?php echo $consulta->highlightMatches(CHtml::encode(Util::remplazarCaracteresEspeciales($proyecto->TEMA_PROYECTO))); ?> </div>
		<div>Carrera: <?php echo $proyecto->POSTULANTE->CARRERA->NOMBRE_CARRERA ?></div>
		<div>Modalidad: <?php echo $proyecto->MODALIDAD ?> </div>
		<div>Fecha Inscripcion Proyecto: <?php echo $proyecto->FECHA_INSCRIP_PROY ?> </div>
		<!--<div>Peso: <?php echo $resultado->score ?> </div>-->
		<hr/>
	<?php endforeach; ?>

	<?php if($contadorResultados == 0): ?>
		<div>No se encuentro ningun tema que contenga los terminos ingresados de busqueda</div>
	<?php endif ?>

<?php else: ?>
	<div>No se encuentro ningun tema que contenga los terminos ingresados de busqueda</div>
<?php endif; ?>
