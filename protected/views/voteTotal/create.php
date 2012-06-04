<?php
$this->breadcrumbs=array(
	'Vote Totals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VoteTotal', 'url'=>array('index')),
	array('label'=>'Manage VoteTotal', 'url'=>array('admin')),
);
?>

<h1>Create VoteTotal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>