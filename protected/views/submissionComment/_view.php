<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submission_id')); ?>:</b>
	<?php echo CHtml::encode($data->submission_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
	<?php echo CHtml::encode($data->body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_date')); ?>:</b>
	<?php echo CHtml::encode($data->comment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editted')); ?>:</b>
	<?php echo CHtml::encode($data->editted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentcomment_id')); ?>:</b>
	<?php echo CHtml::encode($data->parentcomment_id); ?>
	<br />


</div>