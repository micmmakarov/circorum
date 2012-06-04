<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
	<!--[if lt IE 8]>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" /> -->
	<![endif]-->
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/libra.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/views.css" />
<!-- 	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.foundation.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/bootstrap.min.js"></script>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>

<body>

<div class="container">


    <!-- Header here ---------------------------------------------- -->


    <div class="row">
        <div class="twelve columns">

            <div class="row">
                <div class="three columns">
                    <img class="logo" src="/images/libratechna_logo_final.png">
                </div>

                <div class="nine columns">
                    <ul class="nav-bar">
                        <li style="height:45px; margin-left: 1px; margin-top: -1px;">&nbsp;<input type="search"></li>
                        <li class="has-flyout">
                            <a href="#" class="main">Everywhere</a>
                            <a href="#" class="flyout-toggle"><span> </span></a>
                            <div class="flyout" style="display: none; ">
                                <ul>
                                    <li><a href="#">Search in authors</a></li>
                                    <li><a href="#">Search in papers</a></li>
                                    <li><a href="#">Search everywhere</a></li>
                                </ul>
                            </div>
                        </li>
						
                        <li style="float:right;padding-right:4px; padding-bottom: 8px; border: 1px solid #DDDDDD; height: 20px; margin-top: 9px; line-height: 28px;">
                            <span style="padding-left: 7px; padding-right: 3px; margin-top: 4px;"><?php if (Yii::app()->user->isGuest) { ?>
                            <a href="#" data-reveal-id="login">Log in</a> or <a href="/r/registration">Register</a>
                            <?php } else { ?>
                            <a href="/profile/profile/view"><?php echo CHtml::encode(Yii::app()->user->data()->username); ?></a> (<a href="/user/auth/logout">Logout</a>)
                            <?php } ?>
						</span>
                        </li>
                    </ul>
				
					<div id=login class=reveal-modal style="width:180px;"">
							<form action="/index.php/user/auth/login" method="post">

								
								<div class="row">
									<label for="YumUserLogin_username" class="required">Name <span class="required">*</span></label>
									<input name="YumUserLogin[username]" id="YumUserLogin_username" type="text">	</div>
								
								<div class="row">
									<label for="YumUserLogin_password" class="required">Password <span class="required">*</span></label>		<input name="YumUserLogin[password]" id="YumUserLogin_password" type="password">		
								</div>
								
								<div class="row">
								<p class="hint">
								<a href="/index.php/registration/registration/registration">Registration</a> | <a href="/index.php/registration/registration/recovery">Lost password?</a></p>
								</div>

							<div class="row rememberMe">
							<input id="ytYumUserLogin_rememberMe" type="hidden" value="0" name="YumUserLogin[rememberMe]"><input style="display: inline;" name="YumUserLogin[rememberMe]" id="YumUserLogin_rememberMe" value="1" type="checkbox"><label style="display: inline;" for="YumUserLogin_rememberMe">Remember me next time</label></div>

							<div class="row submit">
							<input type="submit" name="yt0" value="Login" class="large green nice button radius" style="margin-top:20px;"></div>

							</form>						 <a class="close-reveal-modal">&#215;</a>
					</div>
						
                </div>

                <!--<hr/> -->
            </div>
        </div>
    </div>


    <div class="row">
        <div class="three columns">
            <script>
                $(document).ready(function () {

                    $(".parent-category").click(function(e) {
                        e.preventDefault();
                        no=$(this).attr("data-no");
                        $(".subcategory").slideUp();
                        $(".subcat_"+no).slideDown();

                    });

                });

            </script>
            <?php $this->widget('MyWidget'); ?>

        </div>

        <div class="nine columns">
            <?php echo $content; ?>
        </div>

        </div>
		
<!-- Body here --------------------------------------------------------------------- -->



</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/foundation.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/app.js"></script>
</body>
</html>