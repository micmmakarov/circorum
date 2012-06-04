<script>

	$(document).ready(function () {

		$(".up-vote").click(function () {
			submission=$(this).parent().attr("data-submission");
	        $.post('<?php echo Yii::app()->createAbsoluteUrl('vote/vote');?>', {Vote:"SecurityKEY1023445403", up: true, submission_id:'2', category_id: '1'},function(data) {
                $(this).parent().find(".votes").text(data);
               	  alert(data);
				  $("body").append(data);
				  		}); 
		}); 	
	});

</script>

<?php
$this->breadcrumbs=array(
	'Submissions',
);

$this->menu=array(
	array('label'=>'Create Submission', 'url'=>array('create')),
	array('label'=>'Manage Submission', 'url'=>array('admin')),
);
?>


<div class=s-feed>
<div class=bar>Trending Recent Popular Saved</div>


<?php $this->widget('zii.widgets.CListView', array(
	   'dataProvider'=>$dataProvider,
		'itemView'=>'_list',
)); ?>


</div>