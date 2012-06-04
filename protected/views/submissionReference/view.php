<?php
$this->breadcrumbs=array(
	'Submission References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubmissionReference', 'url'=>array('index')),
	array('label'=>'Create SubmissionReference', 'url'=>array('create')),
	array('label'=>'Update SubmissionReference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubmissionReference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubmissionReference', 'url'=>array('admin')),
);
?>

<h1>View SubmissionReference #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'submission_id',
		'reference_id',
	),
)); ?>
