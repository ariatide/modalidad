
<div>
<?php echo Yii::app()->user->getFlash('error'); ?>
</div>

<div class="standard-form compressed" >
<form id="contactus" class="contactForm" name="contactus" action="<?php  echo Yii::app()->createUrl('busqueda/realizarBusquedaPorNombre'); ?>">

<input type="text" name="nombre" style="width:90%;" placeholder="Nombre" />
<input type="text" name="apellidos" style="width:90%;"  placeholder="Apellidos"/>

<input type="textarea" name="titulo" style="width:90%;" placeholder="Titulo"/>

<input type="submit"value="Buscar" style="width:90%;"/>

</form>

</div>