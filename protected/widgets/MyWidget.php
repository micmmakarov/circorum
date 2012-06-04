<?php
class MyWidget extends CWidget
{
    public function init()
    {

    }

    public function run()
    {
        echo "<div class=accordion id=main-menu>";

        $categories = Category::model()->with('children')->findAll(array('condition'=>'`t`.`parent_id` IS NULL'));

        $i=0;
        foreach($categories as $category) {
                echo "<div class=accordion-group>";

						echo "<div class=accordion-heading>";
						
						echo "<a data-parent=main-menu class=\"accordion-toggle\" data-toggle=\"collapse\" data-target='#link_".$i."' >" . $category->name . "</a>";
						
						echo "</div>";

						echo "<div id='link_".$i."' class='accordion-body in collapse'>";
						echo "<div class=accordion-inner>";
							echo "<ul class='subcat_".$i."  '>";
							if (!is_null($category->children)) {
								foreach($category->children as $child) {
									echo "<li><a href='" . $child->linkName() . "'>" . $child->name . "</a></li>";
								}
							}
							echo "</ul>";
						echo "</div>";
							
							
						echo "</div>";
                echo "</div>";
                $i++;
        }
        echo "</div>";
		//echo "<script>\$(document).ready( function () {\$('#main-menu').collapse(); });</script>";
        // by CController::endWidget()
    }
}
