<?php
$this->breadcrumbs=array(
	'Votes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vote', 'url'=>array('index')),
	array('label'=>'Create Vote', 'url'=>array('create')),
	array('label'=>'View Vote', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vote', 'url'=>array('admin')),
);
?>

<h1>Update Vote <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>