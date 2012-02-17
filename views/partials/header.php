<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 <title><?php echo ( isset($event) ? $event->name." |  " : ""); ?>Drivers of Change</title>
<link rel="shortcut icon" id="favicon" type="image/png" href="assets/images/favicon.png" />
<!-- Apple iOS Web App Settings -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="apple-touch-icon" href="assets/images/apple-touch-logo.png"/>
<script type="text/javascript">
/* <![CDATA[ */
	(function () {
		var filename = navigator.platform === 'iPad' ?
	   		'splash-screen-768x1004.png' : 'splash-screen-640x920.png';
	  	document.write(
	    	'<link rel="apple-touch-startup-image" '+'href="assets/images/'+filename+'" />' );
	})();
    /* ]]> */
     </script>
<!-- END Apple iOS Web App Settings -->
<link rel="stylesheet" href="assets/css/master.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
 <link rel="stylesheet" type="text/css" href="assets/css/ie8-and-down.css" />
<![endif]-->
<!--	Load the "Chosen" stylesheet. You can remove this if your
		select boxes aren't going to make use of the awesome Chosen script. -->
<!-- <link rel="stylesheet" href="assets/js/chosen/chosen.css" type="text/css" media="screen" /> -->
<!--	Load the Fancybox stylesheet. You can remove this if you
		are not going to be lightboxing any images. -->
<!-- <link rel="stylesheet" href="assets/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" /> -->
<link rel="stylesheet" href="assets/css/atooltip.css" type="text/css" media="screen" />
<!--	Load the jQuery Library - We're loading in the header because there are quite a few dependencies that require
		The library while the rest of the page loads. These include Highcharts and the Tablesorter scripts. -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!--	Load the custom script resize + gallery functionality -->
<script src="assets/js/custom.js" type="text/javascript"></script>
<script src="assets/js/jquery.atooltip.min.js" type="text/javascript"></script>
<!--	Set up the responsive design sizes. -->
<script type="text/javascript">
/* <![CDATA[ */
	var ADAPT_CONFIG = {
	  	path: 'assets/css/',
	  	dynamic: true,
		callback: resizeGalleries,
	 	range: [
	    	'0px    to 420px  /// mobile_portrait.css',
	    	'420px  to 600px  /// mobile_landscape.css',
	    	'600px  to 900px  /// 720.css',
	    	'900px  to 1200px /// 960.css',
	    	'1200px			  /// 1400.css'
	  	]
	};
	 /* ]]> */
</script>
<!--	Load the Adapt script -->
<script src="assets/js/adapt.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
    <!-- EYEBROW NAVIGATION -->
	<div id="eyebrow-navigation">
	    <div class="container_4">
        <div class="grid-wrap">
            <div class="grid_2">
	        <a class="home" href="<?php echo BASE_URL;?>"><span class="tab">vote</span><span>drivers of change</span></a>
	        </div>
	        <div class="grid_2 align_right">
	            <div class="user_nav">
	        <a href="<?php echo BASE_URL;?>">home</a> | 
    		<?php if (!is('user')): ?>
    		    <a href="index.php?do=login" class="signout">sign in</a>
    		<?php else: ?>
    		    <?php if(is('admin')): ?>
    		    <a href="index.php?do=events"<?php if(in_array($page,$admin_pages)){ echo(" class=\"active\"");} ?>>admin</a> |
    		    <?php endif; ?>
    		    <a href="index.php?do=logout" class="signout">sign out</a>
    		<?php endif; ?>
    		</div>
		    </div>
		</div>
		</div>
	</div>	
<!-- BEGIN HEADER -->	
<div id="header">
    <div class="container_4">
		<div class="grid-wrap clearfix">
		<?php
		    //if we are not on admin
		    if(!in_array($page, $admin_pages)) {
		?>
		    <h1 class="grid_2">
		        <a href="<?php echo BASE_URL;?>">
		            <span class="org"><?php if(isset($_SESSION['org']))echo $_SESSION['org']?></span>
			        <?php if(isset($_SESSION['event']))echo $_SESSION['event_name']; ?>
			    </a>
		    </h1>
	        <div class="grid_2">
	            <?php include_once(VIEW_PATH.'partials/main_navigation.php'); ?>
		    </div>
		<?php //admin nav
		    } else {
		?>
		    <h1 class="grid_2"><span class="org"><?php if(isset($_SESSION['user'])) echo $_SESSION['user_name']; ?>&nbsp;</span><a href="<?php echo BASE_URL;?>">Dashboard</a>
	  		</h1>
	  		<div class="grid_2">
	  		    <ul id="main-navigation">
	         		<li><a href="index.php?do=events"<?php if($page == 'events'||$page == 'event'){ echo(" class=\"active\"");} ?>>events</a></li><li><a href="index.php?do=decks"<?php if($page == 'decks'||$page == 'deck'){ echo(" class=\"active\"");} ?>>decks</a></li><li class="last"><a href="index.php?do=issues"<?php if($page == 'issues'){ echo(" class=\"active\"");} ?>>issues</a></li>
	         	</ul>
	        </div>
		<?php }?>
		</div>
	</div>
	<!-- END HEADER -->
</div>
<!-- END CONTAINER_4 - HEADER-WRAP -->