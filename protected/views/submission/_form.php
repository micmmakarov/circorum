<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'submission-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authors'); ?>
		<?php echo $form->textField($model,'authors',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'authors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'submission_date'); ?>
		<?php echo $form->textField($model,'submission_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'submission_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publication_date'); ?>
		<?php echo $form->textField($model,'publication_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'publication_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abstract'); ?>
		<?php echo $form->textArea($model,'abstract',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'abstract'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document'); ?>
		<?php echo $form->textField($model,'document'); ?>
		<?php echo $form->error($model,'document'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doi'); ?>
		<?php echo $form->textField($model,'doi',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'doi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'journal'); ?>
		<?php echo $form->textField($model,'journal',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'journal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_number'); ?>
		<?php echo $form->textField($model,'issue_number'); ?>
		<?php echo $form->error($model,'issue_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pages'); ?>
		<?php echo $form->textField($model,'pages',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pages'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->