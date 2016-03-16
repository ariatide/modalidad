<?php
echo $event->sender->menu->run();

/*
  echo CHtml::tag('p', array(), 'Data collected is:');
  foreach ($event->data as $step=>$data):
  $formName = 'Form'.ucfirst($step);
  $model = new $formName();
  echo CHtml::tag('h2', array(), $event->sender->getStepLabel($step));
  echo ('<ul>');
  foreach ($data as $k=>$v)
  echo '<li>'.$model->getAttributeLabel($k).": $v</li>";
  echo ('</ul>');
  endforeach;
 */
?>
<div class="twelve columns">
    <label class="cabecera"><strong>
<?php echo "Sus Datos fueron correctamente registrados"; ?>
    </strong></label>
</div>