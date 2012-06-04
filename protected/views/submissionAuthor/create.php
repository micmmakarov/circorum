<?php
$this->breadcrumbs=array(
	'Submission Authors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubmissionAuthor', 'url'=>array('index')),
	array('label'=>'Manage SubmissionAuthor', 'url'=>array('admin')),
);
?>

<h1>Create SubmissionAuthor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>