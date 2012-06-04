<?php
$this->breadcrumbs=array(
	'Submission References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubmissionReference', 'url'=>array('index')),
	array('label'=>'Manage SubmissionReference', 'url'=>array('admin')),
);
?>

<h1>Create SubmissionReference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>