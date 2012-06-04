<?php
$this->breadcrumbs=array(
	'Submission Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubmissionComment', 'url'=>array('index')),
	array('label'=>'Create SubmissionComment', 'url'=>array('create')),
	array('label'=>'View SubmissionComment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubmissionComment', 'url'=>array('admin')),
);
?>

<h1>Update SubmissionComment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>