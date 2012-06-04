<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'submission-comment-form',
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
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_date'); ?>
		<?php echo $form->textField($model,'comment_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'comment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'editted'); ?>
		<?php echo $form->textField($model,'editted'); ?>
		<?php echo $form->error($model,'editted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentcomment_id'); ?>
		<?php echo $form->textField($model,'parentcomment_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'parentcomment_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->