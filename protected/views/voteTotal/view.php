<?php
$this->breadcrumbs=array(
	'Vote Totals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VoteTotal', 'url'=>array('index')),
	array('label'=>'Create VoteTotal', 'url'=>array('create')),
	array('label'=>'Update VoteTotal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VoteTotal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VoteTotal', 'url'=>array('admin')),
);
?>

<h1>View VoteTotal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'submission_id',
		'category_id',
		'vote_total',
		'last_update',
	),
)); ?>
