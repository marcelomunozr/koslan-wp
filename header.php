<!DOCTYPE html>
<html>
  <head>
    <title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf8" />
		
		<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="<?php bloginfo('stylesheet_url');?>" type="text/css" rel="stylesheet" media="screen, projection" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//use.typekit.net/gxy6fyl.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		
		<?php wp_head(); ?>
		
    
  </head>
 
  <body <?php body_class($class); ?>>
    
    <div id="main-container" class="container">
    
    	
    	