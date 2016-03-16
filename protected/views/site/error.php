<?php
$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>

<!--<h2>Error <?php //echo $code;  ?></h2>-->

<?php if ($code === 401) { ?>

   <div class="twelve columns">
        <h3>Acceso Denegado  :) </h3>
        <div class="alert alert-error">
            <p>Contactese con el administrador <?php echo CHtml::encode($message);  ?></p>    
        </div>
        
   <div class="clear"></div>
<?php } else {
    ?>


    <div class="error">
        <?php
        echo CHtml::encode($message);
    }
    ?>
</div>