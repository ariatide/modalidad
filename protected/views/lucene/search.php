<?php


$string = "rené";


echo mb_detect_encoding($string);


echo $string.'<br />';

echo iconv('UTF-8', 'ASCII//TRANSLIT', $string);

?>

<h3>Resultados para: "<?php echo CHtml::encode($term); ?>"</h3>
<?php if (!empty($results)): ?>
	<?php foreach($results as $result): ?>      

		<?php //if ($result->score == 1): ?>
		
			<?php if ($result->score < 0.4): ?>
				<div>Estos son resultados adicionales</div>
			
			<?php endif ?>
		
		
			<p>Titulo: <?php echo $query->highlightMatches(CHtml::encode($result->title)); ?> 
			<?php //echo $query->highlightMatches(iconv('UTF-8', 'ASCII//TRANSLIT', $resul)); ?> 
			
			
			<?php echo $query->highlightMatches(CHtml::encode('')); ?> 
			(<?php echo $result->score ?>)</p>
			
			
			<?php echo $result->title ?><br />
			<?php echo CHtml::encode($result->title) ?>
			<hr/>
			
			
			
			
		<?php //endif ?>
	<?php endforeach; ?>

<?php else: ?>
	<p class="error">No se encontraron resultados para sus términos de búsqueda</p>
<?php endif; ?>
