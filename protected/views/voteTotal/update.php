<?php
$this->breadcrumbs=array(
	'Vote Totals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VoteTotal', 'url'=>array('index')),
	array('label'=>'Create VoteTotal', 'url'=>array('create')),
	array('label'=>'View VoteTotal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VoteTotal', 'url'=>array('admin')),
);
?>

<h1>Update VoteTotal <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>