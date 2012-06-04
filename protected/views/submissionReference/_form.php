<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'submission-reference-form',
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
		<?php echo $form->labelEx($model,'reference_id'); ?>
		<?php echo $form->textField($model,'reference_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'reference_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->