<?php
$this->breadcrumbs=array(
	'Submission Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubmissionCategory', 'url'=>array('index')),
	array('label'=>'Create SubmissionCategory', 'url'=>array('create')),
	array('label'=>'View SubmissionCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubmissionCategory', 'url'=>array('admin')),
);
?>

<h1>Update SubmissionCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>