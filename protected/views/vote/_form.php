<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vote-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vote_date'); ?>
		<?php echo $form->textField($model,'vote_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'vote_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'up'); ?>
		<?php echo $form->textField($model,'up'); ?>
		<?php echo $form->error($model,'up'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'comment_id'); ?>
		<?php echo $form->textField($model,'comment_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'comment_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->