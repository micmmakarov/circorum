<?php
$this->breadcrumbs=array(
	'Submission Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubmissionComment', 'url'=>array('index')),
	array('label'=>'Manage SubmissionComment', 'url'=>array('admin')),
);
?>

<h1>Create SubmissionComment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>