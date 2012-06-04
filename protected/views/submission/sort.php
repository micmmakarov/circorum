<script>

	$(document).ready(function () {

		$(".up-vote").click(function () {
			submission=$(this).parent().attr("data-submission");
	        $.post('<?php echo Yii::app()->createAbsoluteUrl('vote/vote');?>', {Vote:"SecurityKEY1023445403", up: true, submission_id:'2', category_id: '1'},function(data) {
                $(this).parent().find(".votes").text(data);
               	  alert(data);
				  $("body").append(data);
				  		})  ;
		}); 	
	});

</script>

<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>


<div class=s-feed>
<div class=bar>Trending Recent Popular Saved</div>

<?php foreach ($submissions as $value) {?>
<div class="s-view" id="<?php CHtml::link(CHtml::encode($value->id), array('view', 'id'=>$value->id)); ?>">

<!--  left box, where votes and arrays are -->

<div class="vote-box left" data-submission="<?php CHtml::link(CHtml::encode($value->id), array('view', 'id'=>$value->id)); ?>">


<div class=up-vote>
</div>

<div class="votes">
<?php echo CHtml::encode($value->votes); ?>
</div>

<div class=down-vote>
</div>

</div>


<!--  body box with title, author etc -->

<div class="body left">

	<a href="#" class="block head"><?php echo CHtml::encode($value->title); ?></a>
	<a href="#"><?php echo CHtml::encode($value->user->username); ?></a> | Category, Category2, Category3 | 28 Comments

</div>

<!--  right box with date etc -->

<div class="date left">

<small><?php echo CHtml::encode($value->getAttributeLabel('submission_date')); ?>:</small>
	<?php echo CHtml::encode($value->submission_date); ?>
<br>
	<small><?php echo CHtml::encode($value->getAttributeLabel('publication_date')); ?>:</small>
	<?php echo CHtml::encode($value->publication_date); ?>
	
	</div>

<div class="clear"></div>

</div>
<?php }?>


</div>