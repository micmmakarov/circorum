<script>

    $(document).ready(function () {

        $(".up-vote").live("click",function () {
            this_arrow=$(this);
            other_arrow=$(this).parent().find(".down-arrow");
            
            submission=$(this).parent().attr("data-submission");
            category=$(this).parent().attr("data-category");
            //alert(submission);
            $.ajax({type: "POST",
                cache: false,
                url :'../vote/vote',
                data: {Vote:"SecurityKEY1023445403", up: 1, submission_id: submission, category_id: category},
                success: function(data) {
                    if (data) $("#vote"+submission).text(data);
                    this_arrow.removeClass("up-vote").addClass("up-voted");
                    other_arrow.removeClass("down-voted").addClass("down-vote");
                    
                }
            });
        });
        $(".down-vote").live("click",function () {

            this_arrow=$(this);
        	other_arrow=$(this).parent().find(".up-arrow");
        
        	submission=$(this).parent().attr("data-submission");
            category=$(this).parent().attr("data-category");
            //alert(submission);
            $.ajax({type: "POST",
                cache: false,
                url :'../vote/vote',
                data: {Vote:"SecurityKEY1023445403", up: 0, submission_id: submission, category_id: category},
                success: function(data) {
                    if (data) $("#vote"+submission).text(data);
                    other_arrow.removeClass("up-voted").addClass("up-vote");
                    this_arrow.removeClass("down-vote").addClass("down-voted");
                                        
                }
            });
        });
        $('.sort-filter').click(function (){
            if ($(this).parent().hasClass('active')) {
                return;
            }
            $('.sort-tab').removeClass('active');
            $(this).parent().addClass('active');
            switch ($(this).text()) {
                case "Hot":
                    $.ajax({type: "POST",
                        cache: false,
                        url :'../category/page',
                        data: {sorttype: 0},
                        success: function(data) {
                            if (data) $("#submission-list").html(data);

                        }
                    });
                    break;
                case "Top":
                    $.ajax({type: "POST",
                        cache: false,
                        url :'../category/page',
                        data: {sorttype: 0},
                        success: function(data) {
                            if (data) $("#submission-list").html(data);

                        }
                    });
                    break;
                case "Recent":
                    $.ajax({type: "POST",
                        cache: false,
                        url :'../category/page',
                        data: {sorttype: 1},
                        success: function(data) {
                            if (data) $("#submission-list").html(data);

                        }
                    });
                    break;
            };
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

<div class="row" style="margin-top: -1px;">
	<div class="eight columns">
		<dl class="sub-nav">
		  <dt>Filter:</dt>
		  <dd class="active sort-tab"><a href="#" class="sort-filter">Hot</a></dd>
		  <dd class="sort-tab"><a href="#" class="sort-filter">Top</a></dd>
		  <dd class="sort-tab"><a href="#" class="sort-filter">Recent</a></dd>
		</dl>
	</div>
	<div class="four columns" style="margin-top: -2px;">
		<a href="/submission/create" class="right white radius nice button">Submit Paper</a>
	</div>
</div>

<div class="row" id="submission-list">
    <?php echo $submissionlist; ?>
</div>

<!----------------->
