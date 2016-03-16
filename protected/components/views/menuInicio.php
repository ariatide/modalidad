<?php if
($menus != null): ?>
<ul id="sdt_menu"  class="sdt_menu">
	<!--
	<li class="item">
		<a href="<?php  echo Yii::app()->createUrl('/site/index'); ?>">Inicio</a>
	</li>
	-->
	
	
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
	<li>
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
			<img src="images/1.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link"><?php echo $menu->TITULO_MENU; ?></span>
				<span class="sdt_descr"></span>
			</span>
		</a>
		<?php endif; ?>
	</li>
    <?php endforeach; ?>
    
    <li>
		<a href="<?php  echo Yii::app()->createUrl('/iijp'); ?>">
			<img src="<?php echo Yii::app()->baseUrl.'/images/'; ?>/6.jpg" alt=""/>
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link">Modalidades de Titulacion</span>
				<span class="sdt_descr"></span>
			</span>
		</a>	
	</li>
    
    <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Administrar Usuarios'
					, 'url'=>Yii::app()->user->ui->userManagementAdminUrl
					, 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login'
					, 'url'=>Yii::app()->user->ui->loginUrl
					, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')'
					, 'url'=>Yii::app()->user->ui->logoutUrl
					, 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	
	
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


