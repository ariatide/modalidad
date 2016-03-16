<ul id="sdt_menu"  class="sdt_menu">
	<!--
	<li>
		<a href="<?php  echo Yii::app()->createUrl('/site/index'); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/1.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Inicio</span>
				<span class="sdt_descr">Quienes somos</span>
			</span>
		</a>
	</li>
	
	<li>
		<a href="<?php  echo Yii::app()->createUrl('/site/index'); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/1.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Inicio</span>
				<span class="sdt_descr">Quienes somos</span>
			</span>
		</a>
	</li>-->
	
	<li>
		<a href="<?php  echo Yii::app()->createUrl('/site/index'); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/inicio.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Inicio</span>
				<span class="sdt_descr"></span>
			</span>
		</a>
	</li>
	
	
	<li>
		<a href="<?php  echo Yii::app()->createUrl('iijp/quienesSomos', array()); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/qs.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Quienes Somos</span>
				<span class="sdt_descr"></span>
			</span>
		</a>
	</li>
	<li>
		<a href="<?php  echo Yii::app()->createUrl('iijp/reglamentos', array()); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/reglamentos.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Reglamentos</span>
				<span class="sdt_descr"></span>
			</span>
		</a>
	</li>
	<li>
		<a href="<?php  echo Yii::app()->createUrl('iijp/publicaciones', array()); ?>">
		
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/q4.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Publicaciones</span>
				<span class="sdt_descr"></span>
			</span>
		
		</a>
	</li>
	<li>
		<a href="<?php  echo Yii::app()->createUrl('iijp/procedimiento', array()); ?>">
		
		
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/q5.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Procedimiento</span>
				<span class="sdt_descr"></span>
			</span>
		
		
		</a>
	</li>
    
    
    <li>
		<a href="#">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/carreras.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Carreras</span>
				<span class="sdt_descr"></span>
			</span>
		</a>
		<div class="sdt_box">
			<?php foreach($carreras as $carrera): ?>
				<a class="label" href="#"><?php echo $carrera->NOMBRE_CARRERA; ?></a>
			
				<a href="<?php  echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Tesis')); ?>">Tesis</a>
				<a href="<?php  echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Adscripcion')); ?>">Adcripcion</a>
				<a href="<?php  echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Trabajo Dirigido')); ?>">Trabajo Dirigido</a>
			
			<?php endforeach; ?>
		</div>
    </li>
    
    <!--
    <?php if(Yii::app()->user->isGuest): ?>
    <li class="item">
		<a href="<?php  echo Yii::app()->createUrl('/site/login'); ?>">Iniciar sesión</a>
	</li>
	<?php endif ?>
	
	<?php if(!Yii::app()->user->isGuest): ?>
	<li class="item">
		<a href="<?php  echo Yii::app()->createUrl('/site/logout'); ?>">Cerrar sesion</a>
	</li>
	<?php endif ?>
	-->
	
</ul>


<ul class="menu-principal">
	
	
</ul>



