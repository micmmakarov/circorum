<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vote-total-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'submission_id'); ?>
		<?php echo $form->textField($model,'submission_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'submission_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'vote_total'); ?>
		<?php //echo $form->textField($model,'vote_total'); ?>
		<?php //echo $form->error($model,'vote_total'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'last_update'); ?>
		<?php //echo $form->textField($model,'last_update'); ?>
		<?php //echo $form->error($model,'last_update'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->