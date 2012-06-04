<?php
$this->breadcrumbs=array(
	'Submission Authors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubmissionAuthor', 'url'=>array('index')),
	array('label'=>'Create SubmissionAuthor', 'url'=>array('create')),
	array('label'=>'Update SubmissionAuthor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubmissionAuthor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubmissionAuthor', 'url'=>array('admin')),
);
?>

<h1>View SubmissionAuthor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'submission_id',
		'user_id',
	),
)); ?>
