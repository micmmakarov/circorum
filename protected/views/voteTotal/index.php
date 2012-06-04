<?php
$this->breadcrumbs=array(
	'Vote Totals',
);

$this->menu=array(
	array('label'=>'Create VoteTotal', 'url'=>array('create')),
	array('label'=>'Manage VoteTotal', 'url'=>array('admin')),
);
?>

<h1>Vote Totals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
