<?php
$this->breadcrumbs=array(
	'Category Subscriptions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategorySubscription', 'url'=>array('index')),
	array('label'=>'Create CategorySubscription', 'url'=>array('create')),
	array('label'=>'View CategorySubscription', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategorySubscription', 'url'=>array('admin')),
);
?>

<h1>Update CategorySubscription <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>