<?php if($menus != null): ?>
<ul id="sdt_menu"  class="sdt_menu">
	<li>
		<a href="<?php  echo Yii::app()->createUrl('/site/index'); ?>">
		
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/1.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Inicio</span>
				<span class="sdt_descr"></span>
			</span>
		
		</a>
		
		
		
	</li>
	
	
	<?php $numeroPagina = 1; ?>
    <?php foreach($menus as $menu): ?>
	<li class="item">
		<?php
		// preguntamos si este menu tiene por lo menus una pagina que haga referencia a este
		// si es asi procedemos a mostrar un enlace a esa pagina
		$numeroPagina++;
		?>
		<?php if($menu->pagina): ?>
		<a href="<?php  echo Yii::app()->createUrl('site/pagina', array('id' => $menu->pagina->ID_PAGINA)); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?><?php echo $numeroPagina; ?>.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link"><?php echo $menu->TITULO_MENU; ?></span>
				<span class="sdt_descr"></span>
			</span>
		</a>
		<?php else: ?>
		<a href="#">
			<img src="images/q2.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link"><?php echo $menu->TITULO_MENU; ?></span>
				<span class="sdt_descr"></span>
			</span>
		</a>
		<?php endif; ?>
		
		
	</li>
    <?php endforeach; ?>
    
    <!--
    <li class="item">
		Carreras
		<ul class="menu-carrera">
		<?php foreach($carreras as $carrera): ?>
		
			<li>
				<div class="menu-label-carrera"><?php echo $carrera->NOMBRE_CARRERA; ?></div>
				<ul class="menu-modalidad">
				<li><a href="<?php  echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Tesis')); ?>">Tesis</a></li>
				<li><a href="<?php  echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Adscripcion')); ?>">Adcripcion</a></li>
				<li><a href="<?php  echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Trabajo Dirigido')); ?>">Trabajo Dirigido</a></li>
				</ul>
			</li>
		<?php endforeach; ?>
		</ul>
    </li>
    -->
    
    <li>
		<a href="#">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/q3.jpg" alt=""/>
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
<?php endif; ?>


