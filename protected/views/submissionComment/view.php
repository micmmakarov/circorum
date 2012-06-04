<?php
$this->breadcrumbs=array(
	'Submission Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubmissionComment', 'url'=>array('index')),
	array('label'=>'Create SubmissionComment', 'url'=>array('create')),
	array('label'=>'Update SubmissionComment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubmissionComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubmissionComment', 'url'=>array('admin')),
);
?>

<h1>View SubmissionComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'submission_id',
		'user_id',
		'body',
		'comment_date',
		'editted',
		'parentcomment_id',
	),
)); ?>
