<?php
$this->breadcrumbs=array(
	'Submission Categories',
);

$this->menu=array(
	array('label'=>'Create SubmissionCategory', 'url'=>array('create')),
	array('label'=>'Manage SubmissionCategory', 'url'=>array('admin')),
);
?>

<h1>Submission Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
