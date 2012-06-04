<?php
$this->breadcrumbs=array(
	'Submission Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubmissionCategory', 'url'=>array('index')),
	array('label'=>'Create SubmissionCategory', 'url'=>array('create')),
	array('label'=>'Update SubmissionCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubmissionCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubmissionCategory', 'url'=>array('admin')),
);
?>

<h1>View SubmissionCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'submission_id',
		'category_id',
	),
)); ?>
