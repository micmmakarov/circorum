<?php
$this->breadcrumbs=array(
	'Vote Totals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VoteTotal', 'url'=>array('index')),
	array('label'=>'Create VoteTotal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vote-total-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vote Totals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vote-total-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'submission_id',
		'category_id',
		'vote_total',
		'last_update',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
