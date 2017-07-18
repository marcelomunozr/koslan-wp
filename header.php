<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!-- Slick Carousel -->
    <link href="<?php bloginfo('template_url'); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/slick-theme.css" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(isset($class) ? $class : ''); ?>>
    
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="top-nav">
        <div class="container">
          <a href="<?php echo home_url(); ?>"><span class="ico ico-home"></span> Home</a>
          <a href="tel:<?php echo str_replace(" ", "", get_field('celular', 'option')); ?>"><span class="ico ico-celular"></span><?php the_field('celular', 'option'); ?></a>
          <a href="tel:<?php echo str_replace(" ", "", get_field('fijo', 'option')); ?>"><span class="ico ico-tel"></span><?php the_field('fijo', 'option'); ?></a>
        </div>
      </div>
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url(); ?>"><span class="logo"></span><?php //bloginfo( 'name' ); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
         <?php wp_nav_menu( array('menu' => 'Main', 'menu_class' => 'nav navbar-nav navbar-right', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
    
    <?php if (is_home()||is_front_page()): ?>
      <div class="slick-homi">
          <div><?php the_post_thumbnail('header', array('class' => 'img-responsive', 'title' => get_the_title()));?></div>
        <?php endif ?>
        <?php $slick = get_field('carrusel'); ?>
        <?php if ($slick!=""): ?>
          <?php foreach ($slick as $img): ?>
            <div>
              <img src="<?php echo $img['img']; ?>" alt="Koslan" class="img-responsive">
            </div>
          <?php endforeach ?> 
      </div>
    <?php else: ?>
        <?php $img = get_field('img-superior','option'); ?>
        <img src="<?php echo $img; ?>" alt="<?php bloginfo('description'); ?>" class="img-responsive">
        <?php $color = get_field('color'); ?>
        <div class="borderson <?php echo $color; ?>"></div>
    <?php endif ?>     

    <div id="main-container" class="container">