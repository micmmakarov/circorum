<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vote_date')); ?>:</b>
	<?php echo CHtml::encode($data->vote_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('up')); ?>:</b>
	<?php echo CHtml::encode($data->up); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submission_id')); ?>:</b>
	<?php echo CHtml::encode($data->submission_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_id')); ?>:</b>
	<?php echo CHtml::encode($data->comment_id); ?>
	<br />


</div>