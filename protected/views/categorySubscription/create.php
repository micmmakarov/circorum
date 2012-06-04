<?php
$this->breadcrumbs=array(
	'Category Subscriptions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategorySubscription', 'url'=>array('index')),
	array('label'=>'Manage CategorySubscription', 'url'=>array('admin')),
);
?>

<h1>Create CategorySubscription</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>