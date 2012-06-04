<?php
$this->breadcrumbs=array(
	'Submission Authors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubmissionAuthor', 'url'=>array('index')),
	array('label'=>'Create SubmissionAuthor', 'url'=>array('create')),
	array('label'=>'View SubmissionAuthor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubmissionAuthor', 'url'=>array('admin')),
);
?>

<h1>Update SubmissionAuthor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>