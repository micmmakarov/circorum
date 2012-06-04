<?php
$this->breadcrumbs=array(
	'Submission Authors',
);

$this->menu=array(
	array('label'=>'Create SubmissionAuthor', 'url'=>array('create')),
	array('label'=>'Manage SubmissionAuthor', 'url'=>array('admin')),
);
?>

<h1>Submission Authors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
