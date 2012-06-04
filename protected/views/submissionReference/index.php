<?php
$this->breadcrumbs=array(
	'Submission References',
);

$this->menu=array(
	array('label'=>'Create SubmissionReference', 'url'=>array('create')),
	array('label'=>'Manage SubmissionReference', 'url'=>array('admin')),
);
?>

<h1>Submission References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
