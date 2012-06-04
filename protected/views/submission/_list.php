<div class="s-view" id="<?php CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>">

<!--  left box, where votes and arrays are -->

	<div class="vote-box left" data-submission="<?php CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>">


		<div class=up-vote>
		</div>

		<div class="votes">
			<?php //echo CHtml::encode($data->vote_total); ?>
		</div>

		<div class=down-vote>
		</div>

	</div>


<!--  body box with title, author etc -->

	<div class="body left">

		<a href="/submission/<?php echo CHtml::encode($data->id); ?>" class="block head"><?php echo CHtml::encode($data->title); ?></a>
		<a href="#"><?php echo CHtml::encode($data->user->username); ?></a> |<?php foreach($data->categories as $category) echo $category->name; ?> | 28 Comments

	</div>

<!--  right box with date etc -->

	<div class="date left">

		<small><?php echo CHtml::encode($data->getAttributeLabel('submission_date')); ?>:</small>
		<?php echo CHtml::encode($data->submission_date); ?>
		<br>
		<small><?php echo CHtml::encode($data->getAttributeLabel('publication_date')); ?>:</small>
		<?php echo CHtml::encode($data->publication_date); ?>
		
	</div>

	<div class="clear"></div>



</div>








<!-- temporary shit, to be deleted. I'm using as notes. Anyway it's commented so it wont be displayed -->
<!--  
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('authors')); ?>:</b>
	<?php echo CHtml::encode($data->authors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submission_date')); ?>:</b>
	<?php echo CHtml::encode($data->submission_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publication_date')); ?>:</b>
	<?php echo CHtml::encode($data->publication_date); ?>
	<br />
-->
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('abstract')); ?>:</b>
	<?php echo CHtml::encode($data->abstract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
	<?php echo CHtml::encode($data->body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document')); ?>:</b>
	<?php echo CHtml::encode($data->document); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doi')); ?>:</b>
	<?php echo CHtml::encode($data->doi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('journal')); ?>:</b>
	<?php echo CHtml::encode($data->journal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_number')); ?>:</b>
	<?php echo CHtml::encode($data->issue_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pages')); ?>:</b>
	<?php echo CHtml::encode($data->pages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vote_total')); ?>:</b>
	<?php echo CHtml::encode($data->vote_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_vote_update')); ?>:</b>
	<?php echo CHtml::encode($data->last_vote_update); ?>
	<br />

	*/ ?>

