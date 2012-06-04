<?php
$this->breadcrumbs=array(
	'Votes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Vote', 'url'=>array('index')),
	array('label'=>'Create Vote', 'url'=>array('create')),
	array('label'=>'Update Vote', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vote', 'url'=>array('admin')),
);
?>

<h1>View Vote #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'vote_date',
		'up',
		'submission_id',
		'category_id',
		'comment_id',
	),
)); ?>
