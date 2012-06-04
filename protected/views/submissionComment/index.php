<?php
$this->breadcrumbs=array(
	'Submission Comments',
);

$this->menu=array(
	array('label'=>'Create SubmissionComment', 'url'=>array('create')),
	array('label'=>'Manage SubmissionComment', 'url'=>array('admin')),
);
?>

<h1>Submission Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
