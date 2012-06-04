<?php
$this->breadcrumbs=array(
	'Submission References'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubmissionReference', 'url'=>array('index')),
	array('label'=>'Create SubmissionReference', 'url'=>array('create')),
	array('label'=>'View SubmissionReference', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubmissionReference', 'url'=>array('admin')),
);
?>

<h1>Update SubmissionReference <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>