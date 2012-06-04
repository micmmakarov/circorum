<?php foreach ($submissions as $submission) {?>
<div class="panel" style="margin:0;">
    <div class=row>
        <div class="one column">

            <div class="vote-box left" data-submission="<?php echo CHtml::encode($submission->id); ?>" data-category="<?php echo $submission->currentCategory()->id; ?>">


                <div class="<?php
                    if ($submission->currentUserVote() == 1)
                        echo "up-voted up-arrow";
                    else
                        echo "up-vote up-arrow"; ?>">
                </div>



                <div class="votes" id="vote<?php echo CHtml::encode($submission->id); ?>" style="text-align:left;padding:10px;font-size:20px;">
                    <?php echo $submission->currentVoteTotal()->vote_total; ?>
                </div>

                <div class="<?php
                    if ($submission->currentUserVote() == 0)
                        echo "down-voted down-arrow";
                    else
                        echo "down-vote down-arrow"; ?>">
                </div>

            </div>

        </div>
        <div class="eight columns" style="margin-top:15px;padding">

            <a href="<?php echo CHtml::encode($submission->linkName());  ?>" class="block head"><?php echo CHtml::encode($submission->title); ?></a>
            <a href="/profile/profile/view/<?php echo CHtml::encode($submission->user->id); ?>"><?php echo CHtml::encode($submission->user->username); ?></a> | <?php echo $submission->currentCategory()->name; ?> | 28 Comments

        </div>
        <div class="two columns">
            <small><?php echo CHtml::encode($submission->getAttributeLabel('submission_date')); ?>:</small>
            <?php $locale = CLocale::getInstance(Yii::app()->language);
            echo $locale->getDateFormatter()->formatDateTime($submission->submission_date, 'short', 'short'); ?>
            <br>

        </div>
    </div>
</div>
<?php }?>