<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
 
<h3>Subir Imagen</h3>
 
<div class="form">
<?php echo $form; ?>
</div>