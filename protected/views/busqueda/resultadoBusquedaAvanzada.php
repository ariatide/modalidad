
Resultados Busqueda Avanzada


<?php if (!empty($resultados)): ?>

	<h3>Resultados para: "<?php echo CHtml::encode($terminoBusquedaUsuario); ?>"</h3>
	
	<?php foreach($resultados as $resultado): ?>
		<?php if ($resultado->score < 0.4): ?>
			<div>Estos son resultados adicionales</div>
		<?php endif ?>
		
		<?php
		
		$documento = $resultado->getDocument();
		
		//;
		
		//print_r($resultado);
		
		//print_r($documento);
		
		//echo "id del proyecto:".$documento->getFieldValue('idProyecto');
		//echo "titulo del proyecto:".$documento->getFieldValue('titulo');
		//echo "<br />";
		
		
		
		$proyecto = Proyecto::model()->find('ID_PROYECTO=:proyectoID', array(':proyectoID' => $resultado->idProyecto));
		
		?>
		
		<div>Título: <?php echo $consulta->highlightMatches(CHtml::encode(Util::remplazarCaracteresEspeciales($proyecto->TEMA_PROYECTO))); ?> </div>
		<div>Carrera: <?php echo $proyecto->POSTULANTE->CARRERA->NOMBRE_CARRERA  ?></div>
		<div>Modalidad: <?php echo $proyecto->MODALIDAD ?> </div>
		<div>Gestion: <?php echo $proyecto->FECHA_INSCRIP_PROY ?> </div>
		
		<div>Score: <?php echo $resultado->score ?> </div>
		
		
		<div><a href="<?php  echo Yii::app()->createUrl('busqueda/detalleBusquedaAvanzada', array('id' => $proyecto->ID_PROYECTO)); ?>">Ver Detalle</a></div>
		
		
		<hr/>
	<?php endforeach; ?>

<?php else: ?>
	<p class="error">No se encontraron resultados para sus términos de búsqueda</p>
<?php endif; ?>
