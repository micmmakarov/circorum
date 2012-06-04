<?php
$data=$model;

?>

<div class=row>


<div class="panel" id="<?php CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>">

    <!--  left box, where votes and arrays are -->
	<div class=row>

			<div class="two columns" data-submission="<?php CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>" style="padding-bottom:10px;">


				<div class=up>
				</div>

				<div class="votes" style="text-align:center;padding:5px;font-size:20px;">
				<?php echo $data->votes; ?>
				</div>

				<div class=down>
				</div>

		</div>

		<!--  body box with title, author etc -->
		<div class="eight columns">


			<a href="#" class="block head"><?php echo CHtml::encode($data->title); ?></a>
			<a href="#"><?php echo CHtml::encode($data->user->username); ?></a> |<?php foreach($data->categories as $category) echo $category->name; ?> | 28 Comments

		</div>

		<!--  right box with date etc -->
		<div class="two columns">

			<small><?php echo CHtml::encode($data->getAttributeLabel('submission_date')); ?>:</small>
				<?php $locale = CLocale::getInstance(Yii::app()->language);
			echo $locale->getDateFormatter()->formatDateTime($data->submission_date, 'short', 'short'); ?>

		</div>
	</div>



</div>


    <div>


    </div>

    <script>
        $(document).ready(function() {
           $(".tabs-box li").click(function() {
              $(".tabs-box li").each(function () {
                 $(this).removeClass("active");
              });
               $(this).addClass("active");
           $(".subpage").hide();
           class_name="."+$(this).text()+"_content";
           class_name=class_name.toLowerCase();
           $(class_name).fadeIn();

           });
        });
    </script>

    <ul class="tabs-box">
        <li class=active>Abstract</li>
        <li>Comments</li>
    </ul>

    <div class="abstract_content subpage">
        <div class="abstract border-bottom"><b>Abstract</b> - <?php echo CHtml::encode($data->abstract); ?></div>
        <div class=abstract><img src="../../images/research_paper.png" width=580></div>
        <?php

//        $this->breadcrumbs=array(
  //          'Submissions'=>array('index'),
    //        $model->title,
      //  );

       // $this->menu=array(
         //   array('label'=>'List Submission', 'url'=>array('index')),
          //  array('label'=>'Create Submission', 'url'=>array('create')),
          //  array('label'=>'Update Submission', 'url'=>array('update', 'id'=>$model->id)),
          //  array('label'=>'Delete Submission', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
          //  array('label'=>'Manage Submission', 'url'=>array('admin')),
      //  );
        ?>

    </div>
    <div class="comments_content subpage hidden">
<?php
            foreach($data->comments as $comment) { ?>
        <div class=comment-box>

            <div class=comment-title><span class=comment-author><?php echo $comment->user->username; ?></span><span class=comment-time>12 Minutes Ago</span></div>
            <div class=comment-body>
                <div class=comment-votebar>
                        <div class=up></div>
                        <div class=down></div>
                </div>
                <div class=comment>
                    <div class=comment-vote>3 Upvotes / 2 Downvotes</div>
                    <div class=comment-text><?php echo $comment->body;?></div>
                </div>
                <div class=clear></div>
            </div>


        </div>

<?php            }
?>

        <div class=comment-box>

            <div class=comment-title><span class=comment-author>CURRENT USER'S NAME</span><span class=comment-time>RIGHT NOW</span></div>
            <div class=comment-body>
                <div class=comment-votebar>.
                </div>
                <div class=comment>
                    <div class=comment-text><textarea class=comment-write></textarea></div>
                    <input class="blue nice button radius" type=submit value="Write!">
                </div>
                <div class=clear></div>
            </div>


        </div>


    </div>

    </div>








    <!--
<h1>View Submission #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'user_id',
		'link',
		'authors',
		'submission_date',
		'publication_date',
		'abstract',
		'body',
		'document',
		'doi',
		'journal',
		'issue_number',
		'pages',

	),
)); ?>
-->