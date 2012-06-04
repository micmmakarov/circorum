<?php
$this->breadcrumbs=array(
	'Category Subscriptions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CategorySubscription', 'url'=>array('index')),
	array('label'=>'Create CategorySubscription', 'url'=>array('create')),
	array('label'=>'Update CategorySubscription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategorySubscription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategorySubscription', 'url'=>array('admin')),
);
?>

<h1>View CategorySubscription #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'user_id',
	),
)); ?>
