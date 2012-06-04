<?php
$this->breadcrumbs=array(
	'Submission Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubmissionCategory', 'url'=>array('index')),
	array('label'=>'Manage SubmissionCategory', 'url'=>array('admin')),
);
?>

<h1>Create SubmissionCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>